# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Laravel 11 (Breeze scaffolding) app implementing the **Instrumento de Evaluación y Selección de Entidades
Beneficiarias** for the "Proyecto IA para el Estado" (MinTIC + Universidad de Cartagena): a public multi-step
questionnaire (`Postulacion`) that Colombian territorial entities fill out to apply for an AI-adoption program,
plus an admin dashboard to review, score, filter and export submissions.

This repo started as a copy of a different project ("eventosIA", an event-registration form) and was restructured
into this new domain — git history was reset, so don't expect old commits to explain current code. The visual
design system (custom CSS wizard, shards-ui, SweetAlert2, Chart.js) was intentionally kept from that original
project; only the data model, forms and dashboard content changed.

## Commands

```bash
composer install
npm install

# Local dev (serves PHP + queue worker + vite together)
composer run dev

# Or individually
php artisan serve
npm run dev            # vite dev server
npm run build           # vite production build

# DB
php artisan migrate
php artisan storage:link   # required for gated file downloads to resolve

# Tests
composer test            # clears config cache then runs php artisan test
php artisan test
php artisan test --filter=TestName
vendor/bin/phpunit tests/Feature/SomeTest.php

# Routes
php artisan route:list
```

Tests run against an in-memory SQLite DB (`phpunit.xml`), so `php artisan test` works without touching the real
`DB_DATABASE` configured in `.env`.

## Architecture

### Single domain: `Postulacion`

Everything revolves around one Eloquent model, `App\Models\Postulacion` (table `postulaciones`), plus a child
table `postulacion_equipo_miembros` (`App\Models\PostulacionEquipoMiembro`, up to 4 team-member rows per
postulación, row `orden === 1` is always the "Responsable de Comunicación").

The questionnaire has 47 fields across 5 sections (entity identification, who's filling the form, a 21-question
self-reported scoring rubric, participation availability, and legal declarations) plus a file-upload annex (a
signed commitment letter PDF). There is no separate "evaluator" role — the rubric in Sección 3 is self-reported:
the entity picks one of 4 pre-written descriptive options per question, and each option maps to a fixed integer
level (1-4).

### `config/instrumento.php` is the single source of truth

All fixed option lists (tipo_entidad, categoria_territorial, tipo_documento, dependencia, tipo_vinculacion, etc.)
and all 21 rubric questions (grouped into 5 dimensions D1-D5, each question with its 4 level→text options) live in
`config/instrumento.php`. Both `StorePostulacionRequest` (validation, via `Rule::in(config(...))`) and
`resources/views/postulacion.blade.php` (rendering selects/radios via `@foreach`) read from this same config —
never hardcode an option list or rubric question text in more than one place; add/edit it in the config instead.

`App\Models\Postulacion::DIMENSIONES` mirrors the same grouping (dimension → array of DB column names) and is the
source used by the model's `saving()` boot hook to auto-compute `puntaje_d1`..`puntaje_d5` and `puntaje_total`
every time a `Postulacion` is saved. These score columns are **persisted**, not accessor-only, specifically so the
dashboard can `ORDER BY`/`WHERE` on them in SQL.

### Public wizard form (`resources/views/postulacion.blade.php`)

This is a **standalone HTML document** — it does NOT use `<x-app-layout>`/`<x-guest-layout>` or Tailwind/Alpine
(those are only used by the stock Breeze auth pages: login/register/profile). It loads its own CSS
(`public/css/postulacion.css`), plus shards-ui, Font Awesome and SweetAlert2 via CDN. Step navigation is plain
vanilla JS (`goToStep`/`validateStep`/`wireStep`, inline `<script>` at the bottom of the file) — there is no
Alpine/Livewire reactivity anywhere in this form despite Alpine being present in `package.json`.

The form is a 7-step wizard: entity identification → who's filling it out → rubric D1+D2 → rubric D3 → rubric
D4+D5 → participation/declarations → annex (letter upload + repeatable team-member rows). The rubric steps render
their radio groups by looping `config('instrumento.dimensiones.*.preguntas')` through the
`resources/views/partials/pregunta-rubrica.blade.php` partial — extend the rubric by editing the config, not by
adding new Blade markup. The repeatable equipo-de-trabajo rows use a `<template>` element cloned/renumbered by
vanilla JS (`equipo[{index}][{campo}]` naming) — there's no existing package for this, it's hand-rolled.

Two JSON datasets in `public/js/` power client-side UX and are fetched directly from the wizard's JS (not through
a Laravel route): `colombia.json` (departamento→municipio cascading select) and `entidadesPublicas.json` (entity
name autocomplete).

### Controller / validation split

`App\Http\Requests\StorePostulacionRequest` owns all validation (shape rules for the 47+ fields, built dynamically
from `Postulacion::DIMENSIONES` for the 21 rubric fields, plus an `after()` hook enforcing "fill the whole
equipo-de-trabajo row or leave it empty" for optional team members 2-4). `App\Http\Controllers\PostulacionController`
handles business rules that aren't shape validation: duplicate-postulación blocking (same `nombre_entidad` OR same
`numero_documento`), file storage, and wraps the postulación + team-member inserts in a `DB::transaction()`.

### Admin dashboard (`resources/views/dashboard.blade.php`)

Also a standalone page (own CSS `public/css/dashboard.css`, Chart.js via CDN — not the Tailwind/Alpine stack).
Gated by `auth`+`verified` middleware. There is **no role/permission system** — any verified authenticated `User`
has full dashboard access (search, export, file downloads). `PostulacionController::chartData()` is a JSON
endpoint the dashboard's Chart.js calls client-side; `applyFilters()` is a private helper shared between
`search()` (AJAX table filtering) and `exportExcel()` (`PostulacionesExport`, Laravel Excel `FromArray`) so filter
logic never has to be written twice.

### Auth is Breeze, but registration does not auto-activate

`RegisteredUserController::store()` creates the `User` but does **not** log them in — it redirects to
`registro.pendiente` (`resources/views/auth/pending-activation.blade.php`). New admin accounts need to be
activated some other way (there's no self-serve activation flow in this codebase) before they can reach
`/dashboard`.

### File uploads

Both the wizard's letter upload and the old cert pattern it was based on follow the same shape: validated file →
`store('cartas_compromiso', 'public')` → path saved on the model → downloads are gated behind
`auth`+`verified` via `PostulacionController::descargarCarta()`, which checks `Storage::disk('public')->exists()`
before streaming — never expose the raw `storage/app/public/...` path directly. Run `php artisan storage:link`
once locally so `Storage::disk('public')` resolves correctly.
