<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autodiagnóstico Integrado | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&family=syne:600,700,800&family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>

<body class="dash-body">
    <aside class="dash-sidebar">
        <div class="dash-sidebar-logo">
            <img src="{{ asset('img/escudo.png') }}" alt="Logo" class="dash-sidebar-logo-img">
            <span class="dash-sidebar-logo-text">Autodiagnóstico Integrado</span>
        </div>
        <nav class="dash-sidebar-nav">
            <a href="{{ route('dashboard') }}" class="dash-nav-item dash-nav-active">
                <i class="fa fa-chart-bar"></i>
                <span>Dashboard</span>
            </a>
        </nav>
        <div class="dash-sidebar-footer">
            <div class="dash-sidebar-user">
                <i class="fa fa-user-circle dash-sidebar-user-icon"></i>
                <div class="dash-sidebar-user-info">
                    <span class="dash-sidebar-user-name">{{ Auth::user()->name }}</span>
                    <span class="dash-sidebar-user-email">{{ Auth::user()->email }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dash-logout-btn">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="dash-main">
        <header class="dash-topbar">
            <div class="dash-topbar-title">
                <h1>Panel del Instrumento de Evaluación y Selección</h1>
                <p>Proyecto IA para el Estado — seguimiento de postulaciones y puntajes de la rúbrica territorial.</p>
            </div>
            <div class="dash-topbar-right">
                <span class="dash-topbar-badge">
                    <i class="fa fa-shield-alt"></i> Administrador
                </span>
            </div>
        </header>

        <div class="dash-stats-row">
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-blue"><i class="fa fa-file-signature"></i></div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['total'] }}</span>
                    <span class="dash-stat-label">Postulaciones recibidas</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-purple"><i class="fa fa-star-half-stroke"></i></div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ number_format($stats['promedio_puntaje'], 1) }}</span>
                    <span class="dash-stat-label">Puntaje promedio (máx. 190)</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-orange"><i class="fa fa-building"></i></div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['entidades_distintas'] }}</span>
                    <span class="dash-stat-label">Entidades distintas</span>
                </div>
            </div>
        </div>

        <div class="dash-stats-row" style="margin-top:0.75rem;">
            <div class="dash-stat-card">
                <div class="dash-stat-icon" style="background:linear-gradient(135deg,#0369a1,#38bdf8);color:#fff;">
                    <i class="fa fa-calendar-day"></i>
                </div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['hoy'] }}</span>
                    <span class="dash-stat-label">Recibidas hoy</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon" style="background:linear-gradient(135deg,#7e22ce,#a855f7);color:#fff;">
                    <i class="fa fa-map-location-dot"></i>
                </div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['entidades_prioritarias'] }}</span>
                    <span class="dash-stat-label">Entidades prioritarias (categoría 4-6)</span>
                </div>
            </div>
        </div>

        <div class="dash-charts-section" id="dashChartsSection">
            <div class="dash-charts-header">
                <span class="dash-charts-title"><i class="fa fa-chart-line"></i> Análisis de postulaciones</span>
                <button type="button" class="dash-charts-toggle" id="btnToggleCharts" title="Mostrar/ocultar gráficas">
                    <i class="fa fa-chevron-up" id="chartsToggleIcon"></i>
                </button>
            </div>
            <div class="dash-charts-body" id="dashChartsBody">
                <div class="dash-charts-grid">
                    <div class="dash-chart-card dash-chart-card--wide">
                        <div class="dash-chart-card-title"><i class="fa fa-chart-line"></i> Postulaciones por día <span class="dash-chart-sub">(últimos 30 días)</span></div>
                        <div class="dash-chart-wrap"><canvas id="chartPorDia"></canvas></div>
                    </div>
                    <div class="dash-chart-card">
                        <div class="dash-chart-card-title"><i class="fa fa-map-location-dot"></i> Top departamentos</div>
                        <div class="dash-chart-wrap"><canvas id="chartDepartamentos"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--sm">
                        <div class="dash-chart-card-title"><i class="fa fa-landmark"></i> Tipo de entidad</div>
                        <div class="dash-chart-wrap dash-chart-wrap--donut"><canvas id="chartTipoEntidad"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--sm">
                        <div class="dash-chart-card-title"><i class="fa fa-layer-group"></i> Categoría territorial</div>
                        <div class="dash-chart-wrap dash-chart-wrap--donut"><canvas id="chartCategoriaTerritorial"></canvas></div>
                    </div>
                    <div class="dash-chart-card">
                        <div class="dash-chart-card-title"><i class="fa fa-chart-simple"></i> Distribución de puntaje total</div>
                        <div class="dash-chart-wrap"><canvas id="chartHistogramaPuntaje"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--wide">
                        <div class="dash-chart-card-title"><i class="fa fa-scale-balanced"></i> Puntaje promedio por departamento</div>
                        <div class="dash-chart-wrap"><canvas id="chartPromedioDepartamento"></canvas></div>
                    </div>
                </div>
                <div class="dash-charts-loading" id="dashChartsLoading">
                    <i class="fa fa-spinner fa-spin"></i> Cargando datos...
                </div>
            </div>
        </div>

        <div class="dash-filter-card">
            <div class="dash-filter-head">
                <div>
                    <h2><i class="fa fa-sliders"></i> Filtros</h2>
                    <p>Consulta postulaciones por documento, nombre, correo, entidad, departamento, tipo, categoría o puntaje.</p>
                </div>
                <span class="dash-filter-count" id="activeFiltersCount">Sin filtros activos</span>
            </div>
            <div class="dash-filter-grid">
                <div class="dash-filter-field dash-filter-field-wide">
                    <label for="searchDocumento">Buscar</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-magnifying-glass dash-search-icon"></i>
                        <input type="text" id="searchDocumento" placeholder="Documento, nombre, correo o entidad" class="dash-search-input" autocomplete="off">
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="filtroDepartamento">Departamento</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-map dash-search-icon"></i>
                        <select id="filtroDepartamento" class="dash-search-input dash-select-input">
                            <option value="">Todos</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento }}">{{ $departamento }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="filtroTipoEntidad">Tipo de entidad</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-building-columns dash-search-icon"></i>
                        <select id="filtroTipoEntidad" class="dash-search-input dash-select-input">
                            <option value="">Todos</option>
                            @foreach ($tiposEntidad as $tipo)
                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="filtroCategoriaTerritorial">Categoría territorial</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-layer-group dash-search-icon"></i>
                        <select id="filtroCategoriaTerritorial" class="dash-search-input dash-select-input">
                            <option value="">Todas</option>
                            @foreach ($categoriasTerritoriales as $categoria)
                                <option value="{{ $categoria }}">{{ $categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="puntajeMin">Puntaje mínimo</label>
                    <input type="number" id="puntajeMin" min="0" max="84" class="dash-date-input">
                </div>
                <div class="dash-filter-field">
                    <label for="puntajeMax">Puntaje máximo</label>
                    <input type="number" id="puntajeMax" min="0" max="84" class="dash-date-input">
                </div>
                <div class="dash-filter-field">
                    <label for="fechaInicio">Desde</label>
                    <input type="date" id="fechaInicio" class="dash-date-input">
                </div>
                <div class="dash-filter-field">
                    <label for="fechaFin">Hasta</label>
                    <input type="date" id="fechaFin" class="dash-date-input">
                </div>
            </div>
            <div class="dash-filter-actions">
                <button id="btnBuscarFechas" class="dash-filter-btn" type="button">
                    <i class="fa fa-filter"></i> Aplicar filtros
                </button>
                <button id="btnLimpiarFiltros" class="dash-clear-btn" type="button" disabled>
                    <i class="fa fa-rotate-left"></i> Limpiar
                </button>
                <a id="exportExcelBtn" href="{{ route('postulaciones.export.excel') }}" class="dash-export-btn" download>
                    <i class="fa fa-file-excel"></i> Exportar Excel
                </a>
            </div>
        </div>

        <div class="dash-table-card">
            <div class="dash-table-header">
                <h2><i class="fa fa-table"></i> Postulaciones registradas</h2>
            </div>
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>Entidad</th>
                            <th>Tipo</th>
                            <th>Departamento/Municipio</th>
                            <th>Quien diligencia</th>
                            <th>Correo</th>
                            <th>Puntaje</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="postulacionesTbody">
                        @forelse ($postulaciones as $postulacion)
                            <tr class="dash-row">
                                <td>
                                    <button class="dash-expand-btn" type="button" onclick="toggleDetails('row-{{ $postulacion->id }}')" aria-label="Mostrar detalles">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                </td>
                                <td>{{ ($postulaciones->currentPage() - 1) * $postulaciones->perPage() + $loop->iteration }}</td>
                                <td title="{{ $postulacion->nombre_entidad }}">{{ \Illuminate\Support\Str::limit($postulacion->nombre_entidad, 28) }}</td>
                                <td>{{ $postulacion->tipo_entidad }}</td>
                                <td>{{ $postulacion->departamento }} / {{ $postulacion->municipio }}</td>
                                <td>{{ $postulacion->nombres_apellidos }}</td>
                                <td>{{ $postulacion->correo_institucional }}</td>
                                <td><span class="dash-topbar-badge">{{ $postulacion->puntaje_total }}/190</span></td>
                                <td>{{ $postulacion->created_at->setTimezone('America/Bogota')->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr id="row-{{ $postulacion->id }}" class="dash-row-details hidden">
                                <td colspan="9">
                                    <div class="dash-details">
                                        <div class="dash-details-grid">
                                            <div>
                                                <p><strong>Tipo de entidad:</strong> {{ $postulacion->tipo_entidad }}</p>
                                                <p><strong>Categoría territorial:</strong> {{ $postulacion->categoria_territorial }}</p>
                                                <p><strong>Página web:</strong> {{ $postulacion->pagina_web }}</p>
                                                <p><strong>Enlace PDT:</strong> {{ $postulacion->enlace_pdt ?? '—' }}</p>
                                                <p><strong>Cargo (diligencia):</strong> {{ $postulacion->cargo }}</p>
                                                <p><strong>Dependencia:</strong> {{ $postulacion->dependencia }}</p>
                                                <p><strong>Tipo vinculación:</strong> {{ $postulacion->tipo_vinculacion }}</p>
                                                <p><strong>Teléfono:</strong> {{ $postulacion->telefono }}</p>
                                            </div>
                                            <div>
                                                <p><strong>Puntaje A1 (dirección/gobierno):</strong> {{ $postulacion->puntaje_a1 }}/30</p>
                                                <p><strong>Puntaje A2 (gestión de datos):</strong> {{ $postulacion->puntaje_a2 }}/50</p>
                                                <p><strong>Puntaje A3 (base tecnológica):</strong> {{ $postulacion->puntaje_a3 }}/30</p>
                                                <p><strong>Puntaje A4 (seguridad/privacidad):</strong> {{ $postulacion->puntaje_a4 }}/20</p>
                                                <p><strong>Puntaje A5 (equipo humano):</strong> {{ $postulacion->puntaje_a5 }}/25</p>
                                                <p><strong>Puntaje A6 (procesos/valor público):</strong> {{ $postulacion->puntaje_a6 }}/35</p>
                                                <p><strong>Puntaje total:</strong> {{ $postulacion->puntaje_total }}/190</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="dash-empty">
                                    <i class="fa fa-inbox"></i>
                                    <p>No hay postulaciones registradas.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="dash-pagination" id="tablaPaginacion">
                {{ $postulaciones->links('vendor.pagination.default') }}
            </div>
        </div>
    </main>

    <script>
        function toggleDetails(rowId) {
            const row = document.getElementById(rowId);
            row && row.classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const tbody = document.getElementById('postulacionesTbody');
            const originalTbodyHTML = tbody.innerHTML;
            const paginacion = document.getElementById('tablaPaginacion');

            const controls = {
                q: document.getElementById('searchDocumento'),
                departamento: document.getElementById('filtroDepartamento'),
                tipo_entidad: document.getElementById('filtroTipoEntidad'),
                categoria_territorial: document.getElementById('filtroCategoriaTerritorial'),
                puntaje_min: document.getElementById('puntajeMin'),
                puntaje_max: document.getElementById('puntajeMax'),
                fecha_inicio: document.getElementById('fechaInicio'),
                fecha_fin: document.getElementById('fechaFin'),
            };
            const btnBuscar = document.getElementById('btnBuscarFechas');
            const btnLimpiar = document.getElementById('btnLimpiarFiltros');
            const exportBtn = document.getElementById('exportExcelBtn');
            const activeFiltersCount = document.getElementById('activeFiltersCount');

            function escapeHtml(value) {
                return String(value ?? '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function buildSearchParams() {
                const params = new URLSearchParams();
                Object.entries(controls).forEach(([key, control]) => {
                    const value = control.value.trim ? control.value.trim() : control.value;
                    if (value !== '') params.set(key, value);
                });
                return params;
            }

            function updateExportLink() {
                const params = buildSearchParams();
                const count = Array.from(params.keys()).length;
                activeFiltersCount.textContent = count === 0 ? 'Sin filtros activos' : `${count} filtro${count === 1 ? '' : 's'} activo${count === 1 ? '' : 's'}`;
                btnLimpiar.disabled = count === 0;
                exportBtn.href = "{{ route('postulaciones.export.excel') }}" + (params.toString() ? '?' + params.toString() : '');
            }

            function buscarFiltros() {
                const params = buildSearchParams();
                updateExportLink();
                if (!params.toString()) {
                    tbody.innerHTML = originalTbodyHTML;
                    paginacion && (paginacion.style.display = '');
                    return;
                }

                paginacion && (paginacion.style.display = 'none');
                fetch('{{ route('postulaciones.search') }}?' + params.toString())
                    .then(r => r.json())
                    .then(renderizarTabla);
            }

            function renderizarTabla(data) {
                if (!data.length) {
                    tbody.innerHTML = '<tr><td colspan="9" class="dash-empty"><i class="fa fa-inbox"></i><p>No hay postulaciones con esos filtros.</p></td></tr>';
                    return;
                }

                tbody.innerHTML = data.map((item, idx) => {
                    const fecha = item.created_at ? new Date(item.created_at).toLocaleString('es-CO') : '—';

                    return `
                        <tr class="dash-row">
                            <td><button class="dash-expand-btn" type="button" onclick="toggleDetails('row-${item.id}')" aria-label="Mostrar detalles"><i class="fa fa-chevron-down"></i></button></td>
                            <td>${idx + 1}</td>
                            <td title="${escapeHtml(item.nombre_entidad)}">${escapeHtml(item.nombre_entidad).slice(0, 32)}</td>
                            <td>${escapeHtml(item.tipo_entidad)}</td>
                            <td>${escapeHtml(item.departamento)} / ${escapeHtml(item.municipio)}</td>
                            <td>${escapeHtml(item.nombres_apellidos)}</td>
                            <td>${escapeHtml(item.correo_institucional)}</td>
                            <td><span class="dash-topbar-badge">${item.puntaje_total}/190</span></td>
                            <td>${fecha}</td>
                        </tr>
                        <tr id="row-${item.id}" class="dash-row-details hidden">
                            <td colspan="9">
                                <div class="dash-details">
                                    <div class="dash-details-grid">
                                        <div>
                                            <p><strong>Categoría territorial:</strong> ${escapeHtml(item.categoria_territorial)}</p>
                                            <p><strong>Página web:</strong> ${escapeHtml(item.pagina_web)}</p>
                                            <p><strong>Cargo (diligencia):</strong> ${escapeHtml(item.cargo)}</p>
                                            <p><strong>Dependencia:</strong> ${escapeHtml(item.dependencia)}</p>
                                            <p><strong>Teléfono:</strong> ${escapeHtml(item.telefono)}</p>
                                        </div>
                                        <div>
                                            <p><strong>A1:</strong> ${item.puntaje_a1}/30 · <strong>A2:</strong> ${item.puntaje_a2}/50 · <strong>A3:</strong> ${item.puntaje_a3}/30</p>
                                            <p><strong>A4:</strong> ${item.puntaje_a4}/20 · <strong>A5:</strong> ${item.puntaje_a5}/25 · <strong>A6:</strong> ${item.puntaje_a6}/35</p>
                                            <p><strong>Puntaje total:</strong> ${item.puntaje_total}/190</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                }).join('');
            }

            function debounce(fn, wait) {
                let timer;
                return function(...args) {
                    clearTimeout(timer);
                    timer = setTimeout(() => fn.apply(this, args), wait);
                };
            }

            Object.values(controls).forEach(control => {
                control.addEventListener('input', updateExportLink);
                control.addEventListener('change', updateExportLink);
                control.addEventListener('change', buscarFiltros);
            });
            controls.q.addEventListener('input', debounce(buscarFiltros, 350));
            btnBuscar.addEventListener('click', buscarFiltros);

            btnLimpiar.addEventListener('click', function() {
                Object.values(controls).forEach(control => control.value = '');
                tbody.innerHTML = originalTbodyHTML;
                paginacion && (paginacion.style.display = '');
                updateExportLink();
            });

            updateExportLink();
        });
    </script>

    <script>
    (function() {
        const colors = ['#184fa4','#2563eb','#10b981','#f59e0b','#8b5cf6','#06b6d4','#ec4899','#84cc16'];
        Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
        Chart.defaults.color = '#64748b';

        const chartsBody = document.getElementById('dashChartsBody');
        const toggleBtn = document.getElementById('btnToggleCharts');
        const toggleIcon = document.getElementById('chartsToggleIcon');
        const chartsLoading = document.getElementById('dashChartsLoading');

        toggleBtn.addEventListener('click', function() {
            const visible = chartsBody.style.display !== 'none';
            chartsBody.style.display = visible ? 'none' : '';
            toggleIcon.className = visible ? 'fa fa-chevron-down' : 'fa fa-chevron-up';
        });

        function tooltipLabel() {
            return {
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        titleColor: '#f8fafc',
                        bodyColor: '#cbd5e1',
                        padding: 10,
                        cornerRadius: 8,
                    }
                }
            };
        }

        function donutOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '62%',
                plugins: {
                    legend: { position: 'bottom', labels: { font: { size: 11 }, boxWidth: 12 } },
                    tooltip: { backgroundColor: '#1e293b', titleColor: '#f8fafc', bodyColor: '#cbd5e1', padding: 10, cornerRadius: 8 }
                }
            };
        }

        fetch('{{ route('postulaciones.chart-data') }}')
            .then(r => r.json())
            .then(data => {
                chartsLoading.style.display = 'none';
                new Chart(document.getElementById('chartPorDia'), {
                    type: 'line',
                    data: {
                        labels: data.por_dia.map(d => d.fecha),
                        datasets: [{ data: data.por_dia.map(d => d.total), borderColor: '#184fa4', backgroundColor: 'rgba(24,79,164,0.08)', fill: true, tension: 0.35 }]
                    },
                    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }, ...tooltipLabel() }
                });
                new Chart(document.getElementById('chartDepartamentos'), {
                    type: 'bar',
                    data: { labels: data.por_departamento.map(d => d.departamento), datasets: [{ data: data.por_departamento.map(d => d.total), backgroundColor: colors, borderRadius: 6 }] },
                    options: { indexAxis: 'y', responsive: true, maintainAspectRatio: false, scales: { x: { beginAtZero: true, ticks: { precision: 0 } } }, ...tooltipLabel() }
                });
                new Chart(document.getElementById('chartTipoEntidad'), {
                    type: 'doughnut',
                    data: { labels: data.por_tipo_entidad.map(d => d.tipo_entidad), datasets: [{ data: data.por_tipo_entidad.map(d => d.total), backgroundColor: colors, borderWidth: 2, borderColor: '#fff' }] },
                    options: donutOptions()
                });
                new Chart(document.getElementById('chartCategoriaTerritorial'), {
                    type: 'doughnut',
                    data: { labels: data.por_categoria_territorial.map(d => d.categoria_territorial), datasets: [{ data: data.por_categoria_territorial.map(d => d.total), backgroundColor: colors, borderWidth: 2, borderColor: '#fff' }] },
                    options: donutOptions()
                });
                new Chart(document.getElementById('chartHistogramaPuntaje'), {
                    type: 'bar',
                    data: { labels: data.histograma_puntaje.map(d => d.rango), datasets: [{ data: data.histograma_puntaje.map(d => d.total), backgroundColor: colors, borderRadius: 6 }] },
                    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }, ...tooltipLabel() }
                });
                new Chart(document.getElementById('chartPromedioDepartamento'), {
                    type: 'bar',
                    data: { labels: data.promedio_por_departamento.map(d => d.departamento), datasets: [{ data: data.promedio_por_departamento.map(d => d.promedio), backgroundColor: colors, borderRadius: 6 }] },
                    options: { indexAxis: 'y', responsive: true, maintainAspectRatio: false, scales: { x: { beginAtZero: true, max: 190 } }, ...tooltipLabel() }
                });
            })
            .catch(() => { chartsLoading.innerHTML = '<i class="fa fa-exclamation-triangle"></i> Error al cargar gráficas'; });
    })();
    </script>
</body>

</html>
