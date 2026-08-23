<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Autodiagnóstico Integrado | Postulación</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <!-- Fonts & UI -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&family=syne:600,700,800&family=plus-jakarta-sans:400,500,600,700"
        rel="stylesheet" />
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
                    <h3 class="contenido-formulario-title">Instrumento Autodiagnóstico Integrado — Proyecto IA para el
                        Estado</h3>
                </div>

                <p style="margin-bottom: 10px; text-align: justify;">
                    Este instrumento hace parte del <strong>Proyecto IA para el Estado</strong> y tiene como
                    propósito identificar el nivel de madurez de la entidad en materia de <strong>datos e
                        inteligencia artificial</strong>, a partir de seis ámbitos de evaluación: dirección y
                    gobierno institucional, gestión de datos, base tecnológica, seguridad y privacidad,
                    capacidades del equipo humano, y procesos y valor público.
                </p>
                <p style="margin-bottom: 10px; text-align: justify;">
                    <strong>Importante:</strong> a diferencia del diagnóstico diligenciado anteriormente, este
                    instrumento <strong>no</strong> se responde por cada funcionario(a). Debe diligenciarse
                    <strong>una sola vez por entidad</strong>, procurando que las respuestas reflejen su
                    situación institucional real.
                </p>
                <p style="margin-bottom: 10px; text-align: justify;">
                    Por esta razón, recomendamos que su diligenciamiento sea coordinado por el punto focal de
                    la entidad y que, cuando sea necesario, se consulte a las áreas de tecnología, planeación,
                    datos, seguridad de la información, talento humano u otras dependencias que puedan aportar
                    información para responder con precisión.
                </p>
                <p style="margin-bottom: 10px; text-align: justify;">
                    Cada criterio deberá valorarse en una escala de <strong>1 a 5</strong>, donde:<br>
                    <strong>1 = Inicial | 2 = Gestionado | 3 = Definido | 4 = Avanzado | 5 =
                        Optimizado</strong>
                </p>
                <p style="margin-bottom: 10px; text-align: justify;">
                    No será necesario adjuntar evidencias documentales. Sin embargo, agradecemos responder con
                    la mayor objetividad posible, considerando si la entidad cuenta efectivamente con
                    procesos, responsables, instrumentos o soportes que respalden cada valoración.
                </p>
                <p style="margin-bottom: 10px; text-align: justify;">
                    ⏱️ <strong>Tiempo estimado de diligenciamiento:</strong> entre 30 y 60 minutos.<br>
                    🏛️ <strong>Se debe registrar una única respuesta por entidad.</strong>
                </p>

                <p style="margin-bottom: 10px; text-align: justify;">
                    Los resultados permitirán orientar de manera más precisa el <strong>acompañamiento técnico
                        y la ruta de fortalecimiento</strong> de cada entidad dentro del Proyecto IA para el
                    Estado.
                </p>

                @if ($errors->any())
                    @php
                        $firstErrorField = array_key_first($errors->getMessages());
                        $errorMessages = collect($errors->all());
                        $errorCount = $errorMessages->count();
                    @endphp
                @endif

                <strong>Términos y Política de Tratamiento de Datos</strong>
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
                    dato, los cuales podrá ejercer a través de <a href="mailto:minticresponde@mintic.gov.co"
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
                    <input type="checkbox" form="formulario-postulacion"
                        class="form-check-input @error('autoriza_tratamiento_datos_personales') is-invalid @enderror"
                        id="autoriza_tratamiento_datos_personales" name="autoriza_tratamiento_datos_personales"
                        value="1" {{ old('autoriza_tratamiento_datos_personales') ? 'checked' : '' }} required>
                    <label class="form-check-label" for="autoriza_tratamiento_datos_personales">
                        <strong>Autorizo el tratamiento de mis datos personales conforme a lo descrito (*)</strong>
                    </label>
                    @error('autoriza_tratamiento_datos_personales')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <form id="formulario-postulacion" method="POST" action="{{ route('postulacion.store') }}"
                enctype="multipart/form-data" class="needs-validation" novalidate>
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
                        <div class="step-label">Ámbito 1</div>
                    </div>
                    <div class="step-item" data-step="4">
                        <div class="step-dot"><span>4</span></div>
                        <div class="step-label">Ámbito 2</div>
                    </div>
                    <div class="step-item" data-step="5">
                        <div class="step-dot"><span>5</span></div>
                        <div class="step-label">Ámbito 3</div>
                    </div>
                    <div class="step-item" data-step="6">
                        <div class="step-dot"><span>6</span></div>
                        <div class="step-label">Ámbito 4</div>
                    </div>
                    <div class="step-item" data-step="7">
                        <div class="step-dot"><span>7</span></div>
                        <div class="step-label">Ámbito 5</div>
                    </div>
                    <div class="step-item" data-step="8">
                        <div class="step-dot"><span>8</span></div>
                        <div class="step-label">Ámbito 6</div>
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
                            <select class="form-control @error('tipo_entidad') is-invalid @enderror" id="tipo_entidad"
                                name="tipo_entidad" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.tipo_entidad') as $opcion)
                                    <option {{ old('tipo_entidad') == $opcion ? 'selected' : '' }}>{{ $opcion }}
                                    </option>
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
                            <select class="form-control @error('departamento') is-invalid @enderror" id="departamento"
                                name="departamento" required>
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
                                    <option {{ old('categoria_territorial') == $opcion ? 'selected' : '' }}>
                                        {{ $opcion }}</option>
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
                            <input type="text"
                                class="form-control @error('nombres_apellidos') is-invalid @enderror"
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
                                    <option {{ old('tipo_documento') == $opcion ? 'selected' : '' }}>
                                        {{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('tipo_documento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label for="numero_documento">Número de documento *</label>
                            <input type="text"
                                class="form-control @error('numero_documento') is-invalid @enderror"
                                id="numero_documento" name="numero_documento" value="{{ old('numero_documento') }}"
                                required>
                            @error('numero_documento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="cargo">Cargo o rol que desempeña *</label>
                            <input type="text" class="form-control @error('cargo') is-invalid @enderror"
                                id="cargo" name="cargo" value="{{ old('cargo') }}" required>
                            @error('cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="dependencia">Dependencia o área *</label>
                            <select class="form-control @error('dependencia') is-invalid @enderror" id="dependencia"
                                name="dependencia" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('instrumento.dependencia') as $opcion)
                                    <option {{ old('dependencia') == $opcion ? 'selected' : '' }}>{{ $opcion }}
                                    </option>
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
                                    <option {{ old('tipo_vinculacion') == $opcion ? 'selected' : '' }}>
                                        {{ $opcion }}</option>
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

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-2">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-2" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 3. Evaluación A1 ==================== --}}
                <div class="form-step" data-step="3">
                    <div class="section-header">
                        <span class="section-badge">3</span>
                        <i class="fas fa-clipboard-check section-icon"></i>
                        <span class="section-title">Ámbito 1. {{ config('instrumento.ambitos.A1.label') }}</span>
                    </div>

                    @include('partials.rubrica-legend')

                    @foreach (config('instrumento.ambitos.A1.preguntas') as $pregunta)
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

                {{-- ==================== PASO 4. Evaluación A2 ==================== --}}
                <div class="form-step" data-step="4">
                    <div class="section-header">
                        <span class="section-badge">4</span>
                        <i class="fas fa-database section-icon"></i>
                        <span class="section-title">Ámbito 2. {{ config('instrumento.ambitos.A2.label') }}</span>
                    </div>

                    @include('partials.rubrica-legend')

                    @foreach (config('instrumento.ambitos.A2.preguntas') as $pregunta)
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

                {{-- ==================== PASO 5. Evaluación A3 ==================== --}}
                <div class="form-step" data-step="5">
                    <div class="section-header">
                        <span class="section-badge">5</span>
                        <i class="fas fa-laptop-code section-icon"></i>
                        <span class="section-title">Ámbito 3. {{ config('instrumento.ambitos.A3.label') }}</span>
                    </div>

                    @include('partials.rubrica-legend')

                    @foreach (config('instrumento.ambitos.A3.preguntas') as $pregunta)
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

                {{-- ==================== PASO 6. Evaluación A4 ==================== --}}
                <div class="form-step" data-step="6">
                    <div class="section-header">
                        <span class="section-badge">6</span>
                        <i class="fas fa-shield-alt section-icon"></i>
                        <span class="section-title">Ámbito 4. {{ config('instrumento.ambitos.A4.label') }}</span>
                    </div>

                    @include('partials.rubrica-legend')

                    @foreach (config('instrumento.ambitos.A4.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-6">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-6" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 7. Evaluación A5 ==================== --}}
                <div class="form-step" data-step="7">
                    <div class="section-header">
                        <span class="section-badge">7</span>
                        <i class="fas fa-users-cog section-icon"></i>
                        <span class="section-title">Ámbito 5. {{ config('instrumento.ambitos.A5.label') }}</span>
                    </div>

                    @include('partials.rubrica-legend')

                    @foreach (config('instrumento.ambitos.A5.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-7">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-7" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ==================== PASO 8. Evaluación A6 ==================== --}}
                <div class="form-step" data-step="8">
                    <div class="section-header">
                        <span class="section-badge">8</span>
                        <i class="fas fa-bullseye section-icon"></i>
                        <span class="section-title">Ámbito 6. {{ config('instrumento.ambitos.A6.label') }}</span>
                    </div>

                    @include('partials.rubrica-legend')

                    @foreach (config('instrumento.ambitos.A6.preguntas') as $pregunta)
                        @include('partials.pregunta-rubrica', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-8">
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

            // ----- Gate: el wizard solo aparece tras aceptar términos y condiciones -----
            const terminosCheckbox = document.getElementById('autoriza_tratamiento_datos_personales');

            function actualizarVisibilidadFormulario() {
                if (terminosCheckbox.checked) {
                    formulario.classList.add('visible');
                } else {
                    formulario.classList.remove('visible');
                }
            }

            terminosCheckbox.addEventListener('change', function() {
                actualizarVisibilidadFormulario();
                if (terminosCheckbox.checked) {
                    setTimeout(() => formulario.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    }), 50);
                }
            });

            actualizarVisibilidadFormulario();

            // ----- Wizard: navegación por pasos -----
            let currentStep = 1;
            const TOTAL_STEPS = 8;

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

            // Verifica en el servidor si una entidad ya tiene postulación registrada.
            async function verificarEntidadRegistrada(nombreEntidad) {
                try {
                    const res = await fetch(
                        `{{ url('/postulaciones/check-documento') }}?nombre_entidad=${encodeURIComponent(nombreEntidad)}`
                    );
                    const data = await res.json();
                    return data.exists;
                } catch (e) {
                    return false;
                }
            }

            // Verifica en el servidor si la entidad o el documento ya están registrados.
            // Se ejecuta al avanzar del Paso 2 (ya se conocen nombre_entidad y numero_documento).
            async function checkDuplicado() {
                const numero = document.getElementById('numero_documento').value.trim();
                const entidad = document.getElementById('nombre_entidad').value.trim();
                const correo = document.getElementById('correo_institucional').value.trim();
                try {
                    const res = await fetch(
                        `{{ url('/postulaciones/check-documento') }}?numero_documento=${encodeURIComponent(numero)}&nombre_entidad=${encodeURIComponent(entidad)}&correo_institucional=${encodeURIComponent(correo)}`
                    );
                    const data = await res.json();
                    if (data.exists) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Postulación ya registrada',
                            text: 'Ya existe una postulación registrada con este correo o este número de documento.',
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
                            question.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
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

            // Última pregunta (Ámbito 6) + checkbox de términos validan antes de permitir el envío del formulario.
            const btnSubmit = document.getElementById('btn-submit');
            const lastStepEl = document.querySelector(`.form-step[data-step="${TOTAL_STEPS}"]`);
            btnSubmit.addEventListener('click', function(e) {
                const invalid = validateStep(lastStepEl) ||
                    (!terminosCheckbox.checkValidity() ? terminosCheckbox : null);
                if (invalid) {
                    e.preventDefault();
                    shakeBtn(btnSubmit.id);
                    const question = invalid.closest('.row, .col-12') || invalid;
                    question.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    invalid.reportValidity();
                }
            });

            formulario.addEventListener('submit', function(e) {
                const submitBtn = formulario.querySelector('button[type="submit"]');
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
                    el.addEventListener('mousedown', async function(e) {
                        inputEntidad.value = item.NOMBRE;
                        suggestionsBox.innerHTML = '';
                        suggestionsBox.style.display = 'none';
                        inputEntidad.dispatchEvent(new Event('input'));

                        const yaRegistrada = await verificarEntidadRegistrada(item
                            .NOMBRE);
                        if (yaRegistrada) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Entidad ya registrada',
                                text: 'Esta entidad ya tiene una postulación registrada. No es posible registrarla nuevamente.',
                                confirmButtonText: 'Entendido'
                            });
                        }
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
                    let el = document.getElementsByName(fieldWithError)[0] || document.getElementById(
                        fieldWithError);
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
