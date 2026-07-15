<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eventos IA | Formulario</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <!-- Fonts & UI -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&family=syne:600,700,800&family=plus-jakarta-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/shards-ui@2.1.0/dist/css/shards.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/inscripcion.css') }}">
    <!-- Vite Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <!-- SweetAlert2 CDN (pon esto antes de </head> o justo antes de </body>) -->
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
                    <h3 class="contenido-formulario-title">Fortaleciendo un Estado digital seguro y confiable:
                        Lineamientos de seguridad y privacidad de la información para sistemas de IA</h3>
                </div>
                <strong>Un espacio técnico para fortalecer la gestión de riesgos, la protección
                    de la información y el uso seguro de la IA en el Estado colombiano.</strong>
                <p style="text-align: justify">
                    El Ministerio de Tecnologías de la Información y las Comunicaciones —MinTIC— y la Universidad de
                    Cartagena, en el marco del Proyecto IA para el Estado, invitan a participar en el evento
                    presencial “Fortaleciendo un Estado digital seguro y confiable: Lineamientos de seguridad y
                    privacidad de la información para sistemas de IA”.
                </p>
                <p style="text-align: justify">
                    Este será un espacio técnico orientado a fortalecer la gestión de riesgos, la protección de la
                    información y el uso seguro de la inteligencia artificial en el Estado colombiano, a partir de la
                    socialización de los lineamientos de seguridad y privacidad de la información para sistemas de
                    IA, en articulación con el Modelo de Seguridad y Privacidad de la Información —MSPI—.
                </p>
                <p style="text-align: justify">
                    El evento se realizará el jueves 30 de julio de 2026, de 8:00 a. m. a 1:00 p. m., con registro
                    desde las 7:15 a. m., en el Hotel Bogotá Plaza, Carrera 18A # 100 - 41, Bogotá D. C. Favor
                    llevar computador portátil pues se realizarán sesiones prácticas durante el evento.
                </p>
                <p style="text-align: justify">
                    Este espacio está dirigido principalmente a oficiales de seguridad de la información,
                    responsables de tecnología, líderes de Gobierno Digital, equipos de seguridad digital, gestión de
                    riesgos, protección de datos personales, arquitectura TI, transformación digital, innovación
                    pública, áreas jurídicas y servidores públicos que participen en la planeación, contratación,
                    implementación, operación o supervisión de sistemas de inteligencia artificial en entidades
                    públicas.
                </p>
                <p style="text-align: justify">
                    Agradecemos diligenciar cuidadosamente la información solicitada. Los datos registrados permitirán
                    gestionar su inscripción, validar el perfil de los asistentes, preparar adecuadamente el
                    desarrollo técnico del evento y generar insumos preliminares sobre el estado de apropiación
                    institucional frente al MSPI, la gestión de riesgos y el uso seguro de sistemas de inteligencia
                    artificial. Por favor, complete todos los campos marcados con un asterisco (*) para asegurar que
                    su postulación sea procesada correctamente.
                </p>

                <div id="terminos-condiciones-block" class="mb-4 p-3 rounded shadow-sm bg-white"
                    style="max-width:700px;margin:auto;">
                    <h4 class="mb-2 font-bold">Términos y Política de Tratamiento de Datos</h4>

                    <p style="margin-bottom: 10px; text-align: justify;">
                        El Ministerio / Fondo Único de TIC se permite solicitar autorización para realizar el
                        tratamiento de sus datos personales, la cual tiene como finalidad: Gestionar el proceso de
                        inscripción, acceso, participación, seguimiento, comunicaciones, certificación de los servidores
                        públicos en el diplomado en "Fortalecimiento de habilidades y herramientas de inteligencia
                        artificial para el sector publico" y compartir
                        información con aliados estratégicos en la ejecución tecnológica que facilitarán las actividades
                        de formación. Para tal fin, usted reconoce que el registro y autorización para el tratamiento de
                        su información personal lo realiza de manera voluntaria y que conoce los derechos que detenta,
                        especialmente a conocer, actualizar y rectificar su información personal, revocar la
                        autorización y solicitar la supresión del dato, los cuales podrá ejercer a través de <a
                            href="mailto:minticresponde@mintic.gov.co"
                            style="color:#1976d2;">minticresponde@mintic.gov.co</a>, la línea telefónica gratuita
                        nacional 01-800-0914014 o en el Punto de Atención al Ciudadano ubicado en el
                        Edificio Murillo Toro, carrera 8 a entre calles 12 y 13 en Bogotá, Colombia. La información
                        suministrada será tratada por el Ministerio/Fondo Único de Tecnologías de la Información y las
                        Comunicaciones como responsable del tratamiento, de acuerdo con la Ley 1581 de 2012 y la
                        Política de Tratamiento de Datos Personales, descrita en la Resolución 2238 de 2024 del
                        Ministerio de TIC, o aquella que la modifique, derogue o sustituya, la cual puede consultar
                        en <a
                            href="https://www.mintic.gov.co/portal/inicio/Secciones-auxiliares/Politicas/2627:Politicas-de-Privacidad-y-Condiciones-de-Uso"
                            target="_blank"
                            style="color:#1976d2;">https://www.mintic.gov.co/portal/inicio/Secciones-auxiliares/Politicas/2627:Politicas-de-Privacidad-y-Condiciones-de-Uso</a>
                    </p>
                    <hr>
                    <p style="margin-bottom: 10px; text-align: justify;">Autorización de tratamiento de datos –
                        Universidad de Cartagena (UdeC)
                        Adicionalmente, el participante manifiesta que ha leído y acepta los Términos de Uso y el Aviso
                        de Privacidad de la Universidad de Cartagena (UdeC) y autoriza el tratamiento de sus datos
                        personales por parte de UdeC, en calidad de responsable del tratamiento, para las siguientes
                        finalidades: gestionar la inscripción, verificación de requisitos, acceso a plataformas,
                        participación académica, seguimiento y acompañamiento, comunicaciones informativas y operativas,
                        emisión de certificados, control de calidad del servicio, fines estadísticos e institucionales,
                        seguridad de la información y cumplimiento de obligaciones legales y contractuales, así como la
                        transmisión y/o transferencia a aliados tecnológicos y académicos estrictamente necesarios para
                        la ejecución del diplomado y bajo acuerdos de protección de datos. El titular podrá ejercer sus
                        derechos de conocer, actualizar, rectificar y suprimir sus datos, así como revocar la
                        autorización, mediante el correo <a href="mailto:datospersonales@unicartagena.edu.co"
                            style="color:#1976d2;">datospersonales@unicartagena.edu.co</a>, o de manera presencial en la
                        Oficina Asesora de Planeación – Datos Personales, Cra. 6 No.
                        36-100, Centro de Cartagena de Indias, CP 130001, Bolívar, Colombia, PBX (+57) 3164390360 ext.
                        165. La política de tratamiento de datos de UdeC puede consultarse en <a
                            href="https://www.unicartagena.edu.co/proteccion-de-datos" target="_blank"
                            style="color:#1976d2;">https://www.unicartagena.edu.co/proteccion-de-datos</a>
                        https://www.unicartagena.edu.co/proteccion-de-datos
                        . UdeC realizará el tratamiento conforme a la Ley 1581 de 2012, sus decretos reglamentarios y
                        las demás normas aplicables.</p>
                    <div class="form-group form-check mb-2" id="terminos_check_label">

                        <input type="checkbox" style="width: 30px"
                            class="form-check-input-term @error('terminos') is-invalid @enderror" id="terminos_acepto"
                            name="terminos" {{ old('terminos') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="terminos_acepto">
                            He leído y acepto los términos y condiciones y la política de tratamiento de datos (*)
                        </label>
                    </div>
                </div>
            </div>



            @if ($errors->any())
                @php
                    // Obtén los nombres de los campos con error
                    $firstErrorField = array_key_first($errors->getMessages());
                    $errorMessages = collect($errors->all());
                    $errorCount = $errorMessages->count();
                @endphp
            @endif
            <form id="formulario-inscripcion" method="POST" action="{{ route('inscripcion.store') }}"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <input type="hidden" name="terminos" id="terminos_hidden" value="{{ old('terminos') ? 'on' : '' }}">

                <div class="steps-progress" id="steps-progress">
                    <div class="step-connector"></div>
                    <div class="step-item active" data-step="1">
                        <div class="step-dot"><span>1</span></div>
                        <div class="step-label">Personal</div>
                    </div>
                    <div class="step-item" data-step="2">
                        <div class="step-dot"><span>2</span></div>
                        <div class="step-label">Contacto</div>
                    </div>
                    <div class="step-item" data-step="3">
                        <div class="step-dot"><span>3</span></div>
                        <div class="step-label">Laboral</div>
                    </div>
                    <div class="step-item" data-step="4">
                        <div class="step-dot"><span>4</span></div>
                        <div class="step-label">Académico</div>
                    </div>
                    {{-- Paso MSPI inactivado temporalmente: ver bloque comentado en data-step="5" abajo --}}
                    <div class="step-item" data-step="5" id="step-dot-5">
                        <div class="step-dot"><span>5</span></div>
                        <div class="step-label">Certificación</div>
                    </div>
                </div>

                <div class="form-step active" data-step="1">
                    <div class="section-header">
                        <span class="section-badge">1</span>
                        <i class="fas fa-user section-icon"></i>
                        <span class="section-title">Información Personal</span>
                    </div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="nombres">Nombres completos *</label>
                        <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres"
                            name="nombres" value="{{ old('nombres') }}" required>
                        @error('nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="apellidos">Apellidos completos *</label>
                        <input type="text" class="form-control @error('apellidos') is-invalid @enderror"
                            id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                        @error('apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <label for="tipo_documento">Tipo de documento de identidad *</label>
                        <select class="form-control @error('tipo_documento') is-invalid @enderror" id="tipo_documento"
                            name="tipo_documento" required>
                            <option value="">Seleccione...</option>
                            <option {{ old('tipo_documento') == 'Cédula de Ciudadanía' ? 'selected' : '' }}>Cédula
                                de
                                Ciudadanía</option>
                            <option {{ old('tipo_documento') == 'Cédula de Extranjería' ? 'selected' : '' }}>Cédula
                                de
                                Extranjería</option>
                            <option
                                {{ old('tipo_documento') == 'Permiso por Protección Temporal (PPT)' ? 'selected' : '' }}>
                                Permiso por Protección Temporal (PPT)</option>
                        </select>
                        @error('tipo_documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="numero_documento">Número de documento de identidad *</label>
                        <input type="number" id="numero_documento" name="numero_documento"
                            class="form-control @error('numero_documento') is-invalid @enderror"
                            value="{{ old('numero_documento') }}" required>
                        @error('numero_documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <br>
                        <label for="numero_documento_confirm">Confirmar documento de identidad *</label>
                        <input type="number" id="numero_documento_confirm" name="numero_documento_confirm"
                            class="form-control @error('numero_documento_confirm') is-invalid @enderror"
                            value="{{ old('numero_documento_confirm') }}" required>


                        @error('numero_documento_confirm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="rango_edad">Rango de edad *</label>
                        <select class="form-control @error('rango_edad') is-invalid @enderror" id="rango_edad"
                            name="rango_edad" required>
                            <option value="">Seleccione...</option>
                            <option {{ old('rango_edad') == 'Menor de 25 años' ? 'selected' : '' }}>Menor de 25
                                años
                            </option>
                            <option {{ old('rango_edad') == '25 a 34 años' ? 'selected' : '' }}>25 a 34 años
                            </option>
                            <option {{ old('rango_edad') == '35 a 44 años' ? 'selected' : '' }}>35 a 44 años
                            </option>
                            <option {{ old('rango_edad') == '45 a 54 años' ? 'selected' : '' }}>45 a 54 años
                            </option>
                            <option {{ old('rango_edad') == '55 a 64 años' ? 'selected' : '' }}>55 a 64 años
                            </option>
                            <option {{ old('rango_edad') == '65 años o más' ? 'selected' : '' }}>65 años o más
                            </option>
                        </select>
                        @error('rango_edad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label>Género *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('genero') is-invalid @enderror" type="radio"
                                    name="genero" id="genero_f" value="Femenino"
                                    {{ old('genero') == 'Femenino' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="genero_f">Femenino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('genero') is-invalid @enderror" type="radio"
                                    name="genero" id="genero_m" value="Masculino"
                                    {{ old('genero') == 'Masculino' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genero_m">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('genero') is-invalid @enderror" type="radio"
                                    name="genero" id="genero_nd" value="Prefiero no decirlo"
                                    {{ old('genero') == 'Prefiero no decirlo' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genero_nd">Prefiero no decirlo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('genero') is-invalid @enderror" type="radio"
                                    name="genero" id="genero_otro" value="Otro"
                                    {{ old('genero') == 'Otro' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genero_otro">Otro</label>
                            </div>
                            @error('genero')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-next-step" id="btn-next-1" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="form-step" data-step="2">
                    <div class="section-header">
                        <span class="section-badge">2</span>
                        <i class="fas fa-address-book section-icon"></i>
                        <span class="section-title">Información de Contacto</span>
                    </div>
                <p style="text-align: justify; color: #555;">
                    La validación de los participantes se realizará mediante el correo institucional asignado a los
                    funcionarios públicos, incluyendo a aquellos que tengan la condición de contratistas. En los casos
                    en que el aspirante no cuente con correo institucional, deberá anexar un documento que acredite su
                    vinculación vigente, como certificado laboral, contrato o acta de posesión.
                </p>

                <!-- Bloque de selección correo institucional -->
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label>¿Tienes correo institucional? *</label><br>
                        <div style="display: flex; gap: 16px;">
                            <div>
                                <input type="radio" id="tiene_correo_si" name="tiene_correo" value="si"
                                    {{ old('tiene_correo') == 'si' ? 'checked' : '' }} required>
                                <label for="tiene_correo_si">Sí</label>
                            </div>
                            <div>
                                <input type="radio" id="tiene_correo_no" name="tiene_correo" value="no"
                                    {{ old('tiene_correo') == 'no' ? 'checked' : '' }} required>
                                <label for="tiene_correo_no">No</label>
                            </div>
                        </div>
                        @if ($errors->has('tiene_correo'))
                            <div class="text-danger">
                                {{ $errors->first('tiene_correo') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3" id="correo_institucional_block">
                            <label for="correo_institucional">Correo electrónico institucional *</label>
                            <input type="email"
                                class="form-control @error('correo_institucional') is-invalid @enderror"
                                id="correo_institucional" name="correo_institucional"
                                value="{{ old('correo_institucional') }}" disabled>
                            <small class="form-text text-muted">Por favor, ingrese el correo institucional
                                oficial.</small>
                            @error('correo_institucional')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="col-12 col-md-6 mb-3">
                                <label for="confirmar_correo_institucional">Confirmar correo electrónico institucional
                                    *</label>
                                <input type="email"
                                    class="form-control @error('confirmar_correo_institucional') is-invalid @enderror"
                                    id="confirmar_correo_institucional" name="confirmar_correo_institucional"
                                    value="{{ old('confirmar_correo_institucional') }}" disabled>
                                @error('confirmar_correo_institucional')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3" id="correo_personal_block">
                            <label for="correo_personal">Correo electrónico personal *</label>
                            <input type="email" class="form-control @error('correo_personal') is-invalid @enderror"
                                id="correo_personal" name="correo_personal" value="{{ old('correo_personal') }}">
                            @error('correo_personal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label for="telefono">Número de teléfono celular *</label>
                            <input type="number" class="form-control @error('telefono') is-invalid @enderror"
                                id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label for="departamento">Departamento de residencia *</label>
                            <select class="form-control @error('departamento') is-invalid @enderror"
                                id="departamento" name="departamento" required>
                                <option value="">Seleccione...</option>
                            </select>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="ciudad">Ciudad/Municipio de residencia *</label>
                            <select class="form-control" id="ciudad" name="ciudad" required disabled>
                                <option value="">Seleccione primero un departamento...</option>
                            </select>
                            @error('ciudad')
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

                <div class="form-step" data-step="3">
                    <div class="section-header">
                        <span class="section-badge">3</span>
                        <i class="fas fa-briefcase section-icon"></i>
                        <span class="section-title">Información Laboral y Profesional</span>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="naturaleza_entidad">Naturaleza de la Entidad Pública *</label>
                            <select class="form-control @error('naturaleza_entidad') is-invalid @enderror"
                                id="naturaleza_entidad" name="naturaleza_entidad" required>
                                <option value="">Seleccione...</option>
                                <option
                                    {{ old('naturaleza_entidad') == 'Rama Ejecutiva - Orden Nacional' ? 'selected' : '' }}>
                                    Rama Ejecutiva - Orden Nacional</option>
                                <option
                                    {{ old('naturaleza_entidad') == 'Rama Ejecutiva - Orden Territorial (Gobernación, Alcaldía, Entidad Descentralizada Territorial)' ? 'selected' : '' }}>
                                    Rama Ejecutiva - Orden Territorial (Gobernación, Alcaldía, Entidad Descentralizada
                                    Territorial)</option>
                                <option {{ old('naturaleza_entidad') == 'Rama Legislativa' ? 'selected' : '' }}>Rama
                                    Legislativa</option>
                                <option {{ old('naturaleza_entidad') == 'Rama Judicial' ? 'selected' : '' }}>Rama
                                    Judicial
                                </option>
                                <option
                                    {{ old('naturaleza_entidad') == 'Órganos de Control (Contraloría, Procuraduría, Defensoría, Auditoría, Personerías)' ? 'selected' : '' }}>
                                    Órganos de Control (Contraloría, Procuraduría, Defensoría, Auditoría, Personerías)
                                </option>
                                <option
                                    {{ old('naturaleza_entidad') == 'Organización Electoral (Registraduría, Consejo Nacional Electoral)' ? 'selected' : '' }}>
                                    Organización Electoral (Registraduría, Consejo Nacional Electoral)</option>
                                <option
                                    {{ old('naturaleza_entidad') == 'Órganos Autónomos e Independientes (Banco de la República, entes universitarios autónomos, CNE, ANTV, etc.)' ? 'selected' : '' }}>
                                    Órganos Autónomos e Independientes (Banco de la República, entes universitarios
                                    autónomos, CNE, ANTV, etc.)</option>
                                <option
                                    {{ old('naturaleza_entidad') == 'Régimen Especial (Docentes del Magisterio, Personal Uniformado, etc.)' ? 'selected' : '' }}>
                                    Régimen Especial (Docentes del Magisterio, Personal Uniformado, etc.)</option>
                            </select>
                            @error('naturaleza_entidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3" style="position:relative;">
                            <label for="nombre_entidad">Nombre completo de la entidad donde labora *</label>
                            <input type="text" class="form-control @error('nombre_entidad') is-invalid @enderror"
                                id="nombre_entidad" name="nombre_entidad" value="{{ old('nombre_entidad') }}"
                                autocomplete="off" required>
                            <div id="entidad_suggestions" class="list-group"
                                style="position:absolute;top:100%;z-index:100;width:100%;"></div>
                            <small class="form-text text-muted">Ej: Departamento Nacional de Planeación; Alcaldía de
                                Medellín; Universidad Nacional de Colombia</small>
                            @error('nombre_entidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="sector_administrativo">Sector Administrativo al que pertenece su entidad
                                    *</label>
                                <select class="form-control @error('sector_administrativo') is-invalid @enderror"
                                    id="sector_administrativo" name="sector_administrativo" required>
                                    <option value="">Seleccione...</option>
                                    <option
                                        {{ old('sector_administrativo') == 'Hacienda y Crédito Público' ? 'selected' : '' }}>
                                        Hacienda y Crédito Público</option>
                                    <option
                                        {{ old('sector_administrativo') == 'Salud y Protección Social' ? 'selected' : '' }}>
                                        Salud y Protección Social</option>
                                    <option {{ old('sector_administrativo') == 'Educación' ? 'selected' : '' }}>
                                        Educación
                                    </option>
                                    <option {{ old('sector_administrativo') == 'Defensa Nacional' ? 'selected' : '' }}>
                                        Defensa
                                        Nacional</option>
                                    <option
                                        {{ old('sector_administrativo') == 'Justicia y del Derecho' ? 'selected' : '' }}>
                                        Justicia y del Derecho</option>
                                    <option {{ old('sector_administrativo') == 'Minas y Energía' ? 'selected' : '' }}>
                                        Minas
                                        y
                                        Energía</option>
                                    <option {{ old('sector_administrativo') == 'Otro' ? 'selected' : '' }}>Otro
                                    </option>
                                </select>
                                @error('sector_administrativo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="cargo">Cargo o rol que desempeña actualmente *</label>
                                <input type="text" class="form-control @error('cargo') is-invalid @enderror"
                                    id="cargo" name="cargo" value="{{ old('cargo') }}" required>
                                @error('cargo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="nivel_jerarquico">Nivel jerárquico de su cargo *</label>
                                <select class="form-control @error('nivel_jerarquico') is-invalid @enderror"
                                    id="nivel_jerarquico" name="nivel_jerarquico" required>
                                    <option value="">Seleccione...</option>
                                    <option {{ old('nivel_jerarquico') == 'Directivo / Gerencial' ? 'selected' : '' }}>
                                        Directivo / Gerencial</option>
                                    <option {{ old('nivel_jerarquico') == 'Asesor' ? 'selected' : '' }}>Asesor</option>
                                    <option
                                        {{ old('nivel_jerarquico') == 'Profesional (Universitario, Especializado)' ? 'selected' : '' }}>
                                        Profesional (Universitario, Especializado)</option>
                                    <option {{ old('nivel_jerarquico') == 'Técnico' ? 'selected' : '' }}>Técnico
                                    </option>
                                    <option {{ old('nivel_jerarquico') == 'Asistencial' ? 'selected' : '' }}>
                                        Asistencial
                                    </option>
                                    <option
                                        {{ old('nivel_jerarquico') == 'Docente / Investigador (para régimen especial y universidades)' ? 'selected' : '' }}>
                                        Docente / Investigador (para régimen especial y universidades)</option>
                                    <option {{ old('nivel_jerarquico') == 'Contratista' ? 'selected' : '' }}>
                                        Contratista
                                    </option>
                                </select>
                                @error('nivel_jerarquico')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-3">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-3" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="form-step" data-step="4">
                    <div class="section-header">
                        <span class="section-badge">4</span>
                        <i class="fas fa-graduation-cap section-icon"></i>
                        <span class="section-title">Perfil Académico y Motivaciones</span>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nivel_estudios">Último nivel de estudios alcanzado *</label>
                                <select class="form-control @error('nivel_estudios') is-invalid @enderror"
                                    id="nivel_estudios" name="nivel_estudios" required>
                                    <option value="">Seleccione...</option>
                                    <option {{ old('nivel_estudios') == 'Bachillerato' ? 'selected' : '' }}>
                                        Bachillerato
                                    </option>
                                    <option {{ old('nivel_estudios') == 'Técnico / Tecnólogo' ? 'selected' : '' }}>
                                        Técnico
                                        /
                                        Tecnólogo</option>
                                    <option {{ old('nivel_estudios') == 'Profesional (Pregrado)' ? 'selected' : '' }}>
                                        Profesional (Pregrado)</option>
                                    <option {{ old('nivel_estudios') == 'Especialización' ? 'selected' : '' }}>
                                        Especialización
                                    </option>
                                    <option {{ old('nivel_estudios') == 'Maestría' ? 'selected' : '' }}>Maestría
                                    </option>
                                    <option {{ old('nivel_estudios') == 'Doctorado' ? 'selected' : '' }}>Doctorado
                                    </option>
                                </select>
                                @error('nivel_estudios')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="area_formacion">Área de conocimiento de su formación principal *</label>
                                <select class="form-control @error('area_formacion') is-invalid @enderror"
                                    id="area_formacion" name="area_formacion" required>
                                    <option value="">Seleccione...</option>
                                    <option
                                        {{ old('area_formacion') == 'Ingeniería, Arquitectura, Urbanismo y afines' ? 'selected' : '' }}>
                                        Ingeniería, Arquitectura, Urbanismo y afines</option>
                                    <option
                                        {{ old('area_formacion') == 'Ciencias Sociales y Humanas' ? 'selected' : '' }}>
                                        Ciencias Sociales y Humanas</option>
                                    <option {{ old('area_formacion') == 'Ciencias de la Salud' ? 'selected' : '' }}>
                                        Ciencias de
                                        la Salud</option>
                                    <option
                                        {{ old('area_formacion') == 'Ciencias de la Educación' ? 'selected' : '' }}>
                                        Ciencias de la Educación</option>
                                    <option
                                        {{ old('area_formacion') == 'Economía, Administración, Contaduría y afines' ? 'selected' : '' }}>
                                        Economía, Administración, Contaduría y afines</option>
                                    <option
                                        {{ old('area_formacion') == 'Matemáticas y Ciencias Naturales' ? 'selected' : '' }}>
                                        Matemáticas y Ciencias Naturales</option>
                                    <option
                                        {{ old('area_formacion') == 'Agronomía, Veterinaria и afines' ? 'selected' : '' }}>
                                        Agronomía, Veterinaria и afines</option>
                                    <option {{ old('area_formacion') == 'Bellas Artes' ? 'selected' : '' }}>Bellas
                                        Artes
                                    </option>
                                </select>
                                @error('area_formacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-8 mb-3">
                                <label for="nivel_ia">¿Cómo calificaría su nivel de conocimiento actual sobre
                                    Inteligencia
                                    Artificial? *</label>
                                <select class="form-control @error('nivel_ia') is-invalid @enderror" id="nivel_ia"
                                    name="nivel_ia" required>
                                    <option value="">Seleccione...</option>
                                    <option
                                        {{ old('nivel_ia') == 'Nulo: No tengo conocimientos sobre el tema.' ? 'selected' : '' }}>
                                        Nulo: No tengo conocimientos sobre el tema.</option>
                                    <option
                                        {{ old('nivel_ia') == 'Básico: He oído hablar del tema y conozco algunos conceptos generales.' ? 'selected' : '' }}>
                                        Básico: He oído hablar del tema y conozco algunos conceptos generales.</option>
                                    <option
                                        {{ old('nivel_ia') == 'Intermedio: Entiendo sus aplicaciones principales y he usado algunas herramientas.' ? 'selected' : '' }}>
                                        Intermedio: Entiendo sus aplicaciones principales y he usado algunas
                                        herramientas.
                                    </option>
                                    <option
                                        {{ old('nivel_ia') == 'Avanzado: Tengo conocimientos técnicos o he trabajado en proyectos relacionados.' ? 'selected' : '' }}>
                                        Avanzado: Tengo conocimientos técnicos o he trabajado en proyectos relacionados.
                                    </option>
                                </select>
                                @error('nivel_ia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-4">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-4" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- Paso MSPI inactivado temporalmente. Reactivar: quitar este comentario Blade,
                     restaurar el step-item data-step="5" del progreso, y volver a renumerar el
                     paso de Certificación (data-step="6", ids btn-prev-6, badge "6"). --}}
                {{--
                <div class="form-step" data-step="5">
                    <div class="section-header">
                        <span class="section-badge">5</span>
                        <i class="fas fa-shield-halved section-icon"></i>
                        <span class="section-title">Caracterización técnica MSPI, riesgos e IA</span>
                    </div>
                    <p style="text-align: justify; color: #555;">
                        Con el propósito de orientar los contenidos del evento y contar con una línea base preliminar
                        sobre el estado de conocimiento, implementación y necesidades de las entidades públicas frente
                        al MSPI y los sistemas de inteligencia artificial, agradecemos responder las siguientes
                        preguntas. Esta información será utilizada únicamente con fines de caracterización,
                        preparación académica del evento y análisis agregado de resultados.
                    </p>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>1. ¿Cuál es su nivel de conocimiento actual sobre el Modelo de Seguridad y
                                Privacidad de la Información —MSPI—?</label>
                            <div>
                                @foreach (['No lo conozco.', 'Lo conozco de manera general.', 'Lo he revisado, pero no participo directamente en su implementación.', 'Participo en su implementación o seguimiento dentro de mi entidad.', 'Lidero o he liderado procesos relacionados con el MSPI.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="mspi_conocimiento"
                                            id="mspi_conocimiento_{{ $i }}" value="{{ $opcion }}" required
                                            {{ old('mspi_conocimiento') == $opcion ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_conocimiento_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>2. ¿En qué estado considera que se encuentra su entidad frente a la implementación
                                del MSPI?</label>
                            <div>
                                @foreach (['No se ha iniciado implementación.', 'Está en etapa de diagnóstico o planeación.', 'Se encuentra en implementación parcial.', 'Se encuentra en implementación avanzada.', 'No tengo información suficiente para responder.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="mspi_estado_implementacion"
                                            id="mspi_estado_implementacion_{{ $i }}"
                                            value="{{ $opcion }}" required
                                            {{ old('mspi_estado_implementacion') == $opcion ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_estado_implementacion_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>3. ¿Su entidad ha identificado o documentado riesgos de seguridad de la
                                información asociados al uso de inteligencia artificial?</label>
                            <div>
                                @foreach (['Sí.', 'No.', 'Parcialmente.', 'No aplica.', 'No tengo información suficiente para responder.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="mspi_riesgos_identificados"
                                            id="mspi_riesgos_identificados_{{ $i }}"
                                            value="{{ $opcion }}" required
                                            {{ old('mspi_riesgos_identificados') == $opcion ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_riesgos_identificados_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>4. ¿Su entidad utiliza actualmente herramientas o sistemas de inteligencia
                                artificial? <small class="text-muted">(selección múltiple)</small></label>
                            <div>
                                @foreach (['Sí, herramientas de IA generativa, como asistentes conversacionales o generación de texto.', 'Sí, herramientas de analítica, automatización o modelos predictivos.', 'Sí, soluciones de IA provistas por terceros.', 'No utiliza actualmente sistemas de IA.', 'Se encuentra evaluando posibles usos.', 'No tengo información suficiente para responder.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="mspi_usa_herramientas_ia[]"
                                            id="mspi_usa_herramientas_ia_{{ $i }}"
                                            value="{{ $opcion }}"
                                            {{ collect(old('mspi_usa_herramientas_ia'))->contains($opcion) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_usa_herramientas_ia_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>5. ¿En qué procesos o áreas considera que su entidad usa o podría usar inteligencia
                                artificial? <small class="text-muted">(selección múltiple)</small></label>
                            <div>
                                @foreach (['Atención al ciudadano.', 'Gestión documental.', 'Análisis de datos.', 'Seguridad digital.', 'Planeación institucional.', 'Contratación pública.', 'Talento humano.', 'Control interno o auditoría.', 'Trámites y servicios digitales.', 'Otro.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mspi_procesos_uso_ia[]"
                                            id="mspi_procesos_uso_ia_{{ $i }}"
                                            value="{{ $opcion }}"
                                            {{ collect(old('mspi_procesos_uso_ia'))->contains($opcion) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_procesos_uso_ia_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                                <input type="text" class="form-control mt-2" name="mspi_procesos_uso_otro"
                                    id="mspi_procesos_uso_otro" placeholder="Especifique otro proceso o área"
                                    value="{{ old('mspi_procesos_uso_otro') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>6. ¿Qué riesgos considera más relevantes frente al uso de IA en su entidad?
                                <small class="text-muted">(selección múltiple)</small></label>
                            <div>
                                @foreach (['Fuga o exposición de datos personales.', 'Uso de información reservada o clasificada en herramientas no autorizadas.', 'Sesgos o discriminación algorítmica.', 'Resultados incorrectos o no verificables.', 'Falta de trazabilidad o explicabilidad.', 'Dependencia excesiva de herramientas de IA.', 'Riesgos contractuales con proveedores tecnológicos.', 'Ciberataques o manipulación de modelos.', 'Falta de capacidades técnicas internas.', 'Otro.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="mspi_riesgos_relevantes[]"
                                            id="mspi_riesgos_relevantes_{{ $i }}"
                                            value="{{ $opcion }}"
                                            {{ collect(old('mspi_riesgos_relevantes'))->contains($opcion) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_riesgos_relevantes_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>7. ¿Su entidad cuenta con lineamientos, políticas o instrucciones internas sobre el
                                uso seguro de herramientas de IA?</label>
                            <div>
                                @foreach (['Sí, formalmente adoptados.', 'Sí, pero de manera preliminar o informal.', 'No, pero se encuentran en construcción.', 'No cuenta con lineamientos internos.', 'No tengo información suficiente para responder.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="mspi_lineamientos_internos"
                                            id="mspi_lineamientos_internos_{{ $i }}"
                                            value="{{ $opcion }}" required
                                            {{ old('mspi_lineamientos_internos') == $opcion ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_lineamientos_internos_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>8. ¿Qué tan preparada considera que está su entidad para gestionar riesgos de
                                seguridad y privacidad asociados a sistemas de IA?</label>
                            <div>
                                @foreach ([
        1 => 'Nada preparada.',
        2 => 'Poco preparada.',
        3 => 'Moderadamente preparada.',
        4 => 'Preparada.',
        5 => 'Muy preparada.',
    ] as $valor => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="mspi_preparacion_riesgos"
                                            id="mspi_preparacion_riesgos_{{ $valor }}"
                                            value="{{ $valor }} - {{ $opcion }}" required
                                            {{ old('mspi_preparacion_riesgos') == $valor . ' - ' . $opcion ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_preparacion_riesgos_{{ $valor }}">{{ $valor }}
                                            - {{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>9. ¿Qué tema le gustaría que se abordara con mayor profundidad durante el evento?
                                <small class="text-muted">(selección múltiple)</small></label>
                            <div>
                                @foreach (['Actualización del MSPI.', 'Gestión de riesgos de seguridad de la información.', 'Lineamientos de seguridad y privacidad para sistemas de IA.', 'Protección de datos personales en sistemas de IA.', 'Riesgos de IA generativa.', 'Controles técnicos mínimos para sistemas de IA.', 'Contratación segura de soluciones de IA.', 'Casos prácticos de implementación en entidades públicas.', 'Otro.'] as $i => $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="mspi_temas_profundizar[]"
                                            id="mspi_temas_profundizar_{{ $i }}"
                                            value="{{ $opcion }}"
                                            {{ collect(old('mspi_temas_profundizar'))->contains($opcion) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="mspi_temas_profundizar_{{ $i }}">{{ $opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="mspi_pregunta_abierta">10. ¿Desea compartir una pregunta o caso específico que
                                le gustaría que fuera abordado durante el evento?</label>
                            <textarea class="form-control" id="mspi_pregunta_abierta" name="mspi_pregunta_abierta" rows="3">{{ old('mspi_pregunta_abierta') }}</textarea>
                        </div>
                    </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-5">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="button" class="btn-step btn-next-step" id="btn-next-5" disabled>
                            Continuar <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                --}}

                <div class="form-step" data-step="5">
                    <div class="section-header">
                        <span class="section-badge">5</span>
                        <i class="fas fa-file-signature section-icon"></i>
                        <span class="section-title">Certificación de Vinculación Laboral</span>
                    </div>

                    <div class="row" id="certificacion_block">
                        <div class="col-12 col-md-8 mb-3">
                            <label for="cert_laboral">Certificación de vinculación laboral *</label>
                            <input type="file"
                                class="form-control-file @error('cert_laboral') is-invalid @enderror"
                                id="cert_laboral" name="cert_laboral" accept=".pdf,.jpg,.jpeg,.png" required>
                            <strong>Este documento es requisito indispensable para poder aplicar</strong>
                            <small class="form-text text-muted">
                                Debe anexar un documento que acredite su vinculación vigente, como certificado laboral,
                                contrato o acta de posesión.. Formato: PDF, JPG o PNG. Tamaño máximo: 5 MB.
                            </small>
                            @error('cert_laboral')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="step-nav">
                        <button type="button" class="btn-step btn-prev-step" id="btn-prev-5">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>
                        <button type="submit" class="btn btn-primary btn-submit-step" id="btn-submit">
                            <i class="fas fa-paper-plane"></i> Enviar inscripción
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <!-- SweetAlert2 scripts para mostrar errores y éxito -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // ----- Términos y animación -----
            var terminosCheck = document.getElementById('terminos_acepto');
            var formulario = document.getElementById('formulario-inscripcion');
            var terminosHidden = document.getElementById('terminos_hidden');
            var inputNombres = document.getElementById('nombres');

            function toggleForm() {
                if (terminosCheck.checked) {
                    formulario.classList.add('visible');
                    if (inputNombres) inputNombres.focus();
                } else {
                    formulario.classList.remove('visible');
                }
            }
            terminosCheck.addEventListener('change', toggleForm);
            toggleForm();

            // ----- Wizard: navegación por pasos -----
            let currentStep = 1;
            const TOTAL_STEPS = 5;

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
                if (firstInvalid) return firstInvalid;

                // Grupos de checkbox (name="...[]") no tienen semántica nativa de
                // "al menos uno marcado": hay que validarlos a mano, uno por pregunta.
                const checkboxGroups = {};
                stepEl.querySelectorAll('input[type="checkbox"][name$="[]"]').forEach(cb => {
                    (checkboxGroups[cb.name] = checkboxGroups[cb.name] || []).push(cb);
                });
                for (const name in checkboxGroups) {
                    const group = checkboxGroups[name];
                    if (!group.some(cb => cb.checked)) return group[0];
                }

                return null;
            }

            // Verifica en el servidor si el número de documento ya está registrado.
            // Se ejecuta al avanzar del Paso 1, antes de pasar al Paso 2.
            async function checkDocumentoDuplicado() {
                const numero = document.getElementById('numero_documento').value.trim();
                try {
                    const res = await fetch(
                        `{{ url('/inscripciones/check-documento') }}?numero_documento=${encodeURIComponent(numero)}`
                    );
                    const data = await res.json();
                    if (data.exists) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Documento ya registrado',
                            text: 'Ya existe una inscripción registrada con este número de documento de identidad.',
                            confirmButtonText: 'Entendido'
                        });
                        return false;
                    }
                    return true;
                } catch (e) {
                    // Si falla la verificación por red, no bloqueamos el avance;
                    // la validación de duplicados definitiva ocurre igual al enviar el formulario.
                    return true;
                }
            }

            const stepAsyncChecks = {
                1: checkDocumentoDuplicado
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
                            if (invalid.type === 'checkbox' && !invalid.hasAttribute('required')) {
                                // Grupo de checkbox sin ninguna opción marcada: no tiene
                                // burbuja nativa de validación, así que avisamos con SweetAlert.
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Faltan preguntas por responder',
                                    text: 'Marca al menos una opción en cada pregunta de selección múltiple antes de continuar.',
                                    confirmButtonText: 'Entendido'
                                });
                            } else {
                                invalid.reportValidity();
                            }
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

                        // Paso 5 (Certificación) se oculta cuando hay correo institucional;
                        // en ese caso el botón "Continuar" del paso 4 envía la inscripción directamente.
                        if (n === 4) {
                            const step5 = document.querySelector('.form-step[data-step="5"]');
                            if (step5 && step5.style.display === 'none') {
                                const submitBtn = document.getElementById('btn-submit');
                                if (submitBtn) submitBtn.click();
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
                terminosHidden.value = terminosCheck.checked ? 'on' : '';
                if (!terminosCheck.checked) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Debes aceptar los términos y condiciones',
                        text: 'Por favor, marca la casilla de aceptación para continuar.',
                        confirmButtonText: 'OK'
                    });
                    return false;
                }
                const submitBtn = formulario.querySelector('button[type="submit"]');
                if (formulario.checkValidity()) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Enviando...';
                    Swal.fire({
                        title: 'Enviando inscripción...',
                        text: 'Por favor espera mientras procesamos tu inscripción.',
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
            const ciudadSelect = document.getElementById('ciudad');
            let municipiosPorDepto = {};

            function restoreOldValues() {
                // Laravel blade: old values
                const oldDepartamento = "{{ old('departamento') }}";
                const oldCiudad = "{{ old('ciudad') }}";
                if (oldDepartamento) {
                    departamentoSelect.value = oldDepartamento;
                    departamentoSelect.dispatchEvent(new Event('change'));
                    if (oldCiudad) {
                        setTimeout(() => {
                            ciudadSelect.value = oldCiudad;
                        }, 300);
                    }
                }
            }

            fetch('./js/colombia.json')
                .then(response => response.json())
                .then(data => {
                    // Agrupa municipios por departamento
                    data.forEach(row => {
                        const depto = row['DEPARTAMENTO'];
                        if (!municipiosPorDepto[depto]) municipiosPorDepto[depto] = [];
                        municipiosPorDepto[depto].push(row['MUNICIPIO']);
                    });

                    // Llena el select de departamentos
                    Object.keys(municipiosPorDepto).sort((a, b) => a.localeCompare(b, 'es', {
                        sensitivity: 'base'
                    })).forEach(depto => {
                        const option = document.createElement('option');
                        option.value = depto;
                        option.textContent = depto;
                        departamentoSelect.appendChild(option);
                    });

                    // Restaurar selección previa (Blade old)
                    @if (old('departamento'))
                        departamentoSelect.value = "{{ old('departamento') }}";
                        departamentoSelect.dispatchEvent(new Event('change'));
                        @if (old('ciudad'))
                            setTimeout(() => {
                                ciudadSelect.value = "{{ old('ciudad') }}";
                            }, 300);
                        @endif
                    @endif
                });

            departamentoSelect.addEventListener('change', function() {
                const depto = this.value;
                ciudadSelect.innerHTML = '';
                if (depto && municipiosPorDepto[depto]) {
                    ciudadSelect.disabled = false;
                    ciudadSelect.appendChild(new Option('Seleccione...', ''));
                    municipiosPorDepto[depto].sort((a, b) => a.localeCompare(b, 'es', {
                        sensitivity: 'base'
                    })).forEach(mun => {
                        ciudadSelect.appendChild(new Option(mun, mun));
                    });
                } else {
                    ciudadSelect.disabled = true;
                    ciudadSelect.appendChild(new Option('Seleccione primero un departamento...', ''));
                }
            });

            // Correo institucional y mostrar/ocultar bloque después de selección
            const tieneCorreoSi = document.getElementById('tiene_correo_si');
            const tieneCorreoNo = document.getElementById('tiene_correo_no');
            const correoInstitucionalBlock = document.getElementById('correo_institucional_block');
            const correoInput = document.getElementById('correo_institucional');
            const confirmarCorreoInput = document.getElementById('confirmar_correo_institucional');
            const certBlock = document.getElementById('certificacion_block');
            const correoPersonalBlock = document.getElementById('correo_personal_block');
            const certLaboralInput = document.getElementById('cert_laboral');
            const formStep5 = document.querySelector('.form-step[data-step="5"]');
            const stepDot5 = document.getElementById('step-dot-5');
            const btnNext4 = document.getElementById('btn-next-4');
            const btnNext4DefaultHtml = btnNext4 ? btnNext4.innerHTML : '';

            // Dominios de correo comunes rechazados como correo institucional (debe coincidir
            // con la lista $dominios_basicos del backend en InscripcionController@store).
            const DOMINIOS_CORREO_BASICOS = ['gmail.com', 'outlook.com', 'hotmail.com', 'yahoo.com',
                'live.com', 'icloud.com'
            ];
            const MSG_DOMINIO_BASICO =
                'El correo institucional no puede ser de dominios comunes como Gmail, Outlook, Hotmail, Yahoo, Live o iCloud.';

            function validarDominioInstitucional(input) {
                const valor = input.value.trim().toLowerCase();
                const dominio = valor.includes('@') ? valor.split('@').pop() : '';
                if (dominio && DOMINIOS_CORREO_BASICOS.includes(dominio)) {
                    input.setCustomValidity(MSG_DOMINIO_BASICO);
                } else {
                    input.setCustomValidity('');
                }
            }
            [correoInput, confirmarCorreoInput].forEach(input => {
                input.addEventListener('input', () => validarDominioInstitucional(input));
                input.addEventListener('change', () => validarDominioInstitucional(input));
            });

            // Mantén la lógica de mostrar/ocultar inputs de correo institucional/certificación como estaba
            function updateCorreoInstitucional() {
                if (tieneCorreoSi.checked) {
                    correoInput.disabled = false;
                    correoInput.required = true;
                    confirmarCorreoInput.disabled = false;
                    confirmarCorreoInput.required = true;
                    certBlock.style.display = 'none';
                    certLaboralInput.required = false;
                    correoPersonalBlock.style.display = 'none';
                    correoInstitucionalBlock.style.display = '';
                    // Con correo institucional no se requiere certificación: se oculta el paso 5 entero
                    // y el botón del paso 4 pasa a enviar la inscripción directamente.
                    if (formStep5) formStep5.style.display = 'none';
                    if (stepDot5) stepDot5.style.display = 'none';
                    if (btnNext4) btnNext4.innerHTML = 'Enviar inscripción <i class="fas fa-paper-plane"></i>';
                } else if (tieneCorreoNo.checked) {
                    correoInput.disabled = true;
                    correoInput.required = false;
                    confirmarCorreoInput.disabled = true;
                    confirmarCorreoInput.required = false;
                    certBlock.style.display = '';
                    certLaboralInput.required = true;
                    correoPersonalBlock.style.display = '';
                    correoInstitucionalBlock.style.display = 'none';
                    if (formStep5) formStep5.style.display = '';
                    if (stepDot5) stepDot5.style.display = '';
                    if (btnNext4) btnNext4.innerHTML = btnNext4DefaultHtml;
                } else {
                    certBlock.style.display = 'none';
                    correoPersonalBlock.style.display = 'none';
                    correoInstitucionalBlock.style.display = 'none';
                    if (formStep5) formStep5.style.display = 'none';
                    if (stepDot5) stepDot5.style.display = 'none';
                    if (btnNext4) btnNext4.innerHTML = btnNext4DefaultHtml;
                }
            }
            tieneCorreoSi.addEventListener('change', updateCorreoInstitucional);
            tieneCorreoNo.addEventListener('change', updateCorreoInstitucional);
            updateCorreoInstitucional();
            validarDominioInstitucional(correoInput);
            validarDominioInstitucional(confirmarCorreoInput);

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
                    el.textContent =
                        `${item.NOMBRE} (${item.DM_INSTITUCION_COD_INSTITUCION})`;
                    el.addEventListener('mousedown', function(
                        e) { // mousedown para que no pierda el foco
                        inputEntidad.value = item.NOMBRE;
                        suggestionsBox.innerHTML = '';
                        suggestionsBox.style.display = 'none';
                    });
                    suggestionsBox.appendChild(el);
                });
                suggestionsBox.style.display = 'block';
            });

            // Ocultar sugerencias si el usuario hace clic fuera
            document.addEventListener('click', function(e) {
                if (!inputEntidad.contains(e.target) && !suggestionsBox.contains(e.target)) {
                    suggestionsBox.innerHTML = '';
                    suggestionsBox.style.display = 'none';
                }
            });

            function syncSuggestionWidth() {
                const input = document.getElementById('nombre_entidad');
                const box = document.getElementById('entidad_suggestions');
                if (input && box) {
                    box.style.width = input.offsetWidth + 'px';
                }
            }
            document.getElementById('nombre_entidad').addEventListener('input', syncSuggestionWidth);
            window.addEventListener('resize', syncSuggestionWidth);
            syncSuggestionWidth(); // Inicial

            // ----- Verificar cupo de inscripciones -----
            const terminos_check_label = document.getElementById('terminos_check_label');
            const LIMITE_INSCRIPCIONES = 7325;

            fetch('inscripcion-total')
                .then(res => res.json())
                .then(data => {
                    if (data.total >= LIMITE_INSCRIPCIONES) {
                        terminos_check_label.style.display = 'none';
                        Swal.fire({
                            icon: 'warning',
                            title: 'Inscripciones cerradas',
                            text: 'El cupo máximo de inscripciones ha sido alcanzado.',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        terminos_check_label.style.display = '';
                    }
                })
                .catch(() => {
                    submitBtn.style.display = '';
                });


            // SweetAlert para errores y éxito igual que antes...
            @if ($errors->any() && $errorCount > 0 && $errorCount <= 5)
                let errorList = {!! json_encode($errorMessages) !!};
                let fieldWithError = "{{ $firstErrorField }}";
                Swal.fire({
                    icon: 'error',
                    title: 'Error en el formulario',
                    html: errorList.map(e => `<div>${e}</div>`).join(''),
                    confirmButtonText: 'OK',
                }).then(function() {
                    let el = document.getElementsByName(fieldWithError)[0];
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
                    title: '¡Inscripción enviada!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
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
