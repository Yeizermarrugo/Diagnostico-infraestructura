<div class="legend-card">
    <h5 class="legend-title">Escala de evaluación</h5>
    <p class="legend-desc">Cada pregunta de esta sección se valora en una escala de 1 a 5. Selecciona el nivel que
        mejor describa la situación actual de tu entidad.</p>
    <div class="legend-grid">
        @php
            $legendColors = [1 => 'legend-item--n1', 5 => 'legend-item--n4'];
        @endphp
        @foreach (config('instrumento.escala_ambitos') as $nivel => $etiqueta)
            @if ($etiqueta)
                <div class="legend-item {{ $legendColors[$nivel] ?? '' }}">
                    <span class="legend-badge">Nivel {{ $nivel }}</span>
                    <span class="legend-text">{{ $etiqueta }}</span>
                </div>
            @endif
        @endforeach
    </div>
</div>
