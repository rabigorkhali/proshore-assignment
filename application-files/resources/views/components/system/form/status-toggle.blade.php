<div class="form-group row" id="{{ $input['groupId'] ?? '' }}">
    <label for="{{ $input['name'] ?? '' }}"
        class="col-sm-2 col-form-label {{ isset($input['required']) ? 'require' : '' }}">{{($input['label'] ?? '') }}</label>
    <div class="{{ isset($input['fullWidth']) ? 'col-sm-10' : 'col-sm-6' }}">
        <input class="{{ $input['class'] ?? '' }}" id="toggle-events" type="checkbox" data-on="Active" data-off="In-Active"
            data-toggle="toggle" data-onstyle="primary" data-offstyle="danger"
            placeholder="{{($input['placeholder'] ?? ($input['label'] ?? '')) }}"
            name="{{ $input['name'] ?? '' }}" {{ isset($input['disabled']) ? 'disabled' : '' }}
            {{ isset($input['readonly']) ? 'readonly' : '' }} {{ isset($input['min']) ? 'min=' . $input['min'] : '' }}
            {{ isset($input['autoComplete']) ? 'autocomplete=off' : '' }} value="{{ 1 ?? '' }}"
            @if (!isset($input['default'])) checked @elseif($input['default'] == 1) checked @endif>
    </div>
    @if (isset($input['helpText']))
        <small class="form-text text-muted">{{($input['helpText']) ?? '' }}</small>
    @endif
    @if (isset($input['error']))
        <div class="invalid-feedback">{{($input['error']) }}</div>
    @endif
</div>
