{{--
    Espera: $pregunta = ['campo' => ..., 'numero' => ..., 'texto' => ...]
    Escala uniforme 1 (Inicial) a 5 (Optimizado), definida en config('instrumento.escala_ambitos').
--}}
<div class="row">
    <div class="col-12 mb-3">
        <label>{{ $pregunta['numero'] }}. {{ $pregunta['texto'] }} *</label>
        <div class="rubrica-escala">
            @foreach (config('instrumento.escala_ambitos') as $nivel => $etiqueta)
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error($pregunta['campo']) is-invalid @enderror" type="radio"
                        name="{{ $pregunta['campo'] }}" id="{{ $pregunta['campo'] }}_{{ $nivel }}"
                        value="{{ $nivel }}"
                        {{ old($pregunta['campo']) == $nivel ? 'checked' : '' }} required>
                    <label class="form-check-label" for="{{ $pregunta['campo'] }}_{{ $nivel }}">{{ $nivel }}{{ $etiqueta ? ' - ' . $etiqueta : '' }}</label>
                </div>
            @endforeach
            @error($pregunta['campo'])
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
