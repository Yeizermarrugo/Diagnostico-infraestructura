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

    /*
    |--------------------------------------------------------------------------
    | Sección 3 — Instrumento unificado de autodiagnóstico (F1 + E6)
    |--------------------------------------------------------------------------
    |
    | 38 preguntas agrupadas en 6 ámbitos. Todas comparten la misma escala de
    | valoración 1 (Inicial) a 5 (Optimizado) — no hay texto distinto por
    | opción, se guarda el nivel numérico elegido. Esta estructura es la
    | fuente única de verdad para validación, vista (wizard) y cálculo de
    | puntajes por ámbito.
    |
    */

    'escala_ambitos' => [
        1 => 'Inicial',
        2 => 'Gestionado',
        3 => 'Definido',
        4 => 'Avanzado',
        5 => 'Optimizado',
    ],

    'ambitos' => [
        'A1' => [
            'label' => 'Dirección y gobierno institucional',
            'preguntas' => [
                [
                    'campo' => 'p1_lineamientos_gestion_datos_ia',
                    'numero' => 1,
                    'texto' => '¿La entidad ha adoptado lineamientos para orientar la gestión de datos y el desarrollo de iniciativas de inteligencia artificial?',
                ],
                [
                    'campo' => 'p2_responsable_datos_designado',
                    'numero' => 2,
                    'texto' => '¿La entidad ha designado formalmente un responsable de datos con funciones asociadas a la gestión de datos e inteligencia artificial?',
                ],
                [
                    'campo' => 'p3_instancia_prioriza_casos_uso',
                    'numero' => 3,
                    'texto' => '¿La entidad cuenta con una instancia que prioriza casos de uso, revisa avances y adopta acuerdos de seguimiento?',
                ],
                [
                    'campo' => 'p4_instrumentos_valoran_riesgos',
                    'numero' => 4,
                    'texto' => '¿La entidad ha aplicado instrumentos para valorar riesgos, efectos y condiciones de uso de datos o sistemas asociados a inteligencia artificial para garantizar trazabilidad?',
                ],
                [
                    'campo' => 'p5_persona_responsable_administracion_datos',
                    'numero' => 5,
                    'texto' => '¿La entidad cuenta con una persona responsable de la administración de datos?',
                ],
                [
                    'campo' => 'p6_documenta_ajustes_gestion_datos',
                    'numero' => 6,
                    'texto' => '¿La entidad documenta de manera periódica las acciones de ajuste, revisión y perfeccionamiento aplicadas a la gestión de datos y a los sistemas de inteligencia artificial?',
                ],
            ],
        ],

        'A2' => [
            'label' => 'Gestión de datos',
            'preguntas' => [
                [
                    'campo' => 'p7_inventario_datos_fuentes',
                    'numero' => 7,
                    'texto' => '¿La entidad dispone de un inventario de datos que identifique las fuentes de información con potencial de uso en iniciativas de inteligencia artificial?',
                ],
                [
                    'campo' => 'p8_procedimientos_limpieza_datos',
                    'numero' => 8,
                    'texto' => '¿La entidad ha formalizado y documentado procedimientos para la limpieza, transformación, validación y organización de datos con fines de uso en inteligencia artificial?',
                ],
                [
                    'campo' => 'p9_datos_estandarizados_interoperables',
                    'numero' => 9,
                    'texto' => '¿La entidad dispone de datos estandarizados, interoperables y reutilizables para inteligencia artificial?',
                ],
                [
                    'campo' => 'p10_gestiona_accesos_trazabilidad',
                    'numero' => 10,
                    'texto' => '¿La entidad gestiona accesos y trazabilidad para la consulta, uso, modificación y compartición de datos?',
                ],
                [
                    'campo' => 'p11_datos_formatos_homogeneos',
                    'numero' => 11,
                    'texto' => '¿La entidad tiene los datos en formatos homogéneos?',
                ],
                [
                    'campo' => 'p12_informacion_documentada_estructurada',
                    'numero' => 12,
                    'texto' => '¿La entidad cuenta con información documentada y estructurada que facilite su uso en iniciativas de inteligencia artificial?',
                ],
                [
                    'campo' => 'p13_actividades_basicas_organizacion_datos',
                    'numero' => 13,
                    'texto' => '¿La entidad ha iniciado actividades básicas de organización, depuración o clasificación de datos para facilitar su uso en proyectos de inteligencia artificial?',
                ],
                [
                    'campo' => 'p14_documenta_metadatos_iniciales',
                    'numero' => 14,
                    'texto' => '¿La entidad ha comenzado a documentar atributos, estructura y características de sus datos mediante esquemas iniciales de metadatos?',
                ],
                [
                    'campo' => 'p15_catalogo_institucional_datos',
                    'numero' => 15,
                    'texto' => '¿La entidad ha consolidado un catálogo institucional que organice y describa los conjuntos de datos priorizados para proyectos de inteligencia artificial?',
                ],
                [
                    'campo' => 'p16_datos_abiertos_organizados',
                    'numero' => 16,
                    'texto' => '¿La entidad dispone de conjuntos de datos abiertos organizados, documentados y utilizables en iniciativas de inteligencia artificial?',
                ],
            ],
        ],

        'A3' => [
            'label' => 'Base tecnológica',
            'preguntas' => [
                [
                    'campo' => 'p17_dispone_apis',
                    'numero' => 17,
                    'texto' => '¿La entidad dispone de interfaces de programación (API) que permiten el acceso, consulta o intercambio de datos para iniciativas de inteligencia artificial?',
                ],
                [
                    'campo' => 'p18_capacidad_almacenamiento_procesamiento',
                    'numero' => 18,
                    'texto' => '¿La entidad dispone de capacidad de almacenamiento y procesamiento acorde con sus casos de uso prioritarios?',
                ],
                [
                    'campo' => 'p19_herramientas_analisis_visualizacion',
                    'numero' => 19,
                    'texto' => '¿La entidad cuenta con herramientas para análisis, visualización, modelado o automatización con uso controlado?',
                ],
                [
                    'campo' => 'p20_mecanismos_seguimiento_sistemas_ia',
                    'numero' => 20,
                    'texto' => '¿La entidad cuenta con mecanismos automáticos para hacer seguimiento al funcionamiento de sus sistemas de inteligencia artificial y de los flujos de datos asociados?',
                ],
                [
                    'campo' => 'p21_intercambio_semantico_datos',
                    'numero' => 21,
                    'texto' => '¿La entidad ha implementado mecanismos que permiten el intercambio semántico de datos entre sistemas, plataformas o servicios institucionales?',
                ],
                [
                    'campo' => 'p22_mecanismos_compartir_datos_modelos',
                    'numero' => 22,
                    'texto' => '¿La entidad dispone de mecanismos institucionales para compartir datos y modelos con fines de reutilización, articulación o colaboración?',
                ],
            ],
        ],

        'A4' => [
            'label' => 'Seguridad y privacidad',
            'preguntas' => [
                [
                    'campo' => 'p23_controles_seguridad_riesgos',
                    'numero' => 23,
                    'texto' => '¿La entidad aplica controles de seguridad y gestión de riesgos alineados con su marco institucional?',
                ],
                [
                    'campo' => 'p24_gestiona_datos_personales_privacidad',
                    'numero' => 24,
                    'texto' => '¿La entidad gestiona datos personales e información sensible con criterios de privacidad, minimización y anonimización cuando corresponde?',
                ],
                [
                    'campo' => 'p25_controla_perfiles_accesos_monitoreo',
                    'numero' => 25,
                    'texto' => '¿La entidad controla perfiles, accesos y monitoreo sobre los activos de información usados en analítica o inteligencia artificial?',
                ],
                [
                    'campo' => 'p26_medidas_continuidad_respaldo_incidentes',
                    'numero' => 26,
                    'texto' => '¿La entidad cuenta con medidas de continuidad, respaldo y respuesta a incidentes para servicios y datos críticos?',
                ],
            ],
        ],

        'A5' => [
            'label' => 'Capacidades del equipo humano',
            'preguntas' => [
                [
                    'campo' => 'p27_perfiles_roles_datos_tecnologia',
                    'numero' => 27,
                    'texto' => '¿La entidad dispone de perfiles o roles asociados a datos, tecnología, seguridad y gestión misional del proyecto?',
                ],
                [
                    'campo' => 'p28_funcionarios_certificados_capacitados',
                    'numero' => 28,
                    'texto' => '¿La entidad cuenta con funcionarios certificados o capacitados en datos, analítica o inteligencia artificial?',
                ],
                [
                    'campo' => 'p29_articula_trabajo_interdisciplinario',
                    'numero' => 29,
                    'texto' => '¿La entidad articula trabajo interdisciplinario entre áreas misionales, jurídicas, técnicas y directivas?',
                ],
                [
                    'campo' => 'p30_promueve_nuevas_iniciativas_ia',
                    'numero' => 30,
                    'texto' => '¿La entidad promueve de forma permanente el desarrollo de nuevas iniciativas, capacidades y aplicaciones institucionales basadas en inteligencia artificial?',
                ],
                [
                    'campo' => 'p31_participa_redes_ecosistema_ia',
                    'numero' => 31,
                    'texto' => '¿La entidad participa en redes, iniciativas o mecanismos de articulación que fortalezcan el ecosistema nacional de inteligencia artificial?',
                ],
            ],
        ],

        'A6' => [
            'label' => 'Procesos y valor público',
            'preguntas' => [
                [
                    'campo' => 'p32_piloto_ia_implementado',
                    'numero' => 32,
                    'texto' => '¿La entidad ha desarrollado e implementado piloto(s) de inteligencia artificial o iniciativa(s) basada(s) en datos orientada(s) a evaluar su viabilidad en procesos institucionales y a fortalecer los servicios digitales, la innovación pública o la competitividad territorial?',
                ],
                [
                    'campo' => 'p33_procesos_reglas_negocio_claras',
                    'numero' => 33,
                    'texto' => '¿Los procesos vinculados al caso de uso están descritos y cuentan con reglas de negocio suficientemente claras?',
                ],
                [
                    'campo' => 'p34_mide_reporta_resultados_ia',
                    'numero' => 34,
                    'texto' => '¿La entidad mide y reporta de manera periódica los resultados obtenidos mediante el uso de inteligencia artificial?',
                ],
                [
                    'campo' => 'p35_gestiona_cambio_organizacional',
                    'numero' => 35,
                    'texto' => '¿La entidad gestiona cambios organizacionales, comunicación y apropiación de los resultados por parte de usuarios internos o la ciudadanía?',
                ],
                [
                    'campo' => 'p36_mas_de_un_sistema_ia_funcionamiento',
                    'numero' => 36,
                    'texto' => '¿La entidad tiene en funcionamiento más de un sistema de inteligencia artificial aplicado a procesos institucionales?',
                ],
                [
                    'campo' => 'p37_mide_efectos_sistemas_ia',
                    'numero' => 37,
                    'texto' => '¿La entidad mide los efectos de sus sistemas de inteligencia artificial mediante variables definidas para evaluar resultados institucionales?',
                ],
                [
                    'campo' => 'p38_implementa_modelos_predictivos_avanzados',
                    'numero' => 38,
                    'texto' => '¿La entidad implementa modelos predictivos o herramientas avanzadas de inteligencia artificial con resultados medibles en sostenibilidad territorial, eficiencia institucional, competitividad o calidad de vida?',
                ],
            ],
        ],
    ],

];