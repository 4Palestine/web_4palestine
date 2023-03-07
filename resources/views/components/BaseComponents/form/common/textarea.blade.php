@props([
    'name',
    'model' => $model,
    'rows' => 2,
    'label' => class_basename($model) . ' ' . $name,
    'placeholder' => Str::ucfirst('enter '. class_basename($model) . ' ' . $name),
    'cols' => '12',
])

<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label class="form-label" for="{{ $name }}">{{ ucwords($label) }}</label>
    <textarea class="form-control" name="{{ $name }}"
        @class(['form-control', 'is-invalid' => $errors->has($name)]) id="{{ $name }}" placeholder="{{ $placeholder }}"
        rows="{{ $rows }}" {{ $attributes }}>{{ old($name, $model[$name]) }}</textarea>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


{{--Docs
    Author: khaled - 15/09/2022
_____________________________________________________________________________________
    * name => input name, should be same as DB attr
    * model => the Model (table) of this item, we use it to show data when editing
    * label =>[OPTIONAL] input label
    * placeholder =>[OPTIONAL] input placehoder
    * rows => number of textarea rows

    Full EXAMPLE:-
    <x-BaseComponents.form.common.textarea name="description" :model="$category" rows="3" label="Category Description" placeholder="Enter Category Description" />

    Less EXAMPLE:-
    <x-BaseComponents.form.common.textarea name="description" :model="$category" />
_____________________________________________________________________________________
--}}
