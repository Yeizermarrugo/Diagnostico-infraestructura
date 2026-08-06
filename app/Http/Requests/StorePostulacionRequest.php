<?php

namespace App\Http\Requests;

use App\Models\Postulacion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostulacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            // Sección 1. Identificación de la entidad postulante
            'nombre_entidad' => ['required', 'string', 'max:255'],
            'tipo_entidad' => ['required', Rule::in(config('instrumento.tipo_entidad'))],
            'departamento' => ['required', 'string', 'max:255'],
            'municipio' => ['required', 'string', 'max:255'],
            'categoria_territorial' => ['required', Rule::in(config('instrumento.categoria_territorial'))],
            'pagina_web' => ['required', 'string', 'max:255'],
            'enlace_pdt' => ['nullable', 'string', 'max:255'],

            // Sección 2. Datos de quien diligencia el formulario
            'nombres_apellidos' => ['required', 'string', 'max:255'],
            'tipo_documento' => ['required', Rule::in(config('instrumento.tipo_documento'))],
            'numero_documento' => ['required', 'regex:/^[0-9]+$/', 'max:20'],
            'cargo' => ['required', 'string', 'max:255'],
            'dependencia' => ['required', Rule::in(config('instrumento.dependencia'))],
            'tipo_vinculacion' => ['required', Rule::in(config('instrumento.tipo_vinculacion'))],
            'correo_institucional' => ['required', 'email', 'max:255'],
            'correo_alternativo' => ['nullable', 'email', 'max:255'],
            'telefono' => ['required', 'regex:/^[0-9+ ]+$/', 'max:20'],

            // Autorización de tratamiento de datos personales
            'autoriza_tratamiento_datos_personales' => ['accepted'],
        ];

        // Sección 3. Instrumento unificado de autodiagnóstico F1+E6 — 38 preguntas, nivel 1-5
        foreach (Postulacion::AMBITOS as $campos) {
            foreach ($campos as $campo) {
                $rules[$campo] = ['required', 'integer', Rule::in([1, 2, 3, 4, 5])];
            }
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'accepted' => 'Debes autorizar el tratamiento de tus datos personales para continuar.',
            'email' => 'Ingresa una dirección de correo válida.',
            'numero_documento.regex' => 'El número de documento debe contener solo dígitos.',
            'telefono.regex' => 'El teléfono debe contener solo dígitos, espacios o "+".',
        ];
    }

    protected function prepareForValidation(): void
    {
        $strip = fn ($value) => is_string($value) ? strip_tags(trim($value)) : $value;

        $this->merge([
            'nombre_entidad' => $strip($this->nombre_entidad),
            'municipio' => $strip($this->municipio),
            'pagina_web' => $strip($this->pagina_web),
            'enlace_pdt' => $this->enlace_pdt ? $strip($this->enlace_pdt) : null,
            'nombres_apellidos' => $strip($this->nombres_apellidos),
            'numero_documento' => preg_replace('/[^0-9]/', '', (string) $this->numero_documento),
            'cargo' => $strip($this->cargo),
            'correo_institucional' => $this->correo_institucional ? strtolower($strip($this->correo_institucional)) : null,
            'correo_alternativo' => $this->correo_alternativo ? strtolower($strip($this->correo_alternativo)) : null,
            'telefono' => preg_replace('/[^0-9+ ]/', '', (string) $this->telefono),
        ]);
    }
}
