<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreDiagnosticoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            // Sección I. Identificación de la entidad
            'nombre_entidad' => ['required', 'string', 'max:255'],
            'orden_entidad' => ['required', Rule::in(config('diagnostico.orden_entidad'))],
            'sector_publico' => ['required', Rule::in(config('diagnostico.sector_publico'))],
            'nombre_responsable' => ['required', 'string', 'max:255'],
            'cargo_responsable' => ['required', 'string', 'max:255'],
            'correo_responsable' => ['required', 'email', 'max:255'],
            'tiene_area_ia' => ['required', 'boolean'],
            'num_funcionarios_ti' => ['required', Rule::in(config('diagnostico.num_funcionarios_ti'))],
            'presupuesto_anual_ti' => ['required', Rule::in(config('diagnostico.presupuesto_anual_ti'))],

            // P11 — texto + archivo adjunto opcional
            'recursos_tecnologicos_archivo' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,csv,jpg,jpeg,png', 'max:10240'],

            // Autorización de tratamiento de datos personales
            'autoriza_tratamiento_datos_personales' => ['accepted'],
        ];

        foreach (config('diagnostico.secciones') as $seccion) {
            foreach ($seccion['preguntas'] as $pregunta) {
                $tipo = $pregunta['tipo'];

                if ($tipo === 'ranking') {
                    foreach (config('diagnostico.ranking_items') as $item) {
                        $rules[$item['campo']] = ['required', 'integer', Rule::in([1, 2, 3, 4, 5])];
                    }
                    continue;
                }

                $campo = $pregunta['campo'];

                if ($tipo === 'texto_largo_archivo') {
                    $rules[$campo] = ['required', 'string'];
                    continue;
                }

                $rules[$campo] = match ($tipo) {
                    'select' => ['required', Rule::in(config('diagnostico.opciones.' . $pregunta['opciones']))],
                    'multiselect' => ['required', 'array', 'min:1'],
                    'texto_largo' => ['required', 'string'],
                    'sino' => ['required', 'boolean'],
                    default => ['required'],
                };

                if ($tipo === 'multiselect') {
                    $rules[$campo . '.*'] = [Rule::in(config('diagnostico.opciones.' . $pregunta['opciones']))];
                }

                if (!empty($pregunta['otros'])) {
                    $rules[$campo . '_otros'] = ['nullable', 'string', 'max:255'];
                }
            }
        }

        foreach (config('diagnostico.likert') as $afirmacion) {
            $rules[$afirmacion['campo']] = ['required', 'integer', Rule::in([1, 2, 3, 4, 5])];
        }

        return $rules;
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            // Requiere el campo "_otros" cuando la respuesta elegida es la opción "Otros/Otro/Otra".
            foreach (config('diagnostico.otros_valor') as $campo => $valorOtros) {
                $respuesta = $this->input($campo);
                $seleccionoOtros = is_array($respuesta)
                    ? in_array($valorOtros, $respuesta, true)
                    : $respuesta === $valorOtros;

                if ($seleccionoOtros && trim((string) $this->input($campo . '_otros')) === '') {
                    $validator->errors()->add($campo . '_otros', 'Indica cuál, ya que seleccionaste "Otros".');
                }
            }

            // P45 — las 5 prioridades deben ser una permutación de 1 a 5 (sin repetir).
            $campos = array_column(config('diagnostico.ranking_items'), 'campo');
            $valores = array_map(fn ($campo) => (int) $this->input($campo), $campos);

            if (count(array_unique($valores)) !== count($campos)) {
                foreach ($campos as $campo) {
                    $validator->errors()->add($campo, 'Cada necesidad debe tener una prioridad distinta (1 a 5, sin repetir).');
                }
            }
        });
    }

    public function messages(): array
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'accepted' => 'Debes autorizar el tratamiento de tus datos personales para continuar.',
            'array' => 'Selecciona al menos una opción.',
            'min' => 'Selecciona al menos una opción.',
            'recursos_tecnologicos_archivo.mimes' => 'El archivo debe ser PDF, Word, Excel, CSV o imagen (jpg/png).',
            'recursos_tecnologicos_archivo.max' => 'El archivo no debe superar los 10MB.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $strip = fn ($value) => is_string($value) ? strip_tags(trim($value)) : $value;

        $this->merge([
            'nombre_entidad' => $strip($this->nombre_entidad),
            'nombre_responsable' => $strip($this->nombre_responsable),
            'cargo_responsable' => $strip($this->cargo_responsable),
            'correo_responsable' => $this->correo_responsable ? strtolower($strip($this->correo_responsable)) : null,
        ]);
    }
}
