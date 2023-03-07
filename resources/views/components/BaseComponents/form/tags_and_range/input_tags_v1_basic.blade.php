@props([
    'name',
    'model' => $model,
    'label' => class_basename($model) . ' ' . rtrim($name, '[]'), 'options' => [],
    'cols' => 6,
])

<label class="form-label" for="{{ $name }}">{{ $label }}</label>
<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <input type="text" class="form-control visually-hidden " name="{{ $name }}" id="{{ $name }}" data-role="tagsinput" value="">
</div>

@push('style')
    <link href="{{ asset('admin/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
@endpush


@push('script')
    <script src="{{ asset('admin/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
@endpush
