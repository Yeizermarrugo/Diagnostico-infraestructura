{{--
    Espera: $pregunta = ['campo' => ..., 'numero' => ..., 'texto' => ..., 'opciones' => [4=>..,3=>..,2=>..,1=>..]]
--}}
<div class="row">
    <div class="col-12 mb-3">
        <label>{{ $pregunta['numero'] }}. {{ $pregunta['texto'] }} *</label>
        <div>
            @foreach ($pregunta['opciones'] as $nivel => $texto)
                <div class="form-check">
                    <input class="form-check-input @error($pregunta['campo']) is-invalid @enderror" type="radio"
                        name="{{ $pregunta['campo'] }}" id="{{ $pregunta['campo'] }}_{{ $nivel }}"
                        value="{{ $nivel }}"
                        {{ old($pregunta['campo']) == $nivel ? 'checked' : '' }} required>
                    <label class="form-check-label" for="{{ $pregunta['campo'] }}_{{ $nivel }}">{{ $texto }}</label>
                </div>
            @endforeach
            @error($pregunta['campo'])
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
