# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Laravel 11 (Breeze scaffolding) app implementing the **Diagnóstico de Infraestructura Computacional en
Inteligencia Artificial y Big Data** instrument for the "Proyecto IA para el Estado" (MinTIC + Universidad de
Cartagena): a public multi-step questionnaire (`Diagnostico`) that Colombian public entities fill out to report
their current computing infrastructure and future IA/Big Data needs, plus an admin dashboard to review, filter
and export submissions.

This repo started as a copy of a different project ("eventosIA", an event-registration form), was first
restructured into a `Postulacion` domain (evaluation/selection rubric for a benefits program), and was then
replaced again with the current `Diagnostico` domain (a demand-sizing survey, not a scored selection instrument)
— the `Postulacion` domain and all its files were removed entirely. The visual design system (custom CSS wizard,
shards-ui, SweetAlert2, Chart.js) was kept across both restructurings; only the data model, forms and dashboard
content changed.

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
`DB_DATABASE` configured in `.env`. Note: the stock Breeze `Auth*`/`ProfileTest` suite currently fails on a clean
checkout regardless of domain changes (pre-existing baseline issue, unrelated to the `Diagnostico` domain).

## Architecture

### Single domain: `Diagnostico`

Everything revolves around one Eloquent model, `App\Models\Diagnostico` (table `diagnosticos`). There is no
scoring/rubric concept in this domain — it's a data-collection instrument (dimension demand, not evaluate/select
entities), so unlike the prior `Postulacion` domain there are no persisted `puntaje_*` columns.

The questionnaire has 70 numbered questions (P1-P70) across 9 sections (I. Identificación, II. Estado actual de
infraestructura, III. Proyectos de IA y Big Data, IV. Necesidades futuras, V. Integración/seguridad/costos, a
10-statement Likert barrier-valuation block, VII. Riesgos de seguridad IA, VIII. Barreras específicas, IX. Casos
de éxito) plus two fields outside the PDF's numbering: a Ley 1581 data-treatment consent checkbox and
`correo_responsable` (needed to send the confirmation email — the PDF's Sección I doesn't ask for one). Field
types are heterogeneous — single-select,
multi-select (JSON array columns, some with a companion `*_otros` free-text column), long text, Sí/No, a P45
ranking of 5 priorities (`prioridad_gpu`/`prioridad_almacenamiento`/`prioridad_conectividad`/`prioridad_talento`/
`prioridad_herramientas`, validated as a 1-5 permutation), and the P50-59 Likert scale (`likert_*` columns,
1-5). P11 also has an optional file upload (`recursos_tecnologicos_archivo`).

### `config/diagnostico.php` is the single source of truth

All fixed option lists (`orden_entidad`, `sector_publico`, `num_funcionarios_ti`, `presupuesto_anual_ti`, and the
`opciones.*` map for every select/multiselect question) and the question text for sections II-IX live in
`config/diagnostico.php`, under `secciones.{II..IX}.preguntas` — each entry has `campo`, `numero`, `texto`,
`tipo` (`select`|`multiselect`|`texto_largo`|`texto_largo_archivo`|`sino`|`ranking`), and `opciones` (config key)
when applicable. `otros_valor` maps which literal option string (e.g. `'Otros (indique cual)'`) triggers the
companion `*_otros` field. `likert` holds the 10 P50-59 statements; `ranking_items` holds the 5 P45 items.
Section I (P1-7) is rendered with its own hardcoded markup in the view (not looped from config), same as the
prior domain's identification fields — mirror that pattern rather than forcing it through the generic loop.

Both `StoreDiagnosticoRequest::rules()` (looping `config('diagnostico.secciones')` by `tipo` to build validation
rules) and `resources/views/diagnostico.blade.php` (looping the same config through
`resources/views/partials/campo-diagnostico.blade.php`, which switches on `tipo`) read from this same config —
never hardcode an option list or question text in more than one place; add/edit it in the config instead.

### Public wizard form (`resources/views/diagnostico.blade.php`)

This is a **standalone HTML document** — it does NOT use `<x-app-layout>`/`<x-guest-layout>` or Tailwind/Alpine
(those are only used by the stock Breeze auth pages: login/register/profile). It loads its own CSS
(`public/css/diagnostico.css`), plus shards-ui, Font Awesome and SweetAlert2 via CDN. Step navigation is plain
vanilla JS (`goToStep`/`validateStep`/`wireStep`, inline `<script>` at the bottom of the file) — there is no
Alpine/Livewire reactivity anywhere in this form despite Alpine being present in `package.json`.

The form is a 10-step wizard: Sección I → Sección II split across two steps (P8-16, then P17-23, since it's the
largest section) → Sección III → Sección IV (includes the P45 ranking, rendered as 5 inline `<select>`s, one
per config `ranking_items` entry) → Sección V → Likert block (P50-59, using
`resources/views/partials/likert-legend.blade.php`) → Sección VII → Sección VIII → Sección IX (submit). Extend
any of these steps by editing `config/diagnostico.php`, not by adding new Blade markup, except for genuinely new
field *types* (which need a new `@case` in `campo-diagnostico.blade.php`).

`public/js/entidadesPublicas.json` still powers the `nombre_entidad` autocomplete, fetched directly from the
wizard's JS. Unlike the prior domain, this instrument has no departamento/municipio fields, so
`public/js/colombia.json` and its cascading-select JS are not used by this form.

### Controller / validation split

`App\Http\Requests\StoreDiagnosticoRequest` owns all validation: Section I rules are hardcoded, Sections II-IX
rules are built dynamically from `config('diagnostico.secciones')` by `tipo`, and `withValidator()` adds two
cross-field checks that don't fit Laravel's declarative rules — requiring `*_otros` when an "Otros" option was
picked, and requiring the P45 `prioridad_*` columns to be a 1-5 permutation (no repeats).
`App\Http\Controllers\DiagnosticoController` handles business rules that aren't shape validation:
duplicate-diagnóstico blocking (same `nombre_entidad` only — this instrument has no document-number field), P11
file storage, and wraps the create in a `DB::transaction()`.

### Admin dashboard (`resources/views/dashboard.blade.php`)

Also a standalone page (own CSS `public/css/dashboard.css`, Chart.js via CDN — not the Tailwind/Alpine stack).
Gated by `auth`+`verified` middleware. There is **no role/permission system** — any verified authenticated `User`
has full dashboard access (search, export, file downloads). `DiagnosticoController::chartData()` is a JSON
endpoint the dashboard's Chart.js calls client-side (por_dia, por_orden_entidad, por_sector_publico,
por_etapa_ia, por_modelo_tecnologico, and `promedio_likert` — a per-statement `AVG()` across the 10 Likert
columns); `applyFilters()` is a private helper shared between `search()` (AJAX table filtering) and
`exportExcel()` (`DiagnosticosExport`, Laravel Excel `FromArray`) so filter logic never has to be written twice.

### Auth is Breeze, but registration does not auto-activate

`RegisteredUserController::store()` creates the `User` but does **not** log them in — it redirects to
`registro.pendiente` (`resources/views/auth/pending-activation.blade.php`). New admin accounts need to be
activated some other way (there's no self-serve activation flow in this codebase) before they can reach
`/dashboard`.

### File uploads

P11's optional attachment follows the shape: validated file → `store('diagnostico_archivos', 'public')` → path
saved on the model (`recursos_tecnologicos_archivo`) → downloads are gated behind `auth`+`verified` via
`DiagnosticoController::descargarArchivo()`, which checks `Storage::disk('public')->exists()` before streaming —
never expose the raw `storage/app/public/...` path directly. Run `php artisan storage:link` once locally so
`Storage::disk('public')` resolves correctly.

### Confirmation email goes to the submitter, not just the admin

`correo_responsable` (Sección I) is a field added beyond the PDF's 70 numbered questions, same way
`autoriza_tratamiento_datos_personales` is — needed so `DiagnosticoController::store()` has somewhere to send
`DiagnosticoRecibido`. The mail goes `Mail::to($diagnostico->correo_responsable)`, optionally `cc()`'d to
`MAIL_ADMIN_ADDRESS` (env var, no config entry) if that's set — there's no per-entity notification list beyond
this single address.
