<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico de Infraestructura IA | Dashboard</title>
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
            <span class="dash-sidebar-logo-text">Diagnóstico Infraestructura IA</span>
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
                <h1>Panel de Diagnóstico de Infraestructura Computacional en IA</h1>
                <p>Proyecto IA para el Estado — seguimiento de la demanda de infraestructura reportada por las entidades.</p>
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
                    <span class="dash-stat-label">Diagnósticos recibidos</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-orange"><i class="fa fa-building"></i></div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['entidades_distintas'] }}</span>
                    <span class="dash-stat-label">Entidades distintas</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-purple"><i class="fa fa-brain"></i></div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['con_area_ia'] }}</span>
                    <span class="dash-stat-label">Con área especializada en IA/datos</span>
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
                    <span class="dash-stat-label">Recibidos hoy</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon" style="background:linear-gradient(135deg,#7e22ce,#a855f7);color:#fff;">
                    <i class="fa fa-rocket"></i>
                </div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['con_proyectos_produccion'] }}</span>
                    <span class="dash-stat-label">Con proyectos de IA en producción</span>
                </div>
            </div>
        </div>

        <div class="dash-charts-section" id="dashChartsSection">
            <div class="dash-charts-header">
                <span class="dash-charts-title"><i class="fa fa-chart-line"></i> Análisis de diagnósticos</span>
                <button type="button" class="dash-charts-toggle" id="btnToggleCharts" title="Mostrar/ocultar gráficas">
                    <i class="fa fa-chevron-up" id="chartsToggleIcon"></i>
                </button>
            </div>
            <div class="dash-charts-body" id="dashChartsBody">
                <div class="dash-charts-grid">
                    <div class="dash-chart-card dash-chart-card--wide">
                        <div class="dash-chart-card-title"><i class="fa fa-chart-line"></i> Diagnósticos por día <span class="dash-chart-sub">(últimos 30 días)</span></div>
                        <div class="dash-chart-wrap"><canvas id="chartPorDia"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--sm">
                        <div class="dash-chart-card-title"><i class="fa fa-landmark"></i> Orden de la entidad</div>
                        <div class="dash-chart-wrap dash-chart-wrap--donut"><canvas id="chartOrdenEntidad"></canvas></div>
                    </div>
                    <div class="dash-chart-card">
                        <div class="dash-chart-card-title"><i class="fa fa-map-location-dot"></i> Top sectores públicos</div>
                        <div class="dash-chart-wrap"><canvas id="chartSectorPublico"></canvas></div>
                    </div>
                    <div class="dash-chart-card">
                        <div class="dash-chart-card-title"><i class="fa fa-robot"></i> Etapa de uso de IA</div>
                        <div class="dash-chart-wrap"><canvas id="chartEtapaIa"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--sm">
                        <div class="dash-chart-card-title"><i class="fa fa-server"></i> Modelo tecnológico predominante</div>
                        <div class="dash-chart-wrap dash-chart-wrap--donut"><canvas id="chartModeloTecnologico"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--wide">
                        <div class="dash-chart-card-title"><i class="fa fa-scale-balanced"></i> Valoración promedio de barreras (1-5)</div>
                        <div class="dash-chart-wrap"><canvas id="chartPromedioLikert"></canvas></div>
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
                    <p>Consulta diagnósticos por entidad, responsable, orden, sector, etapa de IA o fecha.</p>
                </div>
                <span class="dash-filter-count" id="activeFiltersCount">Sin filtros activos</span>
            </div>
            <div class="dash-filter-grid">
                <div class="dash-filter-field dash-filter-field-wide">
                    <label for="searchEntidad">Buscar</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-magnifying-glass dash-search-icon"></i>
                        <input type="text" id="searchEntidad" placeholder="Entidad, responsable o cargo" class="dash-search-input" autocomplete="off">
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="filtroOrdenEntidad">Orden de la entidad</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-landmark dash-search-icon"></i>
                        <select id="filtroOrdenEntidad" class="dash-search-input dash-select-input">
                            <option value="">Todos</option>
                            @foreach ($ordenesEntidad as $orden)
                                <option value="{{ $orden }}">{{ $orden }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="filtroSectorPublico">Sector público</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-building-columns dash-search-icon"></i>
                        <select id="filtroSectorPublico" class="dash-search-input dash-select-input">
                            <option value="">Todos</option>
                            @foreach ($sectoresPublicos as $sector)
                                <option value="{{ $sector }}">{{ $sector }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="filtroEtapaIa">Etapa de uso de IA</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-robot dash-search-icon"></i>
                        <select id="filtroEtapaIa" class="dash-search-input dash-select-input">
                            <option value="">Todas</option>
                            @foreach ($etapasIa as $etapa)
                                <option value="{{ $etapa }}">{{ $etapa }}</option>
                            @endforeach
                        </select>
                    </div>
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
                <a id="exportExcelBtn" href="{{ route('diagnosticos.export.excel') }}" class="dash-export-btn" download>
                    <i class="fa fa-file-excel"></i> Exportar Excel
                </a>
            </div>
        </div>

        <div class="dash-table-card">
            <div class="dash-table-header">
                <h2><i class="fa fa-table"></i> Diagnósticos registrados</h2>
            </div>
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>Entidad</th>
                            <th>Orden</th>
                            <th>Sector</th>
                            <th>Responsable</th>
                            <th>Etapa IA</th>
                            <th>Archivo</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="diagnosticosTbody">
                        @forelse ($diagnosticos as $diagnostico)
                            <tr class="dash-row">
                                <td>
                                    <button class="dash-expand-btn" type="button" onclick="toggleDetails('row-{{ $diagnostico->id }}')" aria-label="Mostrar detalles">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                </td>
                                <td>{{ ($diagnosticos->currentPage() - 1) * $diagnosticos->perPage() + $loop->iteration }}</td>
                                <td title="{{ $diagnostico->nombre_entidad }}">{{ \Illuminate\Support\Str::limit($diagnostico->nombre_entidad, 28) }}</td>
                                <td>{{ $diagnostico->orden_entidad }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($diagnostico->sector_publico, 24) }}</td>
                                <td>{{ $diagnostico->nombre_responsable }}</td>
                                <td>{{ $diagnostico->etapa_uso_ia }}</td>
                                <td>
                                    @if ($diagnostico->recursos_tecnologicos_archivo)
                                        <a href="{{ route('diagnosticos.descargar-archivo', $diagnostico) }}" class="dash-dl-btn">
                                            <i class="fa fa-download"></i> Ver
                                        </a>
                                    @else
                                        <span class="dash-no-file">Sin archivo</span>
                                    @endif
                                </td>
                                <td>{{ $diagnostico->created_at->setTimezone('America/Bogota')->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr id="row-{{ $diagnostico->id }}" class="dash-row-details hidden">
                                <td colspan="9">
                                    <div class="dash-details">
                                        <div class="dash-details-grid">
                                            <div>
                                                <p><strong>Cargo del responsable:</strong> {{ $diagnostico->cargo_responsable }}</p>
                                                <p><strong>Correo del responsable:</strong> {{ $diagnostico->correo_responsable }}</p>
                                                <p><strong>Funcionarios de TI:</strong> {{ $diagnostico->num_funcionarios_ti }}</p>
                                                <p><strong>Presupuesto anual TI:</strong> {{ $diagnostico->presupuesto_anual_ti }} SMMLV</p>
                                                <p><strong>Área especializada IA/datos:</strong> {{ $diagnostico->tiene_area_ia ? 'Sí' : 'No' }}</p>
                                            </div>
                                            <div>
                                                <p><strong>Centro de servidores propio:</strong> {{ $diagnostico->tiene_centro_servidores_propio }}</p>
                                                <p><strong>Usa nube:</strong> {{ $diagnostico->usa_nube }}</p>
                                                <p><strong>Modelo tecnológico predominante:</strong> {{ $diagnostico->modelo_tecnologico_predominante }}</p>
                                                <p><strong>Dispone de GPU:</strong> {{ $diagnostico->dispone_gpu }}</p>
                                            </div>
                                            <div>
                                                <p><strong>Proyectos de IA en ejecución:</strong> {{ $diagnostico->proyectos_ia_ejecucion }}</p>
                                                <p><strong>Número de proyectos de IA:</strong> {{ $diagnostico->num_proyectos_ia }}</p>
                                                @if ($diagnostico->recursos_tecnologicos_archivo)
                                                    <p><a href="{{ route('diagnosticos.descargar-archivo', $diagnostico) }}" class="dash-dl-btn"><i class="fa fa-paperclip"></i> Descargar archivo adjunto (P11)</a></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="dash-empty">
                                    <i class="fa fa-inbox"></i>
                                    <p>No hay diagnósticos registrados.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="dash-pagination" id="tablaPaginacion">
                {{ $diagnosticos->links('vendor.pagination.default') }}
            </div>
        </div>
    </main>

    <script>
        function toggleDetails(rowId) {
            const row = document.getElementById(rowId);
            row && row.classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const tbody = document.getElementById('diagnosticosTbody');
            const originalTbodyHTML = tbody.innerHTML;
            const paginacion = document.getElementById('tablaPaginacion');

            const controls = {
                q: document.getElementById('searchEntidad'),
                orden_entidad: document.getElementById('filtroOrdenEntidad'),
                sector_publico: document.getElementById('filtroSectorPublico'),
                etapa_uso_ia: document.getElementById('filtroEtapaIa'),
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
                exportBtn.href = "{{ route('diagnosticos.export.excel') }}" + (params.toString() ? '?' + params.toString() : '');
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
                fetch('{{ route('diagnosticos.search') }}?' + params.toString())
                    .then(r => r.json())
                    .then(renderizarTabla);
            }

            function renderizarTabla(data) {
                if (!data.length) {
                    tbody.innerHTML = '<tr><td colspan="9" class="dash-empty"><i class="fa fa-inbox"></i><p>No hay diagnósticos con esos filtros.</p></td></tr>';
                    return;
                }

                tbody.innerHTML = data.map((item, idx) => {
                    const fecha = item.created_at ? new Date(item.created_at).toLocaleString('es-CO') : '—';
                    const archivoLink = item.recursos_tecnologicos_archivo
                        ? `<p><a href="/diagnosticos/${item.id}/archivo" class="dash-dl-btn"><i class="fa fa-paperclip"></i> Descargar archivo adjunto (P11)</a></p>`
                        : '';
                    const archivoBtn = item.recursos_tecnologicos_archivo
                        ? `<a href="/diagnosticos/${item.id}/archivo" class="dash-dl-btn"><i class="fa fa-download"></i> Ver</a>`
                        : '<span class="dash-no-file">Sin archivo</span>';

                    return `
                        <tr class="dash-row">
                            <td><button class="dash-expand-btn" type="button" onclick="toggleDetails('row-${item.id}')" aria-label="Mostrar detalles"><i class="fa fa-chevron-down"></i></button></td>
                            <td>${idx + 1}</td>
                            <td title="${escapeHtml(item.nombre_entidad)}">${escapeHtml(item.nombre_entidad).slice(0, 32)}</td>
                            <td>${escapeHtml(item.orden_entidad)}</td>
                            <td>${escapeHtml(item.sector_publico)}</td>
                            <td>${escapeHtml(item.nombre_responsable)}</td>
                            <td>${escapeHtml(item.etapa_uso_ia)}</td>
                            <td>${archivoBtn}</td>
                            <td>${fecha}</td>
                        </tr>
                        <tr id="row-${item.id}" class="dash-row-details hidden">
                            <td colspan="9">
                                <div class="dash-details">
                                    <div class="dash-details-grid">
                                        <div>
                                            <p><strong>Cargo del responsable:</strong> ${escapeHtml(item.cargo_responsable)}</p>
                                            <p><strong>Correo del responsable:</strong> ${escapeHtml(item.correo_responsable)}</p>
                                            <p><strong>Funcionarios de TI:</strong> ${escapeHtml(item.num_funcionarios_ti)}</p>
                                            <p><strong>Área especializada IA/datos:</strong> ${item.tiene_area_ia ? 'Sí' : 'No'}</p>
                                        </div>
                                        <div>
                                            <p><strong>Usa nube:</strong> ${escapeHtml(item.usa_nube)}</p>
                                            <p><strong>Modelo tecnológico:</strong> ${escapeHtml(item.modelo_tecnologico_predominante)}</p>
                                            <p><strong>Dispone de GPU:</strong> ${escapeHtml(item.dispone_gpu)}</p>
                                        </div>
                                        <div>
                                            <p><strong>Proyectos IA en ejecución:</strong> ${escapeHtml(item.proyectos_ia_ejecucion)}</p>
                                            ${archivoLink}
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
                    tooltip: { backgroundColor: '#1e293b', titleColor: '#f8fafc', bodyColor: '#cbd5e1', padding: 10, cornerRadius: 8 }
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

        fetch('{{ route('diagnosticos.chart-data') }}')
            .then(r => r.json())
            .then(data => {
                chartsLoading.style.display = 'none';
                new Chart(document.getElementById('chartPorDia'), {
                    type: 'line',
                    data: { labels: data.por_dia.map(d => d.fecha), datasets: [{ data: data.por_dia.map(d => d.total), borderColor: '#184fa4', backgroundColor: 'rgba(24,79,164,0.08)', fill: true, tension: 0.35 }] },
                    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }, ...tooltipLabel() }
                });
                new Chart(document.getElementById('chartOrdenEntidad'), {
                    type: 'doughnut',
                    data: { labels: data.por_orden_entidad.map(d => d.orden_entidad), datasets: [{ data: data.por_orden_entidad.map(d => d.total), backgroundColor: colors, borderWidth: 2, borderColor: '#fff' }] },
                    options: donutOptions()
                });
                new Chart(document.getElementById('chartSectorPublico'), {
                    type: 'bar',
                    data: { labels: data.por_sector_publico.map(d => d.sector_publico), datasets: [{ data: data.por_sector_publico.map(d => d.total), backgroundColor: colors, borderRadius: 6 }] },
                    options: { indexAxis: 'y', responsive: true, maintainAspectRatio: false, scales: { x: { beginAtZero: true, ticks: { precision: 0 } } }, ...tooltipLabel() }
                });
                new Chart(document.getElementById('chartEtapaIa'), {
                    type: 'bar',
                    data: { labels: data.por_etapa_ia.map(d => d.etapa_uso_ia), datasets: [{ data: data.por_etapa_ia.map(d => d.total), backgroundColor: colors, borderRadius: 6 }] },
                    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }, ...tooltipLabel() }
                });
                new Chart(document.getElementById('chartModeloTecnologico'), {
                    type: 'doughnut',
                    data: { labels: data.por_modelo_tecnologico.map(d => d.modelo_tecnologico_predominante), datasets: [{ data: data.por_modelo_tecnologico.map(d => d.total), backgroundColor: colors, borderWidth: 2, borderColor: '#fff' }] },
                    options: donutOptions()
                });
                new Chart(document.getElementById('chartPromedioLikert'), {
                    type: 'bar',
                    data: { labels: data.promedio_likert.map(d => d.texto.slice(0, 40) + (d.texto.length > 40 ? '…' : '')), datasets: [{ data: data.promedio_likert.map(d => d.promedio), backgroundColor: colors, borderRadius: 6 }] },
                    options: { indexAxis: 'y', responsive: true, maintainAspectRatio: false, scales: { x: { beginAtZero: true, max: 5 } }, ...tooltipLabel() }
                });
            })
            .catch(() => { chartsLoading.innerHTML = '<i class="fa fa-exclamation-triangle"></i> Error al cargar gráficas'; });
    })();
    </script>
</body>

</html>
