<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Instrumento IA Estado 2026 | Formulario de Postulación</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <!-- Fonts & UI -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&family=syne:600,700,800&family=plus-jakarta-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/shards-ui@2.1.0/dist/css/shards.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/postulacion.css') }}">
    <!-- Vite Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex items-center justify-center min-h-screen flex-col">

    <div class="container py-4">

        <main>
            <div class="contenido-formulario-inscripcion">
                <div class="contenido-formulario-header">
                    <div class="contenido-logo-group">
                        <img src="{{ asset('img/Logo-MinTic.png') }}" alt="Logo MinTIC" class="contenido-img-titulo" />
                        <img src="{{ asset('img/Logo-Unicartagena2.png') }}" alt="Logo Unicartagena"
                            class="contenido-img-titulo" />
                    </div>
                    <h3 class="contenido-formulario-title">Instrumento de Evaluación y Selección de Entidades
                        Beneficiarias — Proyecto IA para el Estado</h3>
                </div>
                <strong>Información complementaria para la evaluación y selección de entidades territoriales
                    beneficiarias del Proyecto IA para el Estado.</strong>
                <p style="text-align: justify">
                    El Proyecto IA para el Estado, liderado por el Ministerio de Tecnologías de la Información y las
                    Comunicaciones —MinTIC— en alianza con la Universidad de Cartagena, está orientado a fortalecer
                    las capacidades de las entidades públicas territoriales para el uso, apropiación y
                    aprovechamiento de herramientas de inteligencia artificial en la gestión pública, la toma de
                    decisiones basada en datos y la generación de valor público en los territorios.
                </p>
                <p style="text-align: justify">
                    La información solicitada en este formulario será utilizada como insumo para aplicar las
                    dimensiones de evaluación definidas en la estrategia territorial de masificación: categoría
                    territorial y capacidad institucional; conectividad y capacidad tecnológica; experiencia previa
                    en Gobierno Digital; voluntad política y compromiso institucional; y potencial de impacto
                    territorial.
                </p>
                <p style="text-align: justify">
                    El diligenciamiento de este formulario <strong>no implica la selección automática</strong> de la
                    entidad como beneficiaria del proyecto. La información registrada será revisada y podrá ser
                    verificada por el equipo del proyecto, conforme a los criterios definidos para la convocatoria.
                </p>
                <p style="text-align: justify">
                    Debe ser diligenciado por el punto focal designado o por una persona que conozca la situación
                    institucional de la entidad, con información veraz, verificable y completa. La carta de
                    manifestación de interés y compromiso institucional debe adjuntarse en formato PDF y estar
                    suscrita por el alcalde, gobernador, representante legal o funcionario delegado con capacidad de
                    comprometer institucionalmente a la entidad.
                </p>
            </div>

            @if ($errors->any())
                @php
                    $firstErrorField = array_key_first($errors->getMessages());
                    $errorMessages = collect($errors->all());
                    $errorCount = $errorMessages->count();
                @endphp
            @endif

            <form id="formulario-postulacion" method="POST" action="{{ route('postulacion.store') }}"
                enctype="multipart/form-data" class="needs-validation visible" novalidate>
                @csrf

                <div class="steps-progress" id="steps-progress">
                    <div class="step-connector"></div>
                    <div class="step-item active" data-step="1">
                        <div class="step-dot"><span>1</span></div>
                        <div class="step-label">Entidad</div>
                    </div>
                    <div class="step-item" data-step="2">
                        <div class="step-dot"><span>2</span></div>
                        <div class="step-label">Diligencia</div>
                    </div>
                    <div class="step-item" data-step="3">
                        <div class="step-dot"><span>3</span></div>
                        <div class="step-label">D1-D2</div>
                    </div>
                    <div class="step-item" data-step="4">
                        <div class="step-dot"><span>4</span></div>
                        <div class="step-label">D3</div>
                    </div>
                    <div class="step-item" data-step="5">
                        <div class="step-dot"><span>5</span></div>
                        <div class="step-label">D4-D5</div>
                    </div>
                    <div class="step-item" data-step="6">
                        <div class="step-dot"><span>6</span></div>
                        <div class="step-label">Declaraciones</div>
                    </div>
                    <div class="step-item" data-step="7">
                        <div class="step-dot"><span>7</span></div>
                        <div class="step-label">Anexo</div>
                    </div>
                </div>

                {{-- ==================== PASO 1. Identificación de la entidad ==================== --}}
                <div class="form-step active" data-step="1">
                    <div class="section-header">
                        <span class="section-badge">1</span>
                        <i class="fas fa-landmark section-icon"></i>
                        <span class="section-title">Identificación de la entidad postulante</span>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3" style="position:relative;">
                            <label for="nombre_entidad">Nombre completo de la entidad territorial o entidad pública
                                postulante *</label>
                            <input type="text" class="form-control @error('nombre_entidad') is-invalid @enderror"
                                id="nombre_entidad" name="nombre_entidad" value="{{ old('nombre_entidad') }}"
                                autocomplete="off" required>
                            <div id="entidad_suggestions" class="list-group"
                                style="position:absolute;top:100%;z-index:100;width:100%;"></div>
                            <small class="form-text text-muted">Debe coincidir con el nombre institucional
                                oficial.</small>
                            @error('nombre_entidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="tipo_entidad">Tipo de entidad *</label>
                            <select class="form-control @error('tipo_entidad') is-invalid @enderror"
                                id="tipo_entidad" name="tipo_entidad" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.tipo_entidad') as $opcion)
                                    <option {{ old('tipo_entidad') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('tipo_entidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="departamento">Departamento *</label>
                            <select class="form-control @error('departamento') is-invalid @enderror"
                                id="departamento" name="departamento" required>
                                <option value="">Seleccione...</option>
                            </select>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="municipio">Municipio o distrito *</label>
                            <select class="form-control @error('municipio') is-invalid @enderror" id="municipio"
                                name="municipio" required disabled>
                                <option value="">Seleccione primero un departamento...</option>
                            </select>
                            @error('municipio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="categoria_territorial">Categoría territorial (Ley 617 de 2000) *</label>
                            <select class="form-control @error('categoria_territorial') is-invalid @enderror"
                                id="categoria_territorial" name="categoria_territorial" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.categoria_territorial') as $opcion)
                                    <option {{ old('categoria_territorial') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('categoria_territorial')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="pagina_web">Página web oficial de la entidad *</label>
                            <input type="text" class="form-control @error('pagina_web') is-invalid @enderror"
                                id="pagina_web" name="pagina_web" value="{{ old('pagina_web') }}" required>
                            @error('pagina_web')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="enlace_pdt">Enlace al Plan de Desarrollo o de Acción vigente</label>
                            <input type="text" class="form-control @error('enlace_pdt') is-invalid @enderror"
                                id="enlace_pdt" name="enlace_pdt" value="{{ old('enlace_pdt') }}">
                            <small class="form-text text-muted">Puede corresponder a página oficial, documento PDF o
                                repositorio institucional.</small>
                            @error('enlace_pdt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-next-step" id="btn-next-1" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 2. Datos de quien diligencia ==================== --}}
                <div class="form-step" data-step="2">
                    <div class="section-header">
                        <span class="section-badge">2</span>
                        <i class="fas fa-user section-icon"></i>
                        <span class="section-title">Datos de quien diligencia el formulario</span>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nombres_apellidos">Nombres y apellidos completos *</label>
                            <input type="text" class="form-control @error('nombres_apellidos') is-invalid @enderror"
                                id="nombres_apellidos" name="nombres_apellidos"
                                value="{{ old('nombres_apellidos') }}" required>
                            @error('nombres_apellidos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label for="tipo_documento">Tipo de documento *</label>
                            <select class="form-control @error('tipo_documento') is-invalid @enderror"
                                id="tipo_documento" name="tipo_documento" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.tipo_documento') as $opcion)
                                    <option {{ old('tipo_documento') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('tipo_documento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label for="numero_documento">Número de documento *</label>
                            <input type="text" class="form-control @error('numero_documento') is-invalid @enderror"
                                id="numero_documento" name="numero_documento"
                                value="{{ old('numero_documento') }}" required>
                            @error('numero_documento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="cargo">Cargo o rol que desempeña *</label>
                            <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo"
                                name="cargo" value="{{ old('cargo') }}" required>
                            @error('cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="dependencia">Dependencia o área *</label>
                            <select class="form-control @error('dependencia') is-invalid @enderror"
                                id="dependencia" name="dependencia" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.dependencia') as $opcion)
                                    <option {{ old('dependencia') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('dependencia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="tipo_vinculacion">Tipo de vinculación *</label>
                            <select class="form-control @error('tipo_vinculacion') is-invalid @enderror"
                                id="tipo_vinculacion" name="tipo_vinculacion" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.tipo_vinculacion') as $opcion)
                                    <option {{ old('tipo_vinculacion') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('tipo_vinculacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="correo_institucional">Correo electrónico institucional *</label>
                            <input type="email"
                                class="form-control @error('correo_institucional') is-invalid @enderror"
                                id="correo_institucional" name="correo_institucional"
                                value="{{ old('correo_institucional') }}" required>
                            @error('correo_institucional')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="correo_alternativo">Correo electrónico alternativo</label>
                            <input type="email"
                                class="form-control @error('correo_alternativo') is-invalid @enderror"
                                id="correo_alternativo" name="correo_alternativo"
                                value="{{ old('correo_alternativo') }}">
                            <small class="form-text text-muted">Para contingencias de comunicación.</small>
                            @error('correo_alternativo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="telefono">Teléfono celular o de contacto *</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>¿Será el contacto de comunicación de la entidad para el proyecto? *</label>
                            <div>
                                @foreach (config('instrumento.es_contacto_comunicacion') as $opcion)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('es_contacto_comunicacion') is-invalid @enderror"
                                            type="radio" name="es_contacto_comunicacion"
                                            id="es_contacto_comunicacion_{{ $loop->index }}" value="{{ $opcion }}"
                                            {{ old('es_contacto_comunicacion') == $opcion ? 'checked' : '' }} required>
                                        <label class="form-check-label"
                                            for="es_contacto_comunicacion_{{ $loop->index }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                                @error('es_contacto_comunicacion')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-2">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-2" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 3. Evaluación D1 + D2 ==================== --}}
                <div class="form-step" data-step="3">
                    <div class="section-header">
                        <span class="section-badge">3</span>
                        <i class="fas fa-clipboard-check section-icon"></i>
                        <span class="section-title">Evaluación — Categoría/Capacidad institucional y Conectividad</span>
                    </div>

                    @include('partials.rubrica-legend')

                    <h5 style="color:#184fa4;">D1. {{ config('instrumento.dimensiones.D1.label') }}</h5>
                    @foreach (config('instrumento.dimensiones.D1.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <hr>
                    <h5 style="color:#184fa4;">D2. {{ config('instrumento.dimensiones.D2.label') }}</h5>
                    @foreach (config('instrumento.dimensiones.D2.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-3">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-3" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 4. Evaluación D3 ==================== --}}
                <div class="form-step" data-step="4">
                    <div class="section-header">
                        <span class="section-badge">4</span>
                        <i class="fas fa-laptop-code section-icon"></i>
                        <span class="section-title">Evaluación — Experiencia previa en Gobierno Digital</span>
                    </div>

                    @foreach (config('instrumento.dimensiones.D3.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-4">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-4" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 5. Evaluación D4 + D5 ==================== --}}
                <div class="form-step" data-step="5">
                    <div class="section-header">
                        <span class="section-badge">5</span>
                        <i class="fas fa-bullseye section-icon"></i>
                        <span class="section-title">Evaluación — Voluntad política e Impacto territorial</span>
                    </div>

                    <h5 style="color:#184fa4;">D4. {{ config('instrumento.dimensiones.D4.label') }}</h5>
                    @foreach (config('instrumento.dimensiones.D4.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <hr>
                    <h5 style="color:#184fa4;">D5. {{ config('instrumento.dimensiones.D5.label') }}</h5>
                    @foreach (config('instrumento.dimensiones.D5.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-5">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-5" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 6. Participación y Declaraciones ==================== --}}
                <div class="form-step" data-step="6">
                    <div class="section-header">
                        <span class="section-badge">6</span>
                        <i class="fas fa-calendar-check section-icon"></i>
                        <span class="section-title">Participación y declaraciones</span>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>¿La entidad fue seleccionada, entre 2024 y 2025, en Territorios IA o ciudades
                                inteligentes de MinTIC? *</label>
                            <select class="form-control @error('participo_convocatoria_previa') is-invalid @enderror"
                                name="participo_convocatoria_previa" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.participo_convocatoria_previa') as $opcion)
                                    <option {{ old('participo_convocatoria_previa') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('participo_convocatoria_previa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label>Disponibilidad para actividades virtuales o presenciales durante el
                                acompañamiento *</label>
                            <select class="form-control @error('disponibilidad_actividades') is-invalid @enderror"
                                name="disponibilidad_actividades" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.disponibilidad') as $opcion)
                                    <option {{ old('disponibilidad_actividades') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('disponibilidad_actividades')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label>Disponibilidad para seguimiento, entrega de evidencias y evaluación *</label>
                            <select class="form-control @error('disponibilidad_seguimiento') is-invalid @enderror"
                                name="disponibilidad_seguimiento" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.disponibilidad') as $opcion)
                                    <option {{ old('disponibilidad_seguimiento') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('disponibilidad_seguimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <h5 style="color:#184fa4;">Declaraciones y autorización</h5>

                    @php
                        $declaraciones = [
                            'declara_veracidad' => 'La entidad declara que la información registrada en este formulario es veraz, completa y corresponde a la situación institucional conocida al momento del diligenciamiento.',
                            'entiende_no_seleccion_automatica' => 'La entidad entiende que el diligenciamiento de este formulario no implica la selección automática como beneficiaria del Proyecto IA para el Estado.',
                            'autoriza_verificacion_info' => 'La entidad autoriza al equipo del Proyecto IA para el Estado a revisar, validar y contrastar la información registrada con fuentes públicas o institucionales disponibles, únicamente para efectos del proceso de evaluación y selección.',
                            'acepta_formalizar_compromisos' => 'La entidad acepta que, en caso de resultar seleccionada, deberá formalizar los compromisos de participación, designar su equipo de trabajo y atender la ruta de acompañamiento definida por el proyecto.',
                        ];
                    @endphp

                    @foreach ($declaraciones as $campo => $texto)
                        <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input @error($campo) is-invalid @enderror"
                                id="{{ $campo }}" name="{{ $campo }}" value="1"
                                {{ old($campo) ? 'checked' : '' }} required>
                            <label class="form-check-label" for="{{ $campo }}">{{ $texto }} (*Acepto)</label>
                            @error($campo)
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <div id="terminos-condiciones-block" class="mb-4 p-3 rounded shadow-sm bg-white"
                        style="max-width:700px;margin:auto;">
                        <h4 class="mb-2 font-bold">Términos y Política de Tratamiento de Datos</h4>

                        <p style="margin-bottom: 10px; text-align: justify;">
                            El Ministerio / Fondo Único de TIC se permite solicitar autorización para realizar el
                            tratamiento de sus datos personales, la cual tiene como finalidad: gestionar el proceso de
                            convocatoria, postulación, evaluación, selección, comunicación, seguimiento y eventual
                            acompañamiento de las entidades territoriales beneficiarias del Proyecto IA para el
                            Estado, y compartir información con aliados estratégicos en la ejecución técnica que
                            facilitarán las actividades del proyecto. Para tal fin, usted reconoce que el registro y
                            autorización para el tratamiento de su información personal lo realiza de manera
                            voluntaria y que conoce los derechos que detenta, especialmente a conocer, actualizar y
                            rectificar su información personal, revocar la autorización y solicitar la supresión del
                            dato, los cuales podrá ejercer a través de <a
                                href="mailto:minticresponde@mintic.gov.co"
                                style="color:#1976d2;">minticresponde@mintic.gov.co</a>, la línea telefónica gratuita
                            nacional 01-800-0914014 o en el Punto de Atención al Ciudadano ubicado en el
                            Edificio Murillo Toro, carrera 8 a entre calles 12 y 13 en Bogotá, Colombia. La información
                            suministrada será tratada por el Ministerio/Fondo Único de Tecnologías de la Información y
                            las Comunicaciones como responsable del tratamiento, de acuerdo con la Ley 1581 de 2012 y
                            la Política de Tratamiento de Datos Personales, descrita en la Resolución 2238 de 2024 del
                            Ministerio de TIC, o aquella que la modifique, derogue o sustituya, la cual puede
                            consultar en <a
                                href="https://www.mintic.gov.co/portal/inicio/Secciones-auxiliares/Politicas/2627:Politicas-de-Privacidad-y-Condiciones-de-Uso"
                                target="_blank"
                                style="color:#1976d2;">https://www.mintic.gov.co/portal/inicio/Secciones-auxiliares/Politicas/2627:Politicas-de-Privacidad-y-Condiciones-de-Uso</a>
                        </p>
                        <hr>
                        <p style="margin-bottom: 10px; text-align: justify;">Autorización de tratamiento de datos –
                            Universidad de Cartagena (UdeC)
                            Adicionalmente, el postulante manifiesta que ha leído y acepta los Términos de Uso y el
                            Aviso de Privacidad de la Universidad de Cartagena (UdeC) y autoriza el tratamiento de sus
                            datos personales por parte de UdeC, en calidad de responsable del tratamiento, para las
                            siguientes finalidades: gestionar la postulación, verificación de requisitos, evaluación y
                            selección, participación en el proyecto, seguimiento y acompañamiento, comunicaciones
                            informativas y operativas, control de calidad del servicio, fines estadísticos e
                            institucionales, seguridad de la información y cumplimiento de obligaciones legales y
                            contractuales, así como la transmisión y/o transferencia a aliados tecnológicos y
                            académicos estrictamente necesarios para la ejecución del proyecto y bajo acuerdos de
                            protección de datos. El titular podrá ejercer sus derechos de conocer, actualizar,
                            rectificar y suprimir sus datos, así como revocar la autorización, mediante el correo <a
                                href="mailto:datospersonales@unicartagena.edu.co"
                                style="color:#1976d2;">datospersonales@unicartagena.edu.co</a>, o de manera presencial
                            en la Oficina Asesora de Planeación – Datos Personales, Cra. 6 No.
                            36-100, Centro de Cartagena de Indias, CP 130001, Bolívar, Colombia, PBX (+57) 3164390360
                            ext. 165. La política de tratamiento de datos de UdeC puede consultarse en <a
                                href="https://www.unicartagena.edu.co/proteccion-de-datos" target="_blank"
                                style="color:#1976d2;">https://www.unicartagena.edu.co/proteccion-de-datos</a>.
                            UdeC realizará el tratamiento conforme a la Ley 1581 de 2012, sus decretos reglamentarios
                            y las demás normas aplicables.
                        </p>
                        <div class="form-group form-check mb-2">
                            <input type="checkbox" style="width: 30px"
                                class="form-check-input-term @error('autoriza_tratamiento_datos_personales') is-invalid @enderror"
                                id="autoriza_tratamiento_datos_personales" name="autoriza_tratamiento_datos_personales"
                                value="1" {{ old('autoriza_tratamiento_datos_personales') ? 'checked' : '' }} required>
                            <label class="form-check-label" for="autoriza_tratamiento_datos_personales">
                                Autorizo el tratamiento de mis datos personales conforme a lo descrito (*)
                            </label>
                            @error('autoriza_tratamiento_datos_personales')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-6">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-6" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 7. Anexo: carta y equipo de trabajo ==================== --}}
                <div class="form-step" data-step="7">
                    <div class="section-header">
                        <span class="section-badge">7</span>
                        <i class="fas fa-file-signature section-icon"></i>
                        <span class="section-title">Anexo — Carta de compromiso y equipo de trabajo</span>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-8 mb-3">
                            <label for="carta_compromiso">Carta de manifestación de interés y compromiso
                                institucional (firmada) *</label>
                            <input type="file"
                                class="form-control-file @error('carta_compromiso') is-invalid @enderror"
                                id="carta_compromiso" name="carta_compromiso" accept=".pdf" required>
                            <small class="form-text text-muted">
                                Debe estar suscrita por el alcalde, gobernador, representante legal o funcionario
                                delegado. Formato: PDF. Tamaño máximo: 5 MB.
                            </small>
                            @error('carta_compromiso')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <h5 style="color:#184fa4;">Equipo de trabajo (máximo 4 personas)</h5>
                    <p style="color:#555;">La primera persona es el <strong>Responsable de Comunicación</strong> del
                        equipo, obligatoria. Puedes agregar hasta 3 integrantes adicionales.</p>

                    <div id="equipo-rows"></div>

                    <button type="button" class="btn-step btn-secondary-step" id="btn-add-equipo">
                        <i class="fas fa-plus"></i> Agregar integrante
                    </button>

                    <template id="equipo-row-template">
                        <div class="row equipo-row mb-3 p-3" style="border:1px solid #e0e0e0;border-radius:8px;">
                            <div class="col-12 d-flex justify-content-between align-items-center mb-2">
                                <strong class="equipo-row-title"></strong>
                                <button type="button" class="btn-step btn-remove-equipo" style="display:none;">
                                    <i class="fas fa-trash"></i> Quitar
                                </button>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <label>Nombre completo</label>
                                <input type="text" class="form-control equipo-nombre_completo">
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <label>Cargo</label>
                                <input type="text" class="form-control equipo-cargo">
                            </div>
                            <div class="col-12 col-md-4 mb-2">
                                <label>Dependencia</label>
                                <input type="text" class="form-control equipo-dependencia">
                            </div>
                            <div class="col-12 col-md-4 mb-2">
                                <label>Correo institucional</label>
                                <input type="email" class="form-control equipo-correo_institucional">
                            </div>
                            <div class="col-12 col-md-4 mb-2">
                                <label>Teléfono</label>
                                <input type="text" class="form-control equipo-telefono">
                            </div>
                        </div>
                    </template>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-7">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="submit" class="btn btn-primary btn-submit-step" id="btn-submit">
                            <i class="fas fa-paper-plane"></i> Enviar postulación
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formulario = document.getElementById('formulario-postulacion');

            // ----- Wizard: navegación por pasos -----
            let currentStep = 1;
            const TOTAL_STEPS = 7;

            function goToStep(n) {
                const steps = document.querySelectorAll('.form-step');
                const dots = document.querySelectorAll('.steps-progress .step-item');
                steps.forEach(s => s.classList.remove('active'));
                dots.forEach((d, i) => {
                    d.classList.remove('active', 'done');
                    if (i + 1 < n) d.classList.add('done');
                    else if (i + 1 === n) d.classList.add('active');
                });
                const target = document.querySelector(`.form-step[data-step="${n}"]`);
                if (target) target.classList.add('active');
                currentStep = n;
                window.scrollTo({
                    top: formulario.offsetTop - 20,
                    behavior: 'smooth'
                });
            }

            function shakeBtn(id) {
                const btn = document.getElementById(id);
                if (!btn) return;
                btn.classList.add('btn-shake');
                btn.addEventListener('animationend', () => btn.classList.remove('btn-shake'), {
                    once: true
                });
            }

            function validateStep(stepEl) {
                const controls = stepEl.querySelectorAll('input, select, textarea');
                let firstInvalid = null;
                controls.forEach(el => {
                    if (!el.disabled && !el.checkValidity() && !firstInvalid) firstInvalid = el;
                });
                return firstInvalid;
            }

            // Verifica en el servidor si la entidad o el documento ya están registrados.
            // Se ejecuta al avanzar del Paso 2 (ya se conocen nombre_entidad y numero_documento).
            async function checkDuplicado() {
                const numero = document.getElementById('numero_documento').value.trim();
                const entidad = document.getElementById('nombre_entidad').value.trim();
                try {
                    const res = await fetch(
                        `{{ url('/postulaciones/check-documento') }}?numero_documento=${encodeURIComponent(numero)}&nombre_entidad=${encodeURIComponent(entidad)}`
                    );
                    const data = await res.json();
                    if (data.exists) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Postulación ya registrada',
                            text: 'Ya existe una postulación registrada con esta entidad o este número de documento.',
                            confirmButtonText: 'Entendido'
                        });
                        return false;
                    }
                    return true;
                } catch (e) {
                    return true;
                }
            }

            const stepAsyncChecks = {
                2: checkDuplicado
            };

            function wireStep(n) {
                const stepEl = document.querySelector(`.form-step[data-step="${n}"]`);
                if (!stepEl) return;

                const nextBtn = document.getElementById(`btn-next-${n}`);
                const prevBtn = document.getElementById(`btn-prev-${n}`);

                if (nextBtn) {
                    function updateNextBtn() {
                        nextBtn.disabled = !!validateStep(stepEl);
                    }
                    stepEl.querySelectorAll('input, select, textarea').forEach(el => {
                        el.addEventListener('input', updateNextBtn);
                        el.addEventListener('change', updateNextBtn);
                    });
                    updateNextBtn();

                    nextBtn.addEventListener('click', async function() {
                        const invalid = validateStep(stepEl);
                        if (invalid) {
                            shakeBtn(nextBtn.id);
                            const question = invalid.closest('.row, .col-12') || invalid;
                            question.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            invalid.reportValidity();
                            return;
                        }

                        const asyncCheck = stepAsyncChecks[n];
                        if (asyncCheck) {
                            const originalHtml = nextBtn.innerHTML;
                            nextBtn.disabled = true;
                            nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Verificando...';
                            const ok = await asyncCheck();
                            nextBtn.innerHTML = originalHtml;
                            nextBtn.disabled = false;
                            if (!ok) {
                                shakeBtn(nextBtn.id);
                                return;
                            }
                        }

                        goToStep(n + 1);
                    });
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', () => goToStep(n - 1));
                }
            }

            for (let i = 1; i <= TOTAL_STEPS; i++) wireStep(i);

            formulario.addEventListener('submit', function(e) {
                const submitBtn = formulario.querySelector('button[type="submit"]');
                if (formulario.checkValidity()) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Enviando...';
                    Swal.fire({
                        title: 'Enviando postulación...',
                        text: 'Por favor espera mientras procesamos tu postulación.',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                }
            });

            // ----- Departamento y Municipio -----
            const departamentoSelect = document.getElementById('departamento');
            const municipioSelect = document.getElementById('municipio');
            let municipiosPorDepto = {};

            fetch('./js/colombia.json')
                .then(response => response.json())
                .then(data => {
                    data.forEach(row => {
                        const depto = row['DEPARTAMENTO'];
                        if (!municipiosPorDepto[depto]) municipiosPorDepto[depto] = [];
                        municipiosPorDepto[depto].push(row['MUNICIPIO']);
                    });

                    Object.keys(municipiosPorDepto).sort((a, b) => a.localeCompare(b, 'es', {
                        sensitivity: 'base'
                    })).forEach(depto => {
                        const option = document.createElement('option');
                        option.value = depto;
                        option.textContent = depto;
                        departamentoSelect.appendChild(option);
                    });

                    @if (old('departamento'))
                        departamentoSelect.value = "{{ old('departamento') }}";
                        departamentoSelect.dispatchEvent(new Event('change'));
                        @if (old('municipio'))
                            setTimeout(() => {
                                municipioSelect.value = "{{ old('municipio') }}";
                            }, 300);
                        @endif
                    @endif
                });

            departamentoSelect.addEventListener('change', function() {
                const depto = this.value;
                municipioSelect.innerHTML = '';
                if (depto && municipiosPorDepto[depto]) {
                    municipioSelect.disabled = false;
                    municipioSelect.appendChild(new Option('Seleccione...', ''));
                    municipiosPorDepto[depto].sort((a, b) => a.localeCompare(b, 'es', {
                        sensitivity: 'base'
                    })).forEach(mun => {
                        municipioSelect.appendChild(new Option(mun, mun));
                    });
                } else {
                    municipioSelect.disabled = true;
                    municipioSelect.appendChild(new Option('Seleccione primero un departamento...', ''));
                }
                municipioSelect.dispatchEvent(new Event('change'));
            });

            // --- Autocompletado de entidad ---
            const inputEntidad = document.getElementById('nombre_entidad');
            const suggestionsBox = document.getElementById('entidad_suggestions');
            let entidades = [];

            fetch('./js/entidadesPublicas.json')
                .then(res => res.json())
                .then(data => {
                    entidades = data;
                });

            inputEntidad.addEventListener('input', function() {
                const term = inputEntidad.value.trim().toLowerCase();
                suggestionsBox.innerHTML = '';
                if (term.length < 2) {
                    suggestionsBox.style.display = 'none';
                    return;
                }

                const matches = entidades.filter(item =>
                    item.NOMBRE.toLowerCase().includes(term) ||
                    item.DM_INSTITUCION_COD_INSTITUCION.toString().includes(term) ||
                    (item.CLASIFICACION_ORGANICA && item.CLASIFICACION_ORGANICA.toLowerCase().includes(
                        term))
                ).sort((a, b) => a.NOMBRE.localeCompare(b.NOMBRE, 'es', {
                    sensitivity: 'base'
                }));

                if (matches.length === 0) {
                    suggestionsBox.style.display = 'none';
                    return;
                }

                matches.forEach(item => {
                    const el = document.createElement('button');
                    el.type = 'button';
                    el.className = 'list-group-item list-group-item-action';
                    el.textContent = `${item.NOMBRE} (${item.DM_INSTITUCION_COD_INSTITUCION})`;
                    el.addEventListener('mousedown', function(e) {
                        inputEntidad.value = item.NOMBRE;
                        suggestionsBox.innerHTML = '';
                        suggestionsBox.style.display = 'none';
                        inputEntidad.dispatchEvent(new Event('input'));
                    });
                    suggestionsBox.appendChild(el);
                });
                suggestionsBox.style.display = 'block';
            });

            document.addEventListener('click', function(e) {
                if (!inputEntidad.contains(e.target) && !suggestionsBox.contains(e.target)) {
                    suggestionsBox.innerHTML = '';
                    suggestionsBox.style.display = 'none';
                }
            });

            function syncSuggestionWidth() {
                if (inputEntidad && suggestionsBox) {
                    suggestionsBox.style.width = inputEntidad.offsetWidth + 'px';
                }
            }
            inputEntidad.addEventListener('input', syncSuggestionWidth);
            window.addEventListener('resize', syncSuggestionWidth);
            syncSuggestionWidth();

            // ----- Equipo de trabajo (repetible, máx. 4, fila 1 obligatoria) -----
            const equipoRows = document.getElementById('equipo-rows');
            const equipoTemplate = document.getElementById('equipo-row-template');
            const btnAddEquipo = document.getElementById('btn-add-equipo');
            const MAX_EQUIPO = 4;
            let equipoCount = 0;

            function addEquipoRow() {
                if (equipoCount >= MAX_EQUIPO) return;
                const index = equipoCount;
                const clone = equipoTemplate.content.cloneNode(true);
                const rowEl = clone.querySelector('.equipo-row');

                const titulo = clone.querySelector('.equipo-row-title');
                titulo.textContent = index === 0 ?
                    'Integrante 1 — Responsable de Comunicación (obligatorio)' :
                    `Integrante ${index + 1}`;

                const campos = ['nombre_completo', 'cargo', 'dependencia', 'correo_institucional', 'telefono'];
                campos.forEach(campo => {
                    const input = clone.querySelector(`.equipo-${campo}`);
                    input.name = `equipo[${index}][${campo}]`;
                    input.id = `equipo_${index}_${campo}`;
                    if (index === 0) input.required = true;
                });

                const removeBtn = clone.querySelector('.btn-remove-equipo');
                if (index === 0) {
                    removeBtn.style.display = 'none';
                } else {
                    removeBtn.style.display = '';
                    removeBtn.addEventListener('click', function() {
                        rowEl.remove();
                        equipoCount--;
                        renumberEquipoRows();
                        btnAddEquipo.disabled = equipoCount >= MAX_EQUIPO;
                    });
                }

                equipoRows.appendChild(clone);
                equipoCount++;
                btnAddEquipo.disabled = equipoCount >= MAX_EQUIPO;
            }

            function renumberEquipoRows() {
                const rows = equipoRows.querySelectorAll('.equipo-row');
                const campos = ['nombre_completo', 'cargo', 'dependencia', 'correo_institucional', 'telefono'];
                rows.forEach((rowEl, index) => {
                    rowEl.querySelector('.equipo-row-title').textContent = index === 0 ?
                        'Integrante 1 — Responsable de Comunicación (obligatorio)' :
                        `Integrante ${index + 1}`;
                    campos.forEach(campo => {
                        const input = rowEl.querySelector(`.equipo-${campo}`);
                        input.name = `equipo[${index}][${campo}]`;
                        input.id = `equipo_${index}_${campo}`;
                    });
                });
            }

            btnAddEquipo.addEventListener('click', addEquipoRow);
            addEquipoRow(); // Fila 1: Responsable de Comunicación, siempre presente.

            // SweetAlert para errores y éxito
            @if ($errors->any() && $errorCount > 0 && $errorCount <= 5)
                let errorList = {!! json_encode($errorMessages) !!};
                let fieldWithError = "{{ $firstErrorField }}";
                Swal.fire({
                    icon: 'error',
                    title: 'Error en el formulario',
                    html: errorList.map(e => `<div>${e}</div>`).join(''),
                    confirmButtonText: 'OK',
                }).then(function() {
                    let el = document.getElementsByName(fieldWithError)[0] || document.getElementById(fieldWithError);
                    if (el) {
                        const step = el.closest('.form-step');
                        if (step) goToStep(parseInt(step.dataset.step, 10));
                        setTimeout(() => {
                            el.focus();
                            el.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        }, 50);
                    }
                });
            @endif
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Formulario enviado con éxito!',
                    html: `<p style="text-align:justify;color:#4a4a4a;font-size:0.97rem;line-height:1.75;margin:0;">{{ session('success') }}</p>`,
                    confirmButtonText: 'Entendido',
                    confirmButtonColor: '#184fa4',
                    width: 560,
                    padding: '1.75rem',
                    customClass: {
                        popup: 'swal-postulacion-success',
                        title: 'swal-postulacion-title'
                    }
                });
            @endif
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</body>

</html>
