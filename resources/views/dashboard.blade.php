<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos IA | Dashboard</title>
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
            <span class="dash-sidebar-logo-text">Eventos IA</span>
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
                <h1>Panel de Eventos IA</h1>
                <p>Fortaleciendo un Estado digital seguro y confiable — seguimiento de inscripciones y caracterización MSPI.</p>
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
                    <span class="dash-stat-label">Inscripciones recibidas</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-green"><i class="fa fa-file-circle-check"></i></div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['con_certificado'] }}</span>
                    <span class="dash-stat-label">Con certificado adjunto</span>
                </div>
            </div>
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-purple"><i class="fa fa-envelope-circle-check"></i></div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['con_correo_institucional'] }}</span>
                    <span class="dash-stat-label">Con correo institucional</span>
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
                <div class="dash-stat-icon" style="background:linear-gradient(135deg,#0f766e,#14b8a6);color:#fff;">
                    <i class="fa fa-map-location-dot"></i>
                </div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['departamentos_distintos'] }}</span>
                    <span class="dash-stat-label">Departamentos distintos</span>
                </div>
            </div>
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
                    <i class="fa fa-shield-halved"></i>
                </div>
                <div class="dash-stat-info">
                    <span class="dash-stat-value">{{ $stats['mspi_formal'] }}</span>
                    <span class="dash-stat-label">MSPI: lineamientos formales</span>
                </div>
            </div>
        </div>

        <div class="dash-charts-section" id="dashChartsSection">
            <div class="dash-charts-header">
                <span class="dash-charts-title"><i class="fa fa-chart-line"></i> Análisis de inscripciones</span>
                <button type="button" class="dash-charts-toggle" id="btnToggleCharts" title="Mostrar/ocultar gráficas">
                    <i class="fa fa-chevron-up" id="chartsToggleIcon"></i>
                </button>
            </div>
            <div class="dash-charts-body" id="dashChartsBody">
                <div class="dash-charts-grid">
                    <div class="dash-chart-card dash-chart-card--wide">
                        <div class="dash-chart-card-title"><i class="fa fa-chart-line"></i> Inscripciones por día <span class="dash-chart-sub">(últimos 30 días)</span></div>
                        <div class="dash-chart-wrap"><canvas id="chartPorDia"></canvas></div>
                    </div>
                    <div class="dash-chart-card">
                        <div class="dash-chart-card-title"><i class="fa fa-map-location-dot"></i> Top departamentos</div>
                        <div class="dash-chart-wrap"><canvas id="chartDepartamentos"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--sm">
                        <div class="dash-chart-card-title"><i class="fa fa-brain"></i> Nivel de conocimiento en IA</div>
                        <div class="dash-chart-wrap dash-chart-wrap--donut"><canvas id="chartNivelIa"></canvas></div>
                    </div>
                    <div class="dash-chart-card dash-chart-card--sm">
                        <div class="dash-chart-card-title"><i class="fa fa-venus-mars"></i> Género</div>
                        <div class="dash-chart-wrap dash-chart-wrap--donut"><canvas id="chartGenero"></canvas></div>
                    </div>
                    <div class="dash-chart-card">
                        <div class="dash-chart-card-title"><i class="fa fa-shield-halved"></i> Preparación frente a riesgos MSPI</div>
                        <div class="dash-chart-wrap"><canvas id="chartPreparacionMspi"></canvas></div>
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
                    <p>Consulta inscripciones por documento, nombre, correo, entidad, departamento o fecha.</p>
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
                    <label for="filtroNaturaleza">Naturaleza entidad</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-building-columns dash-search-icon"></i>
                        <select id="filtroNaturaleza" class="dash-search-input dash-select-input">
                            <option value="">Todas</option>
                            @foreach ($naturalezas as $naturaleza)
                                <option value="{{ $naturaleza }}">{{ $naturaleza }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="dash-filter-field">
                    <label for="filtroNivelIa">Nivel IA</label>
                    <div class="dash-search-wrap">
                        <i class="fa fa-brain dash-search-icon"></i>
                        <select id="filtroNivelIa" class="dash-search-input dash-select-input">
                            <option value="">Todos</option>
                            @foreach ($nivelesIa as $nivel)
                                <option value="{{ $nivel }}">{{ $nivel }}</option>
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
                <a id="exportExcelBtn" href="{{ route('inscripciones.export.excel') }}" class="dash-export-btn" download>
                    <i class="fa fa-file-excel"></i> Exportar Excel
                </a>
            </div>
        </div>

        <div class="dash-table-card">
            <div class="dash-table-header">
                <h2><i class="fa fa-table"></i> Inscripciones registradas</h2>
            </div>
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Correo</th>
                            <th>Departamento</th>
                            <th>Entidad</th>
                            <th>Certificado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="inscripcionesTbody">
                        @forelse ($inscripciones as $inscripcion)
                            <tr class="dash-row">
                                <td>
                                    <button class="dash-expand-btn" type="button" onclick="toggleDetails('row-{{ $inscripcion->id }}')" aria-label="Mostrar detalles">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                </td>
                                <td>{{ ($inscripciones->currentPage() - 1) * $inscripciones->perPage() + $loop->iteration }}</td>
                                <td>{{ $inscripcion->nombres }}</td>
                                <td>{{ $inscripcion->apellidos }}</td>
                                <td>{{ $inscripcion->numero_documento }}</td>
                                <td>{{ $inscripcion->correo_institucional ?? $inscripcion->correo_personal ?? '—' }}</td>
                                <td>{{ $inscripcion->departamento }}</td>
                                <td title="{{ $inscripcion->nombre_entidad }}">{{ \Illuminate\Support\Str::limit($inscripcion->nombre_entidad, 28) }}</td>
                                <td>
                                    @if ($inscripcion->cert_laboral)
                                        <a href="{{ route('inscripciones.certificado', $inscripcion) }}" target="_blank" class="dash-dl-btn" download>
                                            <i class="fa fa-download"></i> Descargar
                                        </a>
                                    @else
                                        <span class="dash-no-file">Sin archivo</span>
                                    @endif
                                </td>
                                <td>{{ $inscripcion->created_at->setTimezone('America/Bogota')->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr id="row-{{ $inscripcion->id }}" class="dash-row-details hidden">
                                <td colspan="10">
                                    <div class="dash-details">
                                        <div class="dash-details-grid">
                                            <div>
                                                <p><strong>Tipo documento:</strong> {{ $inscripcion->tipo_documento }}</p>
                                                <p><strong>Edad:</strong> {{ $inscripcion->rango_edad }}</p>
                                                <p><strong>Género:</strong> {{ $inscripcion->genero }}</p>
                                                <p><strong>Correo institucional:</strong> {{ $inscripcion->correo_institucional ?? '—' }}</p>
                                                <p><strong>Correo personal:</strong> {{ $inscripcion->correo_personal ?? '—' }}</p>
                                                <p><strong>Naturaleza entidad:</strong> {{ $inscripcion->naturaleza_entidad }}</p>
                                                <p><strong>Nombre entidad:</strong> {{ $inscripcion->nombre_entidad }}</p>
                                                <p><strong>Sector administrativo:</strong> {{ $inscripcion->sector_administrativo }}</p>
                                            </div>
                                            <div>
                                                <p><strong>Cargo:</strong> {{ $inscripcion->cargo }}</p>
                                                <p><strong>Nivel jerárquico:</strong> {{ $inscripcion->nivel_jerarquico }}</p>
                                                <p><strong>Nivel estudios:</strong> {{ $inscripcion->nivel_estudios }}</p>
                                                <p><strong>Área formación:</strong> {{ $inscripcion->area_formacion }}</p>
                                                <p><strong>Nivel IA:</strong> {{ $inscripcion->nivel_ia }}</p>
                                                <p><strong>Términos:</strong> {{ $inscripcion->terminos ? 'Sí' : 'No' }}</p>
                                                <p><strong>Certificado laboral:</strong>
                                                    @if ($inscripcion->cert_laboral)
                                                        <a href="{{ route('inscripciones.certificado', $inscripcion) }}" target="_blank" class="dash-dl-btn" download><i class="fa fa-download"></i> Descargar</a>
                                                    @else
                                                        <span class="dash-no-file">Sin archivo</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <hr style="margin:0.8rem 0;border:none;border-top:1px solid #eaeffb;">
                                        <div class="dash-details-grid">
                                            <div>
                                                <p><strong>1. Nivel de conocimiento MSPI:</strong> {{ $inscripcion->mspi_conocimiento ?? '—' }}</p>
                                                <p><strong>2. Estado de implementación:</strong> {{ $inscripcion->mspi_estado_implementacion ?? '—' }}</p>
                                                <p><strong>3. Riesgos identificados:</strong> {{ $inscripcion->mspi_riesgos_identificados ?? '—' }}</p>
                                                <p><strong>4. Herramientas de IA que usa:</strong> {{ implode(', ', $inscripcion->mspi_usa_herramientas_ia ?? []) ?: '—' }}</p>
                                                <p><strong>5. Procesos/áreas de uso de IA:</strong> {{ implode(', ', $inscripcion->mspi_procesos_uso_ia ?? []) ?: '—' }}</p>
                                                @if ($inscripcion->mspi_procesos_uso_otro)
                                                    <p><strong>5.1 Otro proceso/área:</strong> {{ $inscripcion->mspi_procesos_uso_otro }}</p>
                                                @endif
                                            </div>
                                            <div>
                                                <p><strong>6. Riesgos más relevantes:</strong> {{ implode(', ', $inscripcion->mspi_riesgos_relevantes ?? []) ?: '—' }}</p>
                                                <p><strong>7. Lineamientos internos:</strong> {{ $inscripcion->mspi_lineamientos_internos ?? '—' }}</p>
                                                <p><strong>8. Nivel de preparación:</strong> {{ $inscripcion->mspi_preparacion_riesgos ?? '—' }}</p>
                                                <p><strong>9. Temas a profundizar:</strong> {{ implode(', ', $inscripcion->mspi_temas_profundizar ?? []) ?: '—' }}</p>
                                                <p><strong>10. Pregunta abierta:</strong> {{ $inscripcion->mspi_pregunta_abierta ?? '—' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="dash-empty">
                                    <i class="fa fa-inbox"></i>
                                    <p>No hay inscripciones registradas.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="dash-pagination" id="tablaPaginacion">
                {{ $inscripciones->links('vendor.pagination.default') }}
            </div>
        </div>
    </main>

    <script>
        function toggleDetails(rowId) {
            const row = document.getElementById(rowId);
            row && row.classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const tbody = document.getElementById('inscripcionesTbody');
            const originalTbodyHTML = tbody.innerHTML;
            const paginacion = document.getElementById('tablaPaginacion');
            const certificadoBaseUrl = "{{ url('/inscripciones') }}";

            const controls = {
                q: document.getElementById('searchDocumento'),
                departamento: document.getElementById('filtroDepartamento'),
                naturaleza_entidad: document.getElementById('filtroNaturaleza'),
                nivel_ia: document.getElementById('filtroNivelIa'),
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
                exportBtn.href = "{{ route('inscripciones.export.excel') }}" + (params.toString() ? '?' + params.toString() : '');
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
                fetch('{{ route('inscripciones.search') }}?' + params.toString())
                    .then(r => r.json())
                    .then(renderizarTabla);
            }

            function renderizarTabla(data) {
                if (!data.length) {
                    tbody.innerHTML = '<tr><td colspan="10" class="dash-empty"><i class="fa fa-inbox"></i><p>No hay inscripciones con esos filtros.</p></td></tr>';
                    return;
                }

                tbody.innerHTML = data.map((item, idx) => {
                    const cert = item.cert_laboral
                        ? `<a href="${certificadoBaseUrl}/${item.id}/certificado" target="_blank" class="dash-dl-btn" download><i class="fa fa-download"></i> Descargar</a>`
                        : '<span class="dash-no-file">Sin archivo</span>';
                    const fecha = item.created_at ? new Date(item.created_at).toLocaleString('es-CO') : '—';
                    const herramientasIa = (item.mspi_usa_herramientas_ia || []).map(escapeHtml).join(', ') || '—';
                    const procesosUsoIa = (item.mspi_procesos_uso_ia || []).map(escapeHtml).join(', ') || '—';
                    const riesgosRelevantes = (item.mspi_riesgos_relevantes || []).map(escapeHtml).join(', ') || '—';
                    const temasProfundizar = (item.mspi_temas_profundizar || []).map(escapeHtml).join(', ') || '—';

                    return `
                        <tr class="dash-row">
                            <td><button class="dash-expand-btn" type="button" onclick="toggleDetails('row-${item.id}')" aria-label="Mostrar detalles"><i class="fa fa-chevron-down"></i></button></td>
                            <td>${idx + 1}</td>
                            <td>${escapeHtml(item.nombres)}</td>
                            <td>${escapeHtml(item.apellidos)}</td>
                            <td>${escapeHtml(item.numero_documento)}</td>
                            <td>${escapeHtml(item.correo_institucional || item.correo_personal || '—')}</td>
                            <td>${escapeHtml(item.departamento)}</td>
                            <td title="${escapeHtml(item.nombre_entidad)}">${escapeHtml(item.nombre_entidad).slice(0, 32)}</td>
                            <td>${cert}</td>
                            <td>${fecha}</td>
                        </tr>
                        <tr id="row-${item.id}" class="dash-row-details hidden">
                            <td colspan="10">
                                <div class="dash-details">
                                    <div class="dash-details-grid">
                                        <div>
                                            <p><strong>Tipo documento:</strong> ${escapeHtml(item.tipo_documento)}</p>
                                            <p><strong>Edad:</strong> ${escapeHtml(item.rango_edad)}</p>
                                            <p><strong>Género:</strong> ${escapeHtml(item.genero)}</p>
                                            <p><strong>Correo institucional:</strong> ${escapeHtml(item.correo_institucional || '—')}</p>
                                            <p><strong>Correo personal:</strong> ${escapeHtml(item.correo_personal || '—')}</p>
                                            <p><strong>Naturaleza entidad:</strong> ${escapeHtml(item.naturaleza_entidad)}</p>
                                            <p><strong>Nombre entidad:</strong> ${escapeHtml(item.nombre_entidad)}</p>
                                            <p><strong>Sector administrativo:</strong> ${escapeHtml(item.sector_administrativo)}</p>
                                        </div>
                                        <div>
                                            <p><strong>Cargo:</strong> ${escapeHtml(item.cargo)}</p>
                                            <p><strong>Nivel jerárquico:</strong> ${escapeHtml(item.nivel_jerarquico)}</p>
                                            <p><strong>Nivel estudios:</strong> ${escapeHtml(item.nivel_estudios)}</p>
                                            <p><strong>Área formación:</strong> ${escapeHtml(item.area_formacion)}</p>
                                            <p><strong>Nivel IA:</strong> ${escapeHtml(item.nivel_ia)}</p>
                                            <p><strong>Términos:</strong> ${item.terminos ? 'Sí' : 'No'}</p>
                                            <p><strong>Certificado laboral:</strong> ${cert}</p>
                                        </div>
                                    </div>
                                    <hr style="margin:0.8rem 0;border:none;border-top:1px solid #eaeffb;">
                                    <div class="dash-details-grid">
                                        <div>
                                            <p><strong>1. Nivel de conocimiento MSPI:</strong> ${escapeHtml(item.mspi_conocimiento || '—')}</p>
                                            <p><strong>2. Estado de implementación:</strong> ${escapeHtml(item.mspi_estado_implementacion || '—')}</p>
                                            <p><strong>3. Riesgos identificados:</strong> ${escapeHtml(item.mspi_riesgos_identificados || '—')}</p>
                                            <p><strong>4. Herramientas de IA que usa:</strong> ${herramientasIa}</p>
                                            <p><strong>5. Procesos/áreas de uso de IA:</strong> ${procesosUsoIa}</p>
                                            ${item.mspi_procesos_uso_otro ? `<p><strong>5.1 Otro proceso/área:</strong> ${escapeHtml(item.mspi_procesos_uso_otro)}</p>` : ''}
                                        </div>
                                        <div>
                                            <p><strong>6. Riesgos más relevantes:</strong> ${riesgosRelevantes}</p>
                                            <p><strong>7. Lineamientos internos:</strong> ${escapeHtml(item.mspi_lineamientos_internos || '—')}</p>
                                            <p><strong>8. Nivel de preparación:</strong> ${escapeHtml(item.mspi_preparacion_riesgos || '—')}</p>
                                            <p><strong>9. Temas a profundizar:</strong> ${temasProfundizar}</p>
                                            <p><strong>10. Pregunta abierta:</strong> ${escapeHtml(item.mspi_pregunta_abierta || '—')}</p>
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

        fetch('{{ route('inscripciones.chart-data') }}')
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
                new Chart(document.getElementById('chartNivelIa'), {
                    type: 'doughnut',
                    data: { labels: data.por_nivel_ia.map(d => d.nivel_ia), datasets: [{ data: data.por_nivel_ia.map(d => d.total), backgroundColor: colors, borderWidth: 2, borderColor: '#fff' }] },
                    options: donutOptions()
                });
                new Chart(document.getElementById('chartGenero'), {
                    type: 'doughnut',
                    data: { labels: data.por_genero.map(d => d.genero), datasets: [{ data: data.por_genero.map(d => d.total), backgroundColor: colors, borderWidth: 2, borderColor: '#fff' }] },
                    options: donutOptions()
                });
                new Chart(document.getElementById('chartPreparacionMspi'), {
                    type: 'bar',
                    data: { labels: data.por_preparacion_mspi.map(d => d.mspi_preparacion_riesgos), datasets: [{ data: data.por_preparacion_mspi.map(d => d.total), backgroundColor: colors, borderRadius: 6 }] },
                    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }, ...tooltipLabel() }
                });
            })
            .catch(() => { chartsLoading.innerHTML = '<i class="fa fa-exclamation-triangle"></i> Error al cargar gráficas'; });
    })();
    </script>
</body>

</html>
