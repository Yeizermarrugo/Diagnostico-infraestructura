<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Opciones fijas de selección — Sección I
    |--------------------------------------------------------------------------
    */

    'orden_entidad' => [
        'Nacional',
        'Departamental',
        'Municipal',
        'Distrital',
    ],

    'sector_publico' => [
        'Interior',
        'Relaciones Exteriores',
        'Hacienda y Crédito Público',
        'Defensa Nacional',
        'Agricultura y Desarrollo Rural',
        'Salud y Protección Social',
        'Trabajo',
        'Minas y Energía',
        'Comercio, Industria y Turismo',
        'Educación',
        'Ambiente y Desarrollo Sostenible',
        'Vivienda, Ciudad y Territorio',
        'Tecnologías de la Información y las Comunicaciones',
        'Transporte',
        'Cultura',
        'Inclusión Social y Reconciliación',
        'Deporte',
        'Ciencia, Tecnología e Innovación',
        'Estadística',
        'Función Pública',
        'Planeación',
        'Justicia y del Derecho',
        'Inteligencia Estratégica y Contrainteligencia',
        'Igualdad y Equidad',
    ],

    'num_funcionarios_ti' => [
        '0',
        '1-10',
        '11-30',
        '31-50',
        '51-100',
        'Más de 100',
    ],

    'presupuesto_anual_ti' => [
        'Menos de 500',
        '500-1.500',
        '1.501-3.000',
        '3.001-6.000',
        '6.001-12.000',
        'Más de 12.000',
    ],

    /*
    |--------------------------------------------------------------------------
    | Opciones fijas de selección — Secciones II a IX
    |--------------------------------------------------------------------------
    */

    'opciones' => [
        'tiene_centro_servidores_propio' => ['Sí', 'No', 'Tercerizado'],

        'usa_nube' => ['Sí', 'En proceso de contratación', 'No', 'Lo hemos evaluado sin contratar'],

        'modelo_tecnologico_predominante' => ['Servidores propios (On-premise)', 'Nube', 'Combinación de ambos', 'Sin definir', 'Otros'],

        'dispone_gpu' => ['Sí, propios', 'Sí, en nube', 'Ambos', 'No'],

        'tecnologias_gestion' => [
            'Máquinas virtuales (VMware, Hyper-V, etc.)',
            'Contenedores (Docker, Kubernetes, etc.)',
            'Servidores físicos tradicionales',
            'Infraestructura en la nube pública, privada o híbrida (AWS, Azure, Google Cloud, etc.)',
            'No utiliza',
            'Desconoce',
            'Otros (indique cual)',
        ],

        'herramientas_bigdata' => [
            'Plataformas de procesamiento distribuido (Hadoop, Spark, etc.)',
            'Almacenes de datos centralizados (Data Warehouse)',
            'Bases de datos NoSQL',
            'No utiliza',
            'Desconoce',
            'Otros (indique cual)',
        ],

        'arquitectura_almacenamiento' => [
            'Almacenamiento distribuido (HDFS, Ceph, etc.)',
            'Almacenamiento en objeto compatible con estándares cloud (S3, MinIO, etc.)',
            'Almacenamiento centralizado tradicional',
            'No cuenta',
            'Desconoce',
            'Otros (indique cual)',
        ],

        'sistemas_analisis_ia' => [
            'Power BI',
            'Tableau',
            'SAS',
            'Python',
            'TensorFlow',
            'PyTorch',
            'Ninguno',
            'Otros (indique cual)',
        ],

        'conoce_marco_interoperabilidad' => ['Sí, implementado', 'En proceso de adopción', 'Conocido, pero no implementado', 'Desconocido'],

        'usa_lcii' => ['Sí', 'En proceso', 'No', 'Desconoce el estándar'],

        'datos_estandarizados' => ['Totalmente', 'Parcialmente', 'No', 'En proceso de estandarización'],

        'usa_xroad' => ['Sí, en uso', 'En proceso de integración', 'No, pero la conoce', 'No la conoce'],

        'usa_scd' => ['Sí, todos', 'Algunos', 'No', 'No aplica'],

        'etapa_uso_ia' => [
            'Sin iniciativas',
            'En consulta inicial',
            'Con proyectos piloto o pruebas en curso',
            'Con proyectos operando formalmente',
            'Con IA integrada institucionalmente',
        ],

        'politica_gobierno_datos' => ['Sí, formalmente aprobada', 'En construcción', 'No existe', 'Desconoce'],

        'proyectos_ia_ejecucion' => ['Sí, en producción', 'Sí, en piloto', 'En planeación', 'No'],

        'num_proyectos_ia' => ['0', '1–3', '4–10', 'Más de 10'],

        'tipos_aplicaciones_ia' => [
            'NLP',
            'Visión por computador',
            'Analítica predictiva',
            'Chatbots',
            'ML clásico',
            'LLMs',
            'No utiliza',
            'Otro',
        ],

        'cancelo_proyectos_ia_por_infra' => ['Sí', 'No', 'No aplica'],

        'frecuencia_procesamiento' => ['Tiempo real', 'Por lotes cada hora', 'Diaria', 'Semanal', 'Otra'],

        'sla_disponibilidad_esperado' => ['99,0%', '99,5%', '99,9%', '99,99%', 'No definido'],

        'crecimiento_demanda_esperado' => ['Sin crecimiento', 'Moderado (10–30%)', 'Alto (31–100%)', 'Muy alto (>100%)', 'No sé'],

        'conoce_lineamientos_mspi_ia' => ['Aplicados y verificados', 'Aplicados parcialmente', 'Conocidos, pero no aplicados', 'No los conoce'],

        'analisis_riesgos_ia_especifico' => ['Sí, documentado y aprobado', 'En elaboración', 'No se ha realizado', 'Desconoce'],

        'clasificacion_datos_mspi' => ['Todos los conjuntos de datos', 'Algunos conjuntos de datos', 'Ninguno', 'No aplica, no procesa datos con modelos de IA'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Valores de la opción "Otros" que activan el campo de texto libre asociado
    |--------------------------------------------------------------------------
    */

    'otros_valor' => [
        'modelo_tecnologico_predominante' => 'Otros',
        'tecnologias_gestion' => 'Otros (indique cual)',
        'herramientas_bigdata' => 'Otros (indique cual)',
        'arquitectura_almacenamiento' => 'Otros (indique cual)',
        'sistemas_analisis_ia' => 'Otros (indique cual)',
        'tipos_aplicaciones_ia' => 'Otro',
        'frecuencia_procesamiento' => 'Otra',
    ],

    /*
    |--------------------------------------------------------------------------
    | Escala Likert (valoración de barreras) — 10 afirmaciones, 1 a 5
    |--------------------------------------------------------------------------
    */

    'escala_likert' => [
        1 => 'Totalmente en desacuerdo',
        2 => 'En desacuerdo',
        3 => 'Neutral',
        4 => 'De acuerdo',
        5 => 'Totalmente de acuerdo',
    ],

    /*
    |--------------------------------------------------------------------------
    | Ítems del ranking de prioridades (P45)
    |--------------------------------------------------------------------------
    */

    'ranking_items' => [
        ['campo' => 'prioridad_gpu', 'label' => 'Mayor capacidad de GPU'],
        ['campo' => 'prioridad_almacenamiento', 'label' => 'Más almacenamiento'],
        ['campo' => 'prioridad_conectividad', 'label' => 'Mejor conectividad'],
        ['campo' => 'prioridad_talento', 'label' => 'Talento especializado'],
        ['campo' => 'prioridad_herramientas', 'label' => 'Mejores herramientas de gestión'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Secciones II a IX — preguntas, en el mismo orden del instrumento.
    |--------------------------------------------------------------------------
    |
    | Fuente única de verdad para validación (StoreDiagnosticoRequest) y vista
    | (diagnostico.blade.php + partials/campo-diagnostico.blade.php). La
    | Sección I se renderiza con markup propio (autocompletar de entidad,
    | campos simples) y no está aquí.
    |
    | tipo: select | multiselect | texto | texto_largo | texto_largo_archivo |
    |       sino | ranking (P45, manejado aparte) | likert (bloque aparte)
    |
    */

    'secciones' => [
        'II' => [
            'label' => 'Estado actual de infraestructura',
            'preguntas' => [
                ['campo' => 'tiene_centro_servidores_propio', 'numero' => 8, 'tipo' => 'select', 'opciones' => 'tiene_centro_servidores_propio',
                    'texto' => '¿La entidad cuenta con un cuarto o centro de servidores propio, instalado en sus instalaciones físicas, para el procesamiento de grandes volúmenes de datos? (On-premise)'],
                ['campo' => 'usa_nube', 'numero' => 9, 'tipo' => 'select', 'opciones' => 'usa_nube',
                    'texto' => '¿La entidad utiliza servicios de computación en la nube pública, privada o híbrida para sus operaciones?',
                    'ayuda' => 'La nube es un servicio que permite almacenar información y ejecutar aplicaciones a través de internet. Ejemplos: Google Cloud, Microsoft Azure, Amazon Web Services (AWS).'],
                ['campo' => 'modelo_tecnologico_predominante', 'numero' => 10, 'tipo' => 'select', 'opciones' => 'modelo_tecnologico_predominante', 'otros' => true,
                    'texto' => '¿Cuál es el modelo tecnológico que predomina actualmente en la entidad para alojar sus sistemas e información?',
                    'ayuda' => 'Servidores propios: equipos físicos en la entidad. Nube: servicios externos por internet. Combinación: uso de ambos.'],
                ['campo' => 'recursos_tecnologicos_descripcion', 'numero' => 11, 'tipo' => 'texto_largo_archivo', 'archivo' => 'recursos_tecnologicos_archivo',
                    'texto' => 'Indique los recursos tecnológicos con que cuenta actualmente la entidad. Si conoce los datos técnicos, puede incluirlos; si no, describa de manera aproximada los equipos disponibles.',
                    'ayuda' => 'Incluya, si los conoce: número de servidores físicos y virtuales, capacidad de procesamiento (vCPU/cores), memoria RAM en GB, capacidad de almacenamiento en TB, tarjetas gráficas especializadas (GPU/TPU) y otros equipos.'],
                ['campo' => 'dispone_gpu', 'numero' => 12, 'tipo' => 'select', 'opciones' => 'dispone_gpu',
                    'texto' => '¿La entidad dispone de tarjetas gráficas especializadas (GPU) o procesadores acelerados para tareas de Inteligencia Artificial?'],
                ['campo' => 'tecnologias_gestion', 'numero' => 13, 'tipo' => 'multiselect', 'opciones' => 'tecnologias_gestion', 'otros' => true,
                    'texto' => '¿La entidad utiliza alguna de las siguientes tecnologías para gestionar y ejecutar sus aplicaciones? Seleccione todas las que apliquen.',
                    'ayuda' => 'Máquinas virtuales: equipos simulados dentro de un servidor físico. Contenedores: paquetes de software portátiles que agrupan una aplicación y sus dependencias.'],
                ['campo' => 'herramientas_bigdata', 'numero' => 14, 'tipo' => 'multiselect', 'opciones' => 'herramientas_bigdata', 'otros' => true,
                    'texto' => '¿La entidad utiliza plataformas o herramientas especializadas para procesar y analizar grandes volúmenes de datos (Big Data)? Seleccione todas las que apliquen.',
                    'ayuda' => 'Plataformas de procesamiento distribuido: procesan datos dividiéndolos entre varios equipos. Almacenes de datos centralizados: repositorios que integran información de múltiples fuentes para análisis. Bases de datos NoSQL: almacenan información en formatos flexibles, no en tablas tradicionales.'],
                ['campo' => 'arquitectura_almacenamiento', 'numero' => 15, 'tipo' => 'multiselect', 'opciones' => 'arquitectura_almacenamiento', 'otros' => true,
                    'texto' => '¿La entidad cuenta con arquitecturas de almacenamiento distribuido o masivo? Seleccione todas las que apliquen.',
                    'ayuda' => 'Almacenamiento distribuido: datos repartidos entre varios servidores para mayor capacidad y resiliencia. Almacenamiento centralizado tradicional: un único servidor o dispositivo que guarda toda la información.'],
                ['campo' => 'sistemas_analisis_ia', 'numero' => 16, 'tipo' => 'multiselect', 'opciones' => 'sistemas_analisis_ia', 'otros' => true,
                    'texto' => '¿Cuáles son los principales sistemas de información o plataformas tecnológicas que la entidad utiliza actualmente para el análisis de datos o el desarrollo de iniciativas de IA?'],
                ['campo' => 'mecanismos_respaldo_continuidad', 'numero' => 17, 'tipo' => 'texto_largo',
                    'texto' => 'Describa cómo garantiza la entidad que su información no se pierda ante fallas técnicas o imprevistos. ¿Con qué mecanismos de respaldo, recuperación y continuidad cuenta?',
                    'ayuda' => 'Incluya, si los conoce: sistemas de copia de seguridad, replicación de datos, redundancia de equipos y planes de recuperación ante desastres.'],
                ['campo' => 'indicadores_rendimiento_infraestructura', 'numero' => 18, 'tipo' => 'texto_largo',
                    'texto' => '¿La entidad mide el rendimiento de su infraestructura tecnológica mediante indicadores formales?',
                    'ayuda' => 'Indique si cuenta con mediciones de: disponibilidad del sistema (porcentaje de tiempo en que opera sin interrupciones), tiempo de respuesta (latencia), capacidad de crecimiento (escalabilidad), velocidad de lectura/escritura de datos (IOPS) y capacidad de transferencia de información (ancho de banda).'],
                ['campo' => 'conoce_marco_interoperabilidad', 'numero' => 19, 'tipo' => 'select', 'opciones' => 'conoce_marco_interoperabilidad',
                    'texto' => '¿La entidad ha adoptado o tiene conocimiento del Marco de Interoperabilidad para Gobierno Digital definido por MinTIC?'],
                ['campo' => 'usa_lcii', 'numero' => 20, 'tipo' => 'select', 'opciones' => 'usa_lcii',
                    'texto' => '¿La entidad utiliza el Lenguaje Común de Intercambio de Información (LCII) u otro estándar de intercambio de datos definido por el gobierno nacional?',
                    'ayuda' => 'El LCII es un estándar que permite que diferentes sistemas del Estado compartan información de manera ordenada y comprensible entre sí.'],
                ['campo' => 'datos_estandarizados', 'numero' => 21, 'tipo' => 'select', 'opciones' => 'datos_estandarizados',
                    'texto' => '¿Los datos que gestiona la entidad están organizados bajo formatos estandarizados que permitan compartirlos o integrarlos con los sistemas de otras entidades del Estado?'],
                ['campo' => 'usa_xroad', 'numero' => 22, 'tipo' => 'select', 'opciones' => 'usa_xroad',
                    'texto' => '¿La entidad utiliza o tiene previsto utilizar la Plataforma de Interoperabilidad del Estado (X-Road) para intercambiar información con otras entidades?',
                    'ayuda' => 'X-Road es la plataforma tecnológica del gobierno colombiano que permite que las entidades del Estado compartan información de forma segura y automática.'],
                ['campo' => 'usa_scd', 'numero' => 23, 'tipo' => 'select', 'opciones' => 'usa_scd',
                    'texto' => '¿La entidad hace uso de los Servicios Ciudadanos Digitales (SCD) establecidos en la Política de Gobierno Digital?',
                    'ayuda' => 'Los SCD son servicios tecnológicos que el Estado ofrece a las entidades para facilitar la interacción digital con los ciudadanos, como la carpeta ciudadana o la autenticación digital.'],
            ],
        ],

        'III' => [
            'label' => 'Proyectos de IA y Big Data',
            'preguntas' => [
                ['campo' => 'etapa_uso_ia', 'numero' => 24, 'tipo' => 'select', 'opciones' => 'etapa_uso_ia',
                    'texto' => '¿En qué etapa se encuentra actualmente la entidad respecto al uso de Inteligencia Artificial?'],
                ['campo' => 'politica_gobierno_datos', 'numero' => 25, 'tipo' => 'select', 'opciones' => 'politica_gobierno_datos',
                    'texto' => '¿Existe en la entidad una política, directriz o lineamiento interno aprobado sobre la gestión y gobierno de sus datos?'],
                ['campo' => 'proyectos_ia_ejecucion', 'numero' => 26, 'tipo' => 'select', 'opciones' => 'proyectos_ia_ejecucion',
                    'texto' => '¿La entidad tiene proyectos de IA en ejecución?'],
                ['campo' => 'num_proyectos_ia', 'numero' => 27, 'tipo' => 'select', 'opciones' => 'num_proyectos_ia',
                    'texto' => 'Número de proyectos de IA ejecutados o en ejecución'],
                ['campo' => 'tipos_aplicaciones_ia', 'numero' => 28, 'tipo' => 'multiselect', 'opciones' => 'tipos_aplicaciones_ia', 'otros' => true,
                    'texto' => '¿Qué tipo de aplicaciones de Inteligencia Artificial utiliza o ha utilizado la entidad? Seleccione todas las que apliquen.',
                    'ayuda' => 'NLP: procesamiento de lenguaje natural, sistemas que leen, entienden o generan texto. Visión por computador: reconocimiento de imágenes o video. Analítica predictiva: predicción de comportamientos o resultados. ML: aprendizaje automático clásico. LLMs: modelos de lenguaje avanzados como ChatGPT.'],
                ['campo' => 'soluciones_ia_proyectadas', 'numero' => 29, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué tipo de soluciones de IA proyecta implementar la entidad a corto plazo (1 año) y en el mediano plazo (3 años)?'],
                ['campo' => 'cancelo_proyectos_ia_por_infra', 'numero' => 30, 'tipo' => 'select', 'opciones' => 'cancelo_proyectos_ia_por_infra',
                    'texto' => '¿Ha cancelado o pospuesto proyectos de IA por limitaciones de infraestructura?'],
                ['campo' => 'tiene_laboratorios_alianzas_ia', 'numero' => 31, 'tipo' => 'sino',
                    'texto' => '¿Cuenta la entidad con laboratorios, alianzas o proyectos piloto relacionados con IA?'],
                ['campo' => 'participa_redes_innovacion', 'numero' => 32, 'tipo' => 'sino',
                    'texto' => '¿Participa la entidad en iniciativas interinstitucionales, redes de innovación, semilleros u otros espacios colaborativos?'],
                ['campo' => 'proyectos_cofinanciados', 'numero' => 33, 'tipo' => 'sino',
                    'texto' => '¿Tiene la entidad proyectos cofinanciados o de cooperación técnica con academia, sector privado o cooperación internacional?'],
            ],
        ],

        'IV' => [
            'label' => 'Necesidades futuras de infraestructura',
            'preguntas' => [
                ['campo' => 'volumen_datos_esperado', 'numero' => 34, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué volumen de datos espera manejar la entidad por cada solución proyectada de IA?',
                    'ayuda' => 'Si es posible, diferencie entre: datos para entrenar el modelo de IA, datos que el sistema procesará en operación diaria, y datos históricos que deberán conservarse.'],
                ['campo' => 'frecuencia_procesamiento', 'numero' => 35, 'tipo' => 'select', 'opciones' => 'frecuencia_procesamiento', 'otros' => true,
                    'texto' => '¿Con qué frecuencia necesitaría procesamiento para estos datos?'],
                ['campo' => 'estimacion_capacidad_gpu', 'numero' => 36, 'tipo' => 'texto_largo',
                    'texto' => '¿La entidad tiene estimaciones sobre la capacidad de procesamiento gráfico especializado que requeriría para sus proyectos de IA?',
                    'ayuda' => 'Si cuenta con personal técnico, puede especificar: modelo de GPU, número de núcleos CUDA y memoria de video (VRAM). Si no maneja estos términos, indique si estima necesitar equipos de alto, mediano o bajo rendimiento.'],
                ['campo' => 'estimacion_cpu_ram', 'numero' => 37, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué capacidad de procesamiento y memoria RAM estima que necesitaría la entidad para sus proyectos de IA?',
                    'ayuda' => 'Si conoce los términos técnicos, indique la cantidad de núcleos de procesamiento (vCPU/cores) y memoria RAM en GB. Si no, describa el nivel de demanda esperada de forma aproximada.'],
                ['campo' => 'estimacion_almacenamiento', 'numero' => 38, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué capacidad de almacenamiento estima necesitar para sus proyectos de IA?',
                    'ayuda' => 'Considere, si es posible, el espacio para: entrenamiento del modelo, operación en producción y copias de respaldo. Exprese en GB o TB según corresponda.'],
                ['campo' => 'requiere_almacenamiento_alta_velocidad', 'numero' => 39, 'tipo' => 'sino',
                    'texto' => '¿Estima que la entidad necesitará almacenamiento de alta velocidad para sus operaciones de IA, como discos de estado sólido (SSD) o sistemas de almacenamiento en caché?'],
                ['campo' => 'requiere_bases_datos_especiales', 'numero' => 40, 'tipo' => 'sino',
                    'texto' => '¿La entidad requiere tipos especiales de bases de datos para sus soluciones de IA, distintas a las bases de datos relacionales tradicionales?',
                    'ayuda' => 'Por ejemplo: bases de datos para búsqueda por similitud semántica (vector databases), bases de datos de grafos, bases de datos NoSQL para datos no estructurados, o bases de datos para procesamiento en tiempo real.'],
                ['campo' => 'nivel_velocidad_respuesta', 'numero' => 41, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué nivel de velocidad de respuesta requieren las soluciones de IA que la entidad proyecta implementar?',
                    'ayuda' => 'La velocidad de respuesta se mide en milisegundos. Indique si sus procesos requieren respuesta inmediata (menos de 100 ms), rápida (100–500 ms) o pueden tolerar mayor demora.'],
                ['campo' => 'sla_disponibilidad_esperado', 'numero' => 42, 'tipo' => 'select', 'opciones' => 'sla_disponibilidad_esperado',
                    'texto' => '¿Qué nivel de disponibilidad continua espera para los servicios de IA de la entidad? SLA (Service Level Agreement)'],
                ['campo' => 'requiere_autoescalado', 'numero' => 43, 'tipo' => 'sino',
                    'texto' => '¿Estima que la entidad necesitará que sus servicios de IA puedan crecer o reducirse automáticamente según la demanda, sin intervención manual?',
                    'ayuda' => 'Esta capacidad se conoce como escalamiento automático o auto-scaling.'],
                ['campo' => 'crecimiento_demanda_esperado', 'numero' => 44, 'tipo' => 'select', 'opciones' => 'crecimiento_demanda_esperado',
                    'texto' => '¿Qué crecimiento de demanda de infraestructura de IA espera en los próximos 3 años?'],
                ['numero' => 45, 'tipo' => 'ranking',
                    'texto' => 'Organice asignando una valoración diferente (desde 1 = más urgente, hasta 5 = menos urgente) a cada una de las siguientes necesidades.'],
            ],
        ],

        'V' => [
            'label' => 'Integración, seguridad y costos',
            'preguntas' => [
                ['campo' => 'necesidades_integracion', 'numero' => 46, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué necesidades específicas de integración se identifican con otras plataformas o sistemas, tanto internos como externos?',
                    'ayuda' => 'Por ejemplo: sistemas de gestión documental, bases de datos de otras entidades, plataformas de trámites o servicios al ciudadano, entre otros.'],
                ['campo' => 'requerimientos_seguridad', 'numero' => 47, 'tipo' => 'texto_largo',
                    'texto' => '¿Cuáles son los requerimientos específicos de seguridad que la entidad considera prioritarios?',
                    'ayuda' => 'Considere: protección de datos mediante cifrado, control sobre quién puede acceder a la información, registro de auditoría (trazabilidad), u otros aspectos relevantes.'],
                ['campo' => 'restricciones_nube', 'numero' => 48, 'tipo' => 'texto_largo',
                    'texto' => '¿Existe alguna restricción o limitación en la entidad para el uso de servicios de computación en la nube (pública, privada o híbrida)? En caso afirmativo, descríbala.',
                    'ayuda' => 'Pueden ser restricciones normativas, de seguridad de la información, de soberanía de datos, presupuestales u otras.'],
                ['campo' => 'inversion_proyectada', 'numero' => 49, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué inversión proyecta la entidad para la implementación de soluciones de infraestructura de IA, diferenciando los escenarios de corto (1 año), mediano (3 años) y largo plazo (5 años)? Expresar en dólares.'],
            ],
        ],

        'VII' => [
            'label' => 'Riesgos de seguridad de los sistemas de inteligencia artificial',
            'preguntas' => [
                ['campo' => 'conoce_lineamientos_mspi_ia', 'numero' => 60, 'tipo' => 'select', 'opciones' => 'conoce_lineamientos_mspi_ia',
                    'texto' => '¿La entidad conoce y aplica los Lineamientos de Seguridad y Privacidad de la Información para Sistemas de Inteligencia Artificial del MSPI expedidos por el MinTIC?'],
                ['campo' => 'analisis_riesgos_ia_especifico', 'numero' => 61, 'tipo' => 'select', 'opciones' => 'analisis_riesgos_ia_especifico',
                    'texto' => '¿La entidad ha realizado un análisis formal y documentado de riesgos de seguridad específicos de sus sistemas de inteligencia artificial, diferenciado del análisis de riesgos de seguridad de la información convencional?'],
                ['campo' => 'clasificacion_datos_mspi', 'numero' => 62, 'tipo' => 'select', 'opciones' => 'clasificacion_datos_mspi',
                    'texto' => '¿La entidad clasifica los conjuntos de datos empleados en el entrenamiento, ajuste e inferencia de sus modelos conforme a los niveles de clasificación de la información definidos en el MSPI?'],
            ],
        ],

        'VIII' => [
            'label' => 'Barreras específicas',
            'preguntas' => [
                ['campo' => 'barreras_tecnologicas', 'numero' => 63, 'tipo' => 'texto_largo',
                    'texto' => 'Principales obstáculos o barreras tecnológicas actuales para el desarrollo e implementación de soluciones de IA'],
                ['campo' => 'barreras_normativas', 'numero' => 64, 'tipo' => 'texto_largo',
                    'texto' => 'Principales obstáculos o barreras normativas actuales para el desarrollo e implementación de soluciones de IA'],
                ['campo' => 'barreras_organizacionales', 'numero' => 65, 'tipo' => 'texto_largo',
                    'texto' => 'Principales obstáculos o barreras organizacionales actuales para el desarrollo e implementación de soluciones de IA'],
                ['campo' => 'barreras_financieras', 'numero' => 66, 'tipo' => 'texto_largo',
                    'texto' => 'Principales obstáculos o barreras financieras o presupuestales actuales para el desarrollo e implementación de soluciones de IA'],
                ['campo' => 'dificultades_interoperabilidad_xroad', 'numero' => 67, 'tipo' => 'texto_largo',
                    'texto' => 'Dificultades específicas que enfrenta la entidad para adoptar el Marco de Interoperabilidad para Gobierno Digital o integrarse a la Plataforma X-Road'],
            ],
        ],

        'IX' => [
            'label' => 'Casos de éxito y recomendaciones',
            'preguntas' => [
                ['campo' => 'elementos_prioritarios_habilitar', 'numero' => 68, 'tipo' => 'texto_largo',
                    'texto' => '¿Qué elementos considera prioritarios para habilitar el desarrollo de infraestructura de IA en su entidad (políticas, arquitectura, inversión, asistencia técnica, otros)?'],
                ['campo' => 'casos_exito', 'numero' => 69, 'tipo' => 'texto_largo',
                    'texto' => 'Describa casos de éxito propios de la entidad o conocidos en el sector público donde se haya aplicado IA o Big Data, indicando objetivos, resultados alcanzados y lecciones aprendidas.'],
                ['campo' => 'observaciones_adicionales', 'numero' => 70, 'tipo' => 'texto_largo',
                    'texto' => 'Observaciones o necesidades adicionales no contempladas en este cuestionario'],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Valoración de barreras — Escala Likert 1-5 (P50-59)
    |--------------------------------------------------------------------------
    */

    'likert' => [
        ['campo' => 'likert_infraestructura_suficiente', 'numero' => 50, 'texto' => 'La infraestructura computacional actual de mi entidad es suficiente para las necesidades de IA.'],
        ['campo' => 'likert_presupuesto_adecuado', 'numero' => 51, 'texto' => 'El presupuesto disponible para infraestructura de IA es adecuado.'],
        ['campo' => 'likert_contratacion_facilita', 'numero' => 52, 'texto' => 'Los procesos de contratación pública facilitan la adquisición de tecnología de IA.'],
        ['campo' => 'likert_personal_suficiente', 'numero' => 53, 'texto' => 'Mi entidad cuenta con personal suficiente y capacitado para operar infraestructura de IA.'],
        ['campo' => 'likert_marco_regulatorio_favorece_nube', 'numero' => 54, 'texto' => 'El marco regulatorio actual favorece la adopción de servicios en la nube para IA.'],
        ['campo' => 'likert_soberania_datos_obstaculo', 'numero' => 55, 'texto' => 'Las políticas de soberanía de datos son un obstáculo para el uso de la nube pública.'],
        ['campo' => 'likert_gobernanza_datos_clara', 'numero' => 56, 'texto' => 'Existe una gobernanza clara de datos en mi entidad que facilita los proyectos de IA.'],
        ['campo' => 'likert_conectividad_adecuada', 'numero' => 57, 'texto' => 'La conectividad disponible es adecuada para acceder a servicios de nube para IA.'],
        ['campo' => 'likert_ciberseguridad_suficiente', 'numero' => 58, 'texto' => 'Los estándares de ciberseguridad vigentes son suficientes para proteger los sistemas de IA.'],
        ['campo' => 'likert_falta_interoperabilidad_limita', 'numero' => 59, 'texto' => 'La falta de interoperabilidad entre entidades limita el aprovechamiento de datos para IA.'],
    ],

];
