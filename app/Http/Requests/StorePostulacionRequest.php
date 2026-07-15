<?php

namespace App\Http\Requests;

use App\Models\Postulacion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

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
            'es_contacto_comunicacion' => ['required', Rule::in(config('instrumento.es_contacto_comunicacion'))],

            // Sección 4. Participación en talleres informativos y disponibilidad institucional
            'participo_convocatoria_previa' => ['required', Rule::in(config('instrumento.participo_convocatoria_previa'))],
            'disponibilidad_actividades' => ['required', Rule::in(config('instrumento.disponibilidad'))],
            'disponibilidad_seguimiento' => ['required', Rule::in(config('instrumento.disponibilidad'))],

            // Sección 5. Declaraciones y autorización
            'declara_veracidad' => ['accepted'],
            'entiende_no_seleccion_automatica' => ['accepted'],
            'autoriza_verificacion_info' => ['accepted'],
            'acepta_formalizar_compromisos' => ['accepted'],
            'autoriza_tratamiento_datos_personales' => ['accepted'],

            // Anexo. Carta de manifestación de interés y compromiso institucional
            'carta_compromiso' => ['required', 'file', 'mimes:pdf', 'max:5120'],

            // Equipo de trabajo: fila 1 (Responsable de Comunicación) obligatoria, filas 2-4 opcionales
            'equipo' => ['required', 'array', 'min:1', 'max:4'],
            'equipo.0.nombre_completo' => ['required', 'string', 'max:255'],
            'equipo.0.cargo' => ['required', 'string', 'max:255'],
            'equipo.0.dependencia' => ['required', 'string', 'max:255'],
            'equipo.0.correo_institucional' => ['required', 'email', 'max:255'],
            'equipo.0.telefono' => ['required', 'regex:/^[0-9+ ]+$/', 'max:20'],
        ];

        // Sección 3. Evaluación de Dimensiones — 21 preguntas, nivel 1-4
        foreach (Postulacion::DIMENSIONES as $campos) {
            foreach ($campos as $campo) {
                $rules[$campo] = ['required', 'integer', Rule::in([1, 2, 3, 4])];
            }
        }

        // Filas opcionales del equipo de trabajo (2 a 4): si se llena un campo, se exigen todos
        for ($i = 1; $i < 4; $i++) {
            $rules["equipo.{$i}.nombre_completo"] = ['nullable', 'string', 'max:255'];
            $rules["equipo.{$i}.cargo"] = ['nullable', 'string', 'max:255'];
            $rules["equipo.{$i}.dependencia"] = ['nullable', 'string', 'max:255'];
            $rules["equipo.{$i}.correo_institucional"] = ['nullable', 'email', 'max:255'];
            $rules["equipo.{$i}.telefono"] = ['nullable', 'regex:/^[0-9+ ]+$/', 'max:20'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'accepted' => 'Debes aceptar esta declaración para continuar.',
            'email' => 'Ingresa una dirección de correo válida.',
            'numero_documento.regex' => 'El número de documento debe contener solo dígitos.',
            'telefono.regex' => 'El teléfono debe contener solo dígitos, espacios o "+".',
            'carta_compromiso.required' => 'Adjunta la carta de manifestación de interés y compromiso firmada.',
            'carta_compromiso.mimes' => 'La carta debe estar en formato PDF.',
            'carta_compromiso.max' => 'La carta debe pesar menos de 5MB.',
            'equipo.required' => 'Registra al menos el responsable de comunicación del equipo de trabajo.',
            'equipo.0.nombre_completo.required' => 'Ingresa el nombre del responsable de comunicación.',
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

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $equipo = $this->input('equipo', []);

            for ($i = 1; $i < 4; $i++) {
                $fila = $equipo[$i] ?? null;
                if (!$fila) {
                    continue;
                }

                $campos = ['nombre_completo', 'cargo', 'dependencia', 'correo_institucional', 'telefono'];
                $llenos = array_filter($campos, fn ($campo) => filled($fila[$campo] ?? null));

                if (count($llenos) > 0 && count($llenos) < count($campos)) {
                    foreach ($campos as $campo) {
                        if (!filled($fila[$campo] ?? null)) {
                            $validator->errors()->add(
                                "equipo.{$i}.{$campo}",
                                'Completa todos los datos de este integrante del equipo o deja la fila vacía.'
                            );
                        }
                    }
                }
            }
        });
    }
}
