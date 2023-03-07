@props([
    'name',
    'model' => $model,
    'options' => [],
    'label' => class_basename($model) . ' ' . preg_quote($name, '_') ? str_replace("_", " ", $name) : $name ,
    'cols' => '6',
])
<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    <select name="{{ $name }}" @class(['form-select', 'is-invalid' => $errors->has($name)]) id="{{ $name }}"
        aria-label="Default select example" {{ $attributes }}>
        @foreach ($options as $value => $option_label)
            <option value="{{ $value }}" @selected(old($name, $model[$name]) == $value)>{{ $option_label }}</option>
        @endforeach
    </select>
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
    * options => array of key=>value | the key is the value of the option,
                                    and the value is the label of this option

    Full EXAMPLE:-
    <x-BaseComponents.form.common.select_fixed name="name" :model="$model" label="category name"
    :options="[
        'fixed' => 'Fixed',
        'mobile' => 'Mobile'
    ]" />

    Less EXAMPLE:-
    <x-BaseComponents.form.common.select_fixed name="name" :model="$model"
    :options="[
        'fixed' => 'Fixed',
        'mobile' => 'Mobile'
    ]" />
_____________________________________________________________________________________
--}}


