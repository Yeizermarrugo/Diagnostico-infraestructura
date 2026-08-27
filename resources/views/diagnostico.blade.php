<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Diagnóstico de Infraestructura Computacional en IA y Big Data</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <!-- Fonts & UI -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&family=syne:600,700,800&family=plus-jakarta-sans:400,500,600,700"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/shards-ui@2.1.0/dist/css/shards.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/diagnostico.css') }}">
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
                    <h3 class="contenido-formulario-title">Diagnóstico de Infraestructura Computacional en
                        Inteligencia Artificial y Big Data — Proyecto IA para el Estado</h3>
                </div>

                <p style="margin-bottom: 10px; text-align: justify;">
                    Este cuestionario es un instrumento de recolección de información dirigido a las entidades
                    del Estado colombiano que ejecutan, planifican o tienen interés en implementar proyectos
                    basados en <strong>Inteligencia Artificial y Big Data</strong>. Su objetivo es dimensionar
                    la demanda actual y futura de infraestructura computacional, identificar necesidades
                    específicas no satisfechas, y capturar valoraciones sobre barreras y oportunidades
                    percibidas desde la perspectiva institucional.
                </p>
                <p style="margin-bottom: 10px; text-align: justify;">
                    Está dirigido a directores de TI, oficiales de datos o responsables de innovación
                    tecnológica de entidades del orden nacional y territorial. <strong>Se debe registrar una
                        única respuesta por entidad.</strong>
                </p>
                <p style="margin-bottom: 10px; text-align: justify;">
                    ⏱️ <strong>Tiempo estimado de diligenciamiento:</strong> entre 25 y 35 minutos.
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
                    tratamiento de sus datos personales, la cual tiene como finalidad: dimensionar la demanda
                    de infraestructura computacional para Inteligencia Artificial y Big Data, gestionar el
                    seguimiento y eventual acompañamiento técnico de las entidades participantes del Proyecto
                    IA para el Estado, y compartir información con aliados estratégicos en la ejecución técnica
                    que facilitarán las actividades del proyecto. Para tal fin, usted reconoce que el registro
                    y autorización para el tratamiento de su información personal lo realiza de manera
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
                    Adicionalmente, el diligenciante manifiesta que ha leído y acepta los Términos de Uso y el
                    Aviso de Privacidad de la Universidad de Cartagena (UdeC) y autoriza el tratamiento de sus
                    datos personales por parte de UdeC, en calidad de responsable del tratamiento, para las
                    siguientes finalidades: gestionar el diligenciamiento del instrumento, análisis y
                    consolidación de resultados, seguimiento y acompañamiento, comunicaciones informativas y
                    operativas, control de calidad del servicio, fines estadísticos e institucionales,
                    seguridad de la información y cumplimiento de obligaciones legales y contractuales, así
                    como la transmisión y/o transferencia a aliados tecnológicos y académicos estrictamente
                    necesarios para la ejecución del proyecto y bajo acuerdos de protección de datos. El
                    titular podrá ejercer sus derechos de conocer, actualizar, rectificar y suprimir sus
                    datos, así como revocar la autorización, mediante el correo <a
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
                    <input type="checkbox" form="formulario-diagnostico"
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

            <form id="formulario-diagnostico" method="POST" action="{{ route('diagnostico.store') }}"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <div class="steps-progress" id="steps-progress">
                    <div class="step-connector"></div>
                    <div class="step-item active" data-step="1"><div class="step-dot"><span>1</span></div><div class="step-label">Entidad</div></div>
                    <div class="step-item" data-step="2"><div class="step-dot"><span>2</span></div><div class="step-label">Infra I</div></div>
                    <div class="step-item" data-step="3"><div class="step-dot"><span>3</span></div><div class="step-label">Infra II</div></div>
                    <div class="step-item" data-step="4"><div class="step-dot"><span>4</span></div><div class="step-label">Proyectos IA</div></div>
                    <div class="step-item" data-step="5"><div class="step-dot"><span>5</span></div><div class="step-label">Necesidades</div></div>
                    <div class="step-item" data-step="6"><div class="step-dot"><span>6</span></div><div class="step-label">Integración</div></div>
                    <div class="step-item" data-step="7"><div class="step-dot"><span>7</span></div><div class="step-label">Barreras</div></div>
                    <div class="step-item" data-step="8"><div class="step-dot"><span>8</span></div><div class="step-label">Riesgos IA</div></div>
                    <div class="step-item" data-step="9"><div class="step-dot"><span>9</span></div><div class="step-label">Obstáculos</div></div>
                    <div class="step-item" data-step="10"><div class="step-dot"><span>10</span></div><div class="step-label">Cierre</div></div>
                </div>

                {{-- ==================== PASO 1. Identificación de la entidad ==================== --}}
                <div class="form-step active" data-step="1">
                    <div class="section-header">
                        <span class="section-badge">1</span>
                        <i class="fas fa-landmark section-icon"></i>
                        <span class="section-title">Sección I. Identificación de la entidad</span>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3" style="position:relative;">
                            <label for="nombre_entidad">Nombre de la entidad *</label>
                            <input type="text" class="form-control @error('nombre_entidad') is-invalid @enderror"
                                id="nombre_entidad" name="nombre_entidad" value="{{ old('nombre_entidad') }}"
                                autocomplete="off" required>
                            <div id="entidad_suggestions" class="list-group"
                                style="position:absolute;top:100%;z-index:100;width:100%;"></div>
                            @error('nombre_entidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="orden_entidad">Orden de la entidad *</label>
                            <select class="form-control @error('orden_entidad') is-invalid @enderror"
                                id="orden_entidad" name="orden_entidad" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('diagnostico.orden_entidad') as $opcion)
                                    <option {{ old('orden_entidad') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('orden_entidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="sector_publico">Sector público *</label>
                            <select class="form-control @error('sector_publico') is-invalid @enderror"
                                id="sector_publico" name="sector_publico" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('diagnostico.sector_publico') as $opcion)
                                    <option {{ old('sector_publico') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('sector_publico')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label for="nombre_responsable">Nombre de quien diligencia *</label>
                            <input type="text" class="form-control @error('nombre_responsable') is-invalid @enderror"
                                id="nombre_responsable" name="nombre_responsable"
                                value="{{ old('nombre_responsable') }}" required>
                            @error('nombre_responsable')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label for="cargo_responsable">Cargo *</label>
                            <input type="text" class="form-control @error('cargo_responsable') is-invalid @enderror"
                                id="cargo_responsable" name="cargo_responsable"
                                value="{{ old('cargo_responsable') }}" required>
                            @error('cargo_responsable')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="correo_responsable">Correo electrónico de quien diligencia *</label>
                            <input type="email" class="form-control @error('correo_responsable') is-invalid @enderror"
                                id="correo_responsable" name="correo_responsable"
                                value="{{ old('correo_responsable') }}" required>
                            <small class="form-text text-muted">Se usará para enviarte la confirmación de este
                                diligenciamiento y comunicaciones sobre el proceso.</small>
                            @error('correo_responsable')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label>¿La entidad cuenta con un área o equipo especializado en IA, analítica de
                                datos o transformación digital? *</label>
                            <div class="rubrica-escala">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tiene_area_ia"
                                        id="tiene_area_ia_si" value="1"
                                        {{ old('tiene_area_ia') === '1' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="tiene_area_ia_si">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tiene_area_ia"
                                        id="tiene_area_ia_no" value="0"
                                        {{ old('tiene_area_ia') === '0' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="tiene_area_ia_no">No</label>
                                </div>
                            </div>
                            @error('tiene_area_ia')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="num_funcionarios_ti">Número total de funcionarios de TI *</label>
                            <select class="form-control @error('num_funcionarios_ti') is-invalid @enderror"
                                id="num_funcionarios_ti" name="num_funcionarios_ti" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('diagnostico.num_funcionarios_ti') as $opcion)
                                    <option {{ old('num_funcionarios_ti') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('num_funcionarios_ti')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="presupuesto_anual_ti">Presupuesto anual de TI (rango en SMMLV) *</label>
                            <select class="form-control @error('presupuesto_anual_ti') is-invalid @enderror"
                                id="presupuesto_anual_ti" name="presupuesto_anual_ti" required>
                                <option value="">Seleccione...</option>
                                @foreach (config('diagnostico.presupuesto_anual_ti') as $opcion)
                                    <option {{ old('presupuesto_anual_ti') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                                @endforeach
                            </select>
                            @error('presupuesto_anual_ti')
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

                @php
                    $seccionII = config('diagnostico.secciones.II.preguntas');
                    $seccionIIA = array_slice($seccionII, 0, 9); // P8-16
                    $seccionIIB = array_slice($seccionII, 9); // P17-23
                @endphp

                {{-- ==================== PASO 2. Sección II (parte A) ==================== --}}
                <div class="form-step" data-step="2">
                    <div class="section-header">
                        <span class="section-badge">2</span>
                        <i class="fas fa-server section-icon"></i>
                        <span class="section-title">Sección II. {{ config('diagnostico.secciones.II.label') }} (1/2)</span>
                    </div>

                    @foreach ($seccionIIA as $pregunta)
                        @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-2"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-2" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 3. Sección II (parte B) ==================== --}}
                <div class="form-step" data-step="3">
                    <div class="section-header">
                        <span class="section-badge">3</span>
                        <i class="fas fa-network-wired section-icon"></i>
                        <span class="section-title">Sección II. {{ config('diagnostico.secciones.II.label') }} (2/2)</span>
                    </div>

                    @foreach ($seccionIIB as $pregunta)
                        @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-3"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-3" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 4. Sección III ==================== --}}
                <div class="form-step" data-step="4">
                    <div class="section-header">
                        <span class="section-badge">4</span>
                        <i class="fas fa-robot section-icon"></i>
                        <span class="section-title">Sección III. {{ config('diagnostico.secciones.III.label') }}</span>
                    </div>

                    @foreach (config('diagnostico.secciones.III.preguntas') as $pregunta)
                        @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-4"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-4" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 5. Sección IV ==================== --}}
                <div class="form-step" data-step="5">
                    <div class="section-header">
                        <span class="section-badge">5</span>
                        <i class="fas fa-chart-line section-icon"></i>
                        <span class="section-title">Sección IV. {{ config('diagnostico.secciones.IV.label') }}</span>
                    </div>

                    @foreach (config('diagnostico.secciones.IV.preguntas') as $pregunta)
                        @if ($pregunta['tipo'] === 'ranking')
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label>{{ $pregunta['numero'] }}. {{ $pregunta['texto'] }} *</label>
                                    @foreach (config('diagnostico.ranking_items') as $item)
                                        <div class="row align-items-center mb-2">
                                            <div class="col-8">{{ $item['label'] }}</div>
                                            <div class="col-4">
                                                <select class="form-control ranking-select @error($item['campo']) is-invalid @enderror"
                                                    name="{{ $item['campo'] }}" required>
                                                    <option value="">--</option>
                                                    @for ($n = 1; $n <= 5; $n++)
                                                        <option value="{{ $n }}" {{ old($item['campo']) == $n ? 'selected' : '' }}>{{ $n }}</option>
                                                    @endfor
                                                </select>
                                                @error($item['campo'])
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                    <small class="form-text text-muted">1 = más urgente, 5 = menos urgente. No repitas valores.</small>
                                </div>
                            </div>
                        @else
                            @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                        @endif
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-5"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-5" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 6. Sección V ==================== --}}
                <div class="form-step" data-step="6">
                    <div class="section-header">
                        <span class="section-badge">6</span>
                        <i class="fas fa-shield-halved section-icon"></i>
                        <span class="section-title">Sección V. {{ config('diagnostico.secciones.V.label') }}</span>
                    </div>

                    @foreach (config('diagnostico.secciones.V.preguntas') as $pregunta)
                        @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-6"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-6" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 7. Valoración de barreras (Likert) ==================== --}}
                <div class="form-step" data-step="7">
                    <div class="section-header">
                        <span class="section-badge">7</span>
                        <i class="fas fa-scale-balanced section-icon"></i>
                        <span class="section-title">Valoración de barreras</span>
                    </div>

                    @include('partials.likert-legend')

                    @foreach (config('diagnostico.likert') as $afirmacion)
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label>{{ $afirmacion['numero'] }}. {{ $afirmacion['texto'] }} *</label>
                                <div class="rubrica-escala">
                                    @foreach (config('diagnostico.escala_likert') as $nivel => $etiqueta)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error($afirmacion['campo']) is-invalid @enderror"
                                                type="radio" name="{{ $afirmacion['campo'] }}"
                                                id="{{ $afirmacion['campo'] }}_{{ $nivel }}" value="{{ $nivel }}"
                                                {{ old($afirmacion['campo']) == $nivel ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="{{ $afirmacion['campo'] }}_{{ $nivel }}">{{ $nivel }} - {{ $etiqueta }}</label>
                                        </div>
                                    @endforeach
                                    @error($afirmacion['campo'])
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-7"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-7" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 8. Sección VII ==================== --}}
                <div class="form-step" data-step="8">
                    <div class="section-header">
                        <span class="section-badge">8</span>
                        <i class="fas fa-user-shield section-icon"></i>
                        <span class="section-title">Sección VII. {{ config('diagnostico.secciones.VII.label') }}</span>
                    </div>

                    @foreach (config('diagnostico.secciones.VII.preguntas') as $pregunta)
                        @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-8"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-8" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 9. Sección VIII ==================== --}}
                <div class="form-step" data-step="9">
                    <div class="section-header">
                        <span class="section-badge">9</span>
                        <i class="fas fa-triangle-exclamation section-icon"></i>
                        <span class="section-title">Sección VIII. {{ config('diagnostico.secciones.VIII.label') }}</span>
                    </div>

                    @foreach (config('diagnostico.secciones.VIII.preguntas') as $pregunta)
                        @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-9"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-9" disabled>Continuar <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ==================== PASO 10. Sección IX ==================== --}}
                <div class="form-step" data-step="10">
                    <div class="section-header">
                        <span class="section-badge">10</span>
                        <i class="fas fa-lightbulb section-icon"></i>
                        <span class="section-title">Sección IX. {{ config('diagnostico.secciones.IX.label') }}</span>
                    </div>

                    @foreach (config('diagnostico.secciones.IX.preguntas') as $pregunta)
                        @include('partials.campo-diagnostico', ['pregunta' => $pregunta])
                    @endforeach

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-10"><i class="fas fa-arrow-left"></i> Anterior</button>
                        <button type="submit" class="btn btn-primary btn-submit-step" id="btn-submit">
                            <i class="fas fa-paper-plane"></i> Enviar diagnóstico
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formulario = document.getElementById('formulario-diagnostico');

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
                    setTimeout(() => formulario.scrollIntoView({ behavior: 'smooth', block: 'start' }), 50);
                }
            });

            actualizarVisibilidadFormulario();

            // ----- Wizard: navegación por pasos -----
            let currentStep = 1;
            const TOTAL_STEPS = 10;

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
                window.scrollTo({ top: formulario.offsetTop - 20, behavior: 'smooth' });
            }

            function shakeBtn(id) {
                const btn = document.getElementById(id);
                if (!btn) return;
                btn.classList.add('btn-shake');
                btn.addEventListener('animationend', () => btn.classList.remove('btn-shake'), { once: true });
            }

            function validateStep(stepEl) {
                const controls = stepEl.querySelectorAll('input, select, textarea');
                let firstInvalid = null;
                controls.forEach(el => {
                    if (!el.disabled && !el.checkValidity() && !firstInvalid) firstInvalid = el;
                });
                return firstInvalid;
            }

            // Verifica en el servidor si una entidad ya tiene diagnóstico registrado.
            async function checkDuplicado() {
                const entidad = document.getElementById('nombre_entidad').value.trim();
                try {
                    const res = await fetch(
                        `{{ url('/diagnosticos/check-entidad') }}?nombre_entidad=${encodeURIComponent(entidad)}`
                    );
                    const data = await res.json();
                    if (data.exists) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Entidad ya registrada',
                            text: 'Ya existe un diagnóstico registrado para esta entidad.',
                            confirmButtonText: 'Entendido'
                        });
                        return false;
                    }
                    return true;
                } catch (e) {
                    return true;
                }
            }

            const stepAsyncChecks = { 1: checkDuplicado };

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
                            if (!ok) { shakeBtn(nextBtn.id); return; }
                        }

                        goToStep(n + 1);
                    });
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', () => goToStep(n - 1));
                }
            }

            for (let i = 1; i <= TOTAL_STEPS; i++) wireStep(i);

            // ----- Campos "Otros": bloqueados hasta elegir esa opción -----
            document.querySelectorAll('.campo-otros[data-otros-campo]').forEach(function(input) {
                const campo = input.dataset.otrosCampo;
                const valor = input.dataset.otrosValor;
                const controles = document.querySelectorAll(`[name="${campo}"], [name="${campo}[]"]`);

                function sync() {
                    let activo = false;
                    controles.forEach(function(c) {
                        if (c.type === 'checkbox') {
                            if (c.checked && c.value === valor) activo = true;
                        } else if (c.value === valor) {
                            activo = true;
                        }
                    });
                    input.disabled = !activo;
                    if (!activo) input.value = '';
                    input.dispatchEvent(new Event('input'));
                }

                controles.forEach(c => c.addEventListener('change', sync));
                sync();
            });

            // ----- P45 Ranking: oculta en cada select los valores ya usados en los otros -----
            const rankingSelects = Array.from(document.querySelectorAll('.ranking-select'));
            function syncRanking() {
                const usados = rankingSelects.map(s => s.value).filter(v => v !== '');
                rankingSelects.forEach(function(select) {
                    const actual = select.value;
                    Array.from(select.options).forEach(function(opt) {
                        if (opt.value === '') return;
                        opt.hidden = usados.includes(opt.value) && opt.value !== actual;
                    });
                });
            }
            rankingSelects.forEach(s => s.addEventListener('change', syncRanking));
            syncRanking();

            const btnSubmit = document.getElementById('btn-submit');
            const lastStepEl = document.querySelector(`.form-step[data-step="${TOTAL_STEPS}"]`);
            btnSubmit.addEventListener('click', function(e) {
                const invalid = validateStep(lastStepEl) || (!terminosCheckbox.checkValidity() ? terminosCheckbox : null);
                if (invalid) {
                    e.preventDefault();
                    shakeBtn(btnSubmit.id);
                    const question = invalid.closest('.row, .col-12') || invalid;
                    question.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    invalid.reportValidity();
                }
            });

            formulario.addEventListener('submit', function(e) {
                const submitBtn = formulario.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Enviando...';
                Swal.fire({
                    title: 'Enviando diagnóstico...',
                    text: 'Por favor espera mientras procesamos la información.',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => { Swal.showLoading(); }
                });
            });

            // --- Autocompletado de entidad ---
            const inputEntidad = document.getElementById('nombre_entidad');
            const suggestionsBox = document.getElementById('entidad_suggestions');
            let entidades = [];

            fetch('./js/entidadesPublicas.json')
                .then(res => res.json())
                .then(data => { entidades = data; });

            inputEntidad.addEventListener('input', function() {
                const term = inputEntidad.value.trim().toLowerCase();
                suggestionsBox.innerHTML = '';
                if (term.length < 2) { suggestionsBox.style.display = 'none'; return; }

                const matches = entidades.filter(item =>
                    item.NOMBRE.toLowerCase().includes(term) ||
                    item.DM_INSTITUCION_COD_INSTITUCION.toString().includes(term) ||
                    (item.CLASIFICACION_ORGANICA && item.CLASIFICACION_ORGANICA.toLowerCase().includes(term))
                ).sort((a, b) => a.NOMBRE.localeCompare(b.NOMBRE, 'es', { sensitivity: 'base' }));

                if (matches.length === 0) { suggestionsBox.style.display = 'none'; return; }

                matches.forEach(item => {
                    const el = document.createElement('button');
                    el.type = 'button';
                    el.className = 'list-group-item list-group-item-action';
                    el.textContent = `${item.NOMBRE} (${item.DM_INSTITUCION_COD_INSTITUCION})`;
                    el.addEventListener('mousedown', function() {
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
                if (inputEntidad && suggestionsBox) suggestionsBox.style.width = inputEntidad.offsetWidth + 'px';
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
                    let el = document.getElementsByName(fieldWithError)[0] || document.getElementById(fieldWithError);
                    if (el) {
                        const step = el.closest('.form-step');
                        if (step) goToStep(parseInt(step.dataset.step, 10));
                        setTimeout(() => {
                            el.focus();
                            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
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
                    customClass: { popup: 'swal-diagnostico-success', title: 'swal-diagnostico-title' }
                });
            @endif
            @if (session('error'))
                Swal.fire({ icon: 'error', title: '¡Error!', text: '{{ session('error') }}', confirmButtonText: 'OK' });
            @endif
        });
    </script>
</body>

</html>
