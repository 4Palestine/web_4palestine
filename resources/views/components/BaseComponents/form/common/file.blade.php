@props([
    'name',
    'model' => $model,
    'path' => 'storage/',
    'label' => class_basename($model) . ' ' . $name,
    'placeholder' => Str::ucfirst('enter '. class_basename($model) . ' ' . $name),
    'cols' => '6',
])
<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input name="{{ $name }}" type="file" id="{{ $name }}" {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ]) }}>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
    @isset($model[$name])
        <div><img src="{{ asset($path . $model[$name]) }}" class="mt-2 rounded" width="50px" height="50px"
                alt="uploaded image"></div>
    @endisset
</div>



{{--Docs
    Author: khaled - 15/09/2022
_____________________________________________________________________________________
    * name => input name, should be same as DB attr.
    * model => the Model (table) of this item, we use it to show data when editing.
    * path =>[DEFAULT = storage/] the folder path to store the uploaded images.
    * label =>[OPTIONAL] input label.
    * placeholder =>[OPTIONAL] input placehoder.

    Full EXAMPLE:-
    <x-BaseComponents.form.common.file name="file" :model="$category" path="storage/" label="category name" placeholder="Enter category name" />

    Less EXAMPLE:-
    <x-BaseComponents.form.common.file name="file" :model="$category" />
_____________________________________________________________________________________
--}}
