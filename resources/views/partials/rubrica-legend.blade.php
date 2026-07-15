<div class="legend-card">
    <h5 class="legend-title">Escala de evaluación</h5>
    <p class="legend-desc">Cada pregunta de esta sección tiene 4 opciones de respuesta. Selecciona la que mejor
        describa la situación actual de tu entidad.</p>
    <div class="legend-grid">
        @php
            $legendColors = [4 => 'legend-item--n4', 3 => 'legend-item--n3', 2 => 'legend-item--n2', 1 => 'legend-item--n1'];
        @endphp
        @foreach (config('instrumento.niveles_legend') as $nivel => $significado)
            <div class="legend-item {{ $legendColors[$nivel] ?? '' }}">
                <span class="legend-badge">Nivel {{ $nivel }}</span>
                <span class="legend-text">{{ $significado }}</span>
            </div>
        @endforeach
    </div>
</div>
