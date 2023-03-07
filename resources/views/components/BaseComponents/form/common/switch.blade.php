@props([
    'name',
    'model' => $model,
    'label' => class_basename($model) . ' ' . rtrim($name, '[]'), 'options' => [],
    'cols' => '12',
])

<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <div class="form-check form-switch">
        <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
        <input class="form-check-input" type="checkbox" id="{{ $name }}" > {{-- @checked(old($name, $model[$name]) == $value) --}}
    </div>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


{{-- Docs
    Author: khaled - 16/09/2022
_____________________________________________________________________________________
    * name => input name, should be same as DB attr
    * model => the Model (table) of this item, we use it to show data when editing
    * label =>[OPTIONAL] input label

    Full EXAMPLE:-
    <x-BaseComponents.form.common.switch name="is_active" :model="$model" label="Is Active" />

_____________________________________________________________________________________ --}}
