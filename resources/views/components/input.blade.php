@props(['label', 'name', 'type' => 'text'])
<div class="form-group">
    <label><?= $label ?></label>
    <input type="{{ $type }}" name=" $name }}"
        class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" />
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
