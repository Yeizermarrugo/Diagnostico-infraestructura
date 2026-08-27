{{--
    Espera: $pregunta = ['campo','numero','texto','tipo', ...] desde config('diagnostico.secciones').
    Renderiza el control según $pregunta['tipo']: select | multiselect | texto_largo |
    texto_largo_archivo | sino. Los tipos "ranking" y "likert" se manejan aparte en la vista.
--}}
<div class="row">
    <div class="col-12 mb-4">
        <label for="{{ $pregunta['campo'] }}">{{ $pregunta['numero'] }}. {{ $pregunta['texto'] }} *</label>
        @isset($pregunta['ayuda'])
            <small class="form-text text-muted d-block mb-2">{{ $pregunta['ayuda'] }}</small>
        @endisset

        @switch($pregunta['tipo'])
            @case('select')
                <select class="form-control @error($pregunta['campo']) is-invalid @enderror"
                    id="{{ $pregunta['campo'] }}" name="{{ $pregunta['campo'] }}" required>
                    <option value="">Seleccione...</option>
                    @foreach (config('diagnostico.opciones.' . $pregunta['opciones']) as $opcion)
                        <option {{ old($pregunta['campo']) == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                    @endforeach
                </select>
                @if (!empty($pregunta['otros']))
                    <input type="text" class="form-control mt-2 campo-otros" name="{{ $pregunta['campo'] }}_otros"
                        value="{{ old($pregunta['campo'] . '_otros') }}"
                        data-otros-campo="{{ $pregunta['campo'] }}"
                        data-otros-valor="{{ config('diagnostico.otros_valor.' . $pregunta['campo']) }}"
                        placeholder="Si elegiste &quot;{{ config('diagnostico.otros_valor.' . $pregunta['campo']) }}&quot;, indica cuál"
                        disabled>
                @endif
                @break

            @case('multiselect')
                <div class="rubrica-escala">
                    @foreach (config('diagnostico.opciones.' . $pregunta['opciones']) as $opcion)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                name="{{ $pregunta['campo'] }}[]" id="{{ $pregunta['campo'] }}_{{ $loop->index }}"
                                value="{{ $opcion }}"
                                {{ collect(old($pregunta['campo'], []))->contains($opcion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $pregunta['campo'] }}_{{ $loop->index }}">{{ $opcion }}</label>
                        </div>
                    @endforeach
                </div>
                @if (!empty($pregunta['otros']))
                    <input type="text" class="form-control mt-2 campo-otros" name="{{ $pregunta['campo'] }}_otros"
                        value="{{ old($pregunta['campo'] . '_otros') }}"
                        data-otros-campo="{{ $pregunta['campo'] }}"
                        data-otros-valor="{{ config('diagnostico.otros_valor.' . $pregunta['campo']) }}"
                        placeholder="Si elegiste &quot;{{ config('diagnostico.otros_valor.' . $pregunta['campo']) }}&quot;, indica cuál"
                        disabled>
                @endif
                @break

            @case('texto_largo')
                <textarea class="form-control @error($pregunta['campo']) is-invalid @enderror" rows="3"
                    id="{{ $pregunta['campo'] }}" name="{{ $pregunta['campo'] }}" required>{{ old($pregunta['campo']) }}</textarea>
                @break

            @case('texto_largo_archivo')
                <textarea class="form-control @error($pregunta['campo']) is-invalid @enderror" rows="3"
                    id="{{ $pregunta['campo'] }}" name="{{ $pregunta['campo'] }}" required>{{ old($pregunta['campo']) }}</textarea>
                <label for="{{ $pregunta['archivo'] }}" class="mt-2">Adjuntar archivo (opcional)</label>
                <input type="file" class="form-control @error($pregunta['archivo']) is-invalid @enderror"
                    id="{{ $pregunta['archivo'] }}" name="{{ $pregunta['archivo'] }}"
                    accept=".pdf,.doc,.docx,.xls,.xlsx,.csv,.jpg,.jpeg,.png">
                <small class="form-text text-muted">PDF, Word, Excel, CSV o imagen — máx. 10MB.</small>
                @error($pregunta['archivo'])
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @break

            @case('sino')
                <div class="rubrica-escala">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $pregunta['campo'] }}"
                            id="{{ $pregunta['campo'] }}_si" value="1"
                            {{ old($pregunta['campo']) === '1' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="{{ $pregunta['campo'] }}_si">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $pregunta['campo'] }}"
                            id="{{ $pregunta['campo'] }}_no" value="0"
                            {{ old($pregunta['campo']) === '0' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="{{ $pregunta['campo'] }}_no">No</label>
                    </div>
                </div>
                @break
        @endswitch

        @error($pregunta['campo'])
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        @error($pregunta['campo'] . '_otros')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
