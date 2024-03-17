    <label for="{{ $input['name'] ?? '' }}"
        class="{{ isset($input['label_class']) ? $input['label_class'] : 'col-sm-2' }} form-label {{ isset($input['required']) || isset($input['label-required']) ? 'require' : '' }}">
        {{ isset($input['label']) ? $input['label'] : '' }}
    </label>
    <div class="{{ isset($input['class']) ? $input['class'] : 'col-sm-3' }}">
        @if (isset($inputs))
            {{ $inputs }}
        @else
            <div class="mb-3">
                <x-system.form.input-normal :input="$input" />
            </div>
        @endif
    </div>
