<div class="legend-card">
    <h5 class="legend-title">Escala de valoración</h5>
    <p class="legend-desc">Indica tu grado de acuerdo con cada afirmación, en una escala de 1 a 5.</p>
    <div class="legend-grid">
        @php
            $legendColors = [1 => 'legend-item--n1', 2 => 'legend-item--n2', 3 => 'legend-item--n3', 4 => 'legend-item--n4', 5 => 'legend-item--n5'];
        @endphp
        @foreach (config('diagnostico.escala_likert') as $nivel => $etiqueta)
            <div class="legend-item {{ $legendColors[$nivel] ?? '' }}">
                <span class="legend-badge">{{ $nivel }}</span>
                <span class="legend-text">{{ $etiqueta }}</span>
            </div>
        @endforeach
    </div>
</div>
