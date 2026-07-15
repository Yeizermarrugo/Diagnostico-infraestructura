<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Opciones fijas de selección — Sección 1 y 2
    |--------------------------------------------------------------------------
    */

    'tipo_entidad' => [
        'Alcaldía municipal o distrital',
        'Gobernación',
        'Entidad descentralizada territorial',
        'Área metropolitana',
        'Esquema asociativo territorial',
        'Otra entidad pública territorial',
    ],

    'categoria_territorial' => [
        'Categoría especial',
        'Categoría 1',
        'Categoría 2',
        'Categoría 3',
        'Categoría 4',
        'Categoría 5',
        'Categoría 6',
        'No sabe / no responde',
    ],

    'tipo_documento' => [
        'Cédula de ciudadanía',
        'Cédula de extranjería',
        'Permiso por Protección Temporal',
        'Pasaporte',
        'Otro',
    ],

    'dependencia' => [
        'Despacho',
        'Planeación',
        'Secretaría General',
        'TIC/Sistemas/Tecnología',
        'Gobierno Digital',
        'Datos/Analítica/Estadística',
        'Administrativa',
        'Jurídica',
        'Otra',
    ],

    'tipo_vinculacion' => [
        'Carrera administrativa',
        'Libre nombramiento y remoción',
        'Provisional',
        'Contratista',
        'Otro',
    ],

    'es_contacto_comunicacion' => [
        'Sí',
        'No',
        'Está por definirse',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sección 4 — Participación en talleres informativos y disponibilidad
    |--------------------------------------------------------------------------
    */

    'participo_convocatoria_previa' => [
        'Sí, participó',
        'No ha participado',
        'No sabe',
    ],

    'disponibilidad' => [
        'Sí',
        'No',
        'No Sabe',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sección 3 — Evaluación de Dimensiones
    |--------------------------------------------------------------------------
    |
    | Cada pregunta tiene exactamente 4 opciones. El "nivel" (4 a 1) es el
    | valor que se guarda; el texto es descriptivo y único por pregunta.
    | Esta estructura es la fuente única de verdad para validación, vista
    | (wizard) y cálculo de puntajes por dimensión.
    |
    */

    'niveles_legend' => [
        4 => 'Se cumple totalmente',
        3 => 'Se cumple en grado alto',
        2 => 'Se cumple parcialmente',
        1 => 'No se cumple',
    ],

    'dimensiones' => [
        'D1' => [
            'label' => 'Categoría territorial y capacidad institucional',
            'preguntas' => [
                [
                    'campo' => 'p19_categoria_territorial',
                    'numero' => 1,
                    'texto' => '¿En qué categoría territorial se ubica la entidad según la Ley 617 de 2000?',
                    'opciones' => [
                        4 => 'Categoría 4, 5 o 6',
                        3 => 'Categoría 2 o 3',
                        2 => 'Especial o 1',
                        1 => 'No sabe / no responde',
                    ],
                ],
                [
                    'campo' => 'p20_dependencia_tic',
                    'numero' => 2,
                    'texto' => '¿Cuenta con dependencia o responsable formal de TIC o Gobierno Digital?',
                    'opciones' => [
                        4 => 'Dependencia u oficina formal',
                        3 => 'Persona formalmente designada',
                        2 => 'Responsable informal o función compartida',
                        1 => 'No cuenta / No sabe',
                    ],
                ],
                [
                    'campo' => 'p21_personal_datos_sistemas',
                    'numero' => 3,
                    'texto' => '¿Dispone de personal propio de apoyo en datos, sistemas o estadística?',
                    'opciones' => [
                        4 => 'Equipo interno de planta',
                        3 => 'Al menos una persona de planta',
                        2 => 'Principalmente contratistas externos',
                        1 => 'No cuenta / No sabe',
                    ],
                ],
                [
                    'campo' => 'p22_pdt_transformacion_digital',
                    'numero' => 4,
                    'texto' => '¿El Plan de Desarrollo Territorial vigente incluye transformación digital, datos o IA?',
                    'opciones' => [
                        4 => 'Sí, con meta o programa y soporte verificable',
                        3 => 'Sí, mencionado sin soporte',
                        2 => 'En formulación o de forma tangencial',
                        1 => 'No / No sabe',
                    ],
                ],
            ],
        ],

        'D2' => [
            'label' => 'Conectividad y capacidad tecnológica',
            'preguntas' => [
                [
                    'campo' => 'p23_estabilidad_internet',
                    'numero' => 5,
                    'texto' => '¿Cómo es la estabilidad de la conexión a internet en la sede principal?',
                    'opciones' => [
                        4 => 'Estable',
                        3 => 'Con interrupciones frecuentes',
                        2 => 'Limitada o inestable',
                        1 => 'No permanente / No sabe',
                    ],
                ],
                [
                    'campo' => 'p24_velocidad_internet',
                    'numero' => 6,
                    'texto' => '¿Qué velocidad de internet tiene disponible la sede principal?',
                    'opciones' => [
                        4 => '31 Mbps o más',
                        3 => '11 a 30 Mbps',
                        2 => '5 a 10 Mbps',
                        1 => 'Menos de 5 Mbps / No sabe',
                    ],
                ],
                [
                    'campo' => 'p25_equipos_computo',
                    'numero' => 7,
                    'texto' => '¿Dispone de equipos de cómputo para participar en talleres virtuales?',
                    'opciones' => [
                        4 => 'Suficientes',
                        3 => 'Limitados pero operativos',
                        2 => 'Dependería de equipos personales',
                        1 => 'No dispone / No sabe',
                    ],
                ],
                [
                    'campo' => 'p26_participacion_talleres_virtuales',
                    'numero' => 8,
                    'texto' => '¿Puede participar en talleres virtuales mediante Meet, Teams o Zoom?',
                    'opciones' => [
                        4 => 'Sin dificultad',
                        3 => 'Parcial o con apoyo',
                        2 => 'Con restricciones técnicas',
                        1 => 'No / No sabe',
                    ],
                ],
            ],
        ],

        'D3' => [
            'label' => 'Experiencia previa en Gobierno Digital',
            'preguntas' => [
                [
                    'campo' => 'p27_programas_previos_mintic',
                    'numero' => 9,
                    'texto' => '¿Ha participado en programas o convocatorias previas de MinTIC en transformación digital o IA?',
                    'opciones' => [
                        4 => 'Dos o más líneas (incluye Territorios IA)',
                        3 => 'Una línea',
                        2 => 'Inscrita o en gestión sin culminar',
                        1 => 'No / No sabe',
                    ],
                ],
                [
                    'campo' => 'p28_furag_igd',
                    'numero' => 10,
                    'texto' => '¿Ha reportado información en el FURAG o en el Índice de Gobierno Digital?',
                    'opciones' => [
                        4 => 'Sí, vigencia reciente',
                        3 => 'Sí, vigencias anteriores',
                        2 => 'Reporte parcial o incompleto',
                        1 => 'No / No sabe',
                    ],
                ],
                [
                    'campo' => 'p29_datos_abiertos',
                    'numero' => 11,
                    'texto' => '¿Publica datos abiertos en datos.gov.co o en un portal institucional?',
                    'opciones' => [
                        4 => 'datos.gov.co y portal propio',
                        3 => 'datos.gov.co',
                        2 => 'Solo portal propio',
                        1 => 'No / No sabe',
                    ],
                ],
                [
                    'campo' => 'p30_sistemas_informacion_decisiones',
                    'numero' => 12,
                    'texto' => '¿Cuenta con sistemas de información que apoyen la toma de decisiones públicas?',
                    'opciones' => [
                        4 => 'Tres o más sistemas',
                        3 => 'Uno o dos sistemas',
                        2 => 'Sistemas básicos sin uso para decisiones',
                        1 => 'No cuenta / No sabe',
                    ],
                ],
                [
                    'campo' => 'p31_personal_formacion_gd',
                    'numero' => 13,
                    'texto' => '¿Tiene personal con formación en Gobierno Digital, datos o IA?',
                    'opciones' => [
                        4 => 'Formación específica en datos o IA',
                        3 => 'Formación básica en Gobierno Digital',
                        2 => 'Formación informal o autodidacta',
                        1 => 'No / No sabe',
                    ],
                ],
            ],
        ],

        'D4' => [
            'label' => 'Voluntad política y compromiso institucional y de sostenibilidad',
            'preguntas' => [
                [
                    'campo' => 'p32_firma_carta_compromiso',
                    'numero' => 14,
                    'texto' => '¿Quién suscribe la carta de manifestación de interés y compromiso?',
                    'opciones' => [
                        4 => 'Alcalde, gobernador o representante legal',
                        3 => 'Delegado con capacidad acreditada',
                        2 => 'Funcionario sin capacidad acreditada (subsanable)',
                        1 => 'No aplica: la ausencia es eliminatoria',
                    ],
                ],
                [
                    'campo' => 'p33_autoridad_conoce_postulacion',
                    'numero' => 15,
                    'texto' => '¿La máxima autoridad conoce la postulación al proyecto?',
                    'opciones' => [
                        4 => 'Sí, plenamente',
                        3 => 'Sí, informado parcialmente',
                        2 => 'En socialización interna',
                        1 => 'No',
                    ],
                ],
                [
                    'campo' => 'p34_autoridad_compromete_participacion',
                    'numero' => 16,
                    'texto' => '¿La máxima autoridad se compromete a facilitar la participación de su equipo en las actividades?',
                    'opciones' => [
                        4 => 'Sí, sin condiciones',
                        3 => 'Sí, con programación previa',
                        2 => 'Parcial, sujeto a disponibilidad',
                        1 => 'No',
                    ],
                ],
                [
                    'campo' => 'p35_autoridad_garantiza_equipo_canal',
                    'numero' => 17,
                    'texto' => '¿La máxima autoridad garantiza equipo mínimo y delega a la persona que diligencia el formulario como canal oficial?',
                    'opciones' => [
                        4 => 'Sí, delega y compromete dos o más personas',
                        3 => 'Solo compromete equipo, autorización de delegación en trámite',
                        2 => 'En proceso de confirmación',
                        1 => 'No',
                    ],
                ],
            ],
        ],

        'D5' => [
            'label' => 'Potencial de impacto territorial',
            'preguntas' => [
                [
                    'campo' => 'p36_problematica_clara_pertinente',
                    'numero' => 18,
                    'texto' => '¿Qué tan clara o pertinente es la problemática pública que se puede abordar desde el uso de datos o herramientas de IA?',
                    'opciones' => [
                        4 => 'Clara y pertinente',
                        3 => 'Clara, sin precisar su impacto o pertinencia',
                        2 => 'General o vaga',
                        1 => 'Ausente o no pertinente',
                    ],
                ],
                [
                    'campo' => 'p37_datos_fuentes_disponibles',
                    'numero' => 19,
                    'texto' => '¿Dispone de datos o fuentes para abordar la problemática?',
                    'opciones' => [
                        4 => 'Datos propios',
                        3 => 'Datos de otras fuentes públicas',
                        2 => 'Parcialmente',
                        1 => 'No / No sabe',
                    ],
                ],
                [
                    'campo' => 'p38_relacion_meta_pdt',
                    'numero' => 20,
                    'texto' => '¿La problemática se relaciona con una meta o programa del PDT vigente?',
                    'opciones' => [
                        4 => 'Sí, meta o programa identificado',
                        3 => 'Sí, línea estratégica sin meta puntual',
                        2 => 'Mención tangencial',
                        1 => 'No / No sabe',
                    ],
                ],
                [
                    'campo' => 'p39_beneficio_esperado_claro',
                    'numero' => 21,
                    'texto' => '¿Qué tan claro es el beneficio esperado para la entidad y la ciudadanía?',
                    'opciones' => [
                        4 => 'Claro y específico',
                        3 => 'Claro pero general',
                        2 => 'Genérico',
                        1 => 'Ausente',
                    ],
                ],
            ],
        ],
    ],

];