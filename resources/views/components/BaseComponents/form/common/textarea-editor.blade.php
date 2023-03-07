@props([
    'name',
    'id' => 'editor',
    'model' => $model,
    'label' => $name,
    'cols' => '12',
])

<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $id }}" class="form-label">{{ ucwords($label) }}</label>
    {{-- <div id="{{ $id }}"></div> --}}
    <textarea class="form-control mb-4" id="{{ $id }}"
    name="{{ $name }}">{{ old($name, $model[$name] ?? '') }}</textarea>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush


{{-- <x-BaseComponents.form.common.textarea-editor name="description" :model="$model" label="Blog Description" /> --}}
