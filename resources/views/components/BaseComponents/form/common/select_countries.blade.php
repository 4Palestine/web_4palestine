@props(['name', 'model' => $model, 'label' => $name, 'options' => $model, 'cols' => '6'])


<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    <select name="{{ $name }}" @class(['form-select', 'is-invalid' => $errors->has($name)]) id="{{ $name }}">
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @selected($value == $model[$name])>{{ $text }}</option>
        @endforeach
    </select>
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
</div>

{{-- Docs
    Author: khaled - 15/09/2022
_____________________________________________________________________________________
    * name => input name, should be same as DB attr
    * model => the Model (table) of this item, we use it to show data when editing
    * options => array of values that need to be set as options in the select
    * default_option =>[OPTIONAL] the first option in the select [does not have a value]

    Full EXAMPLE:-
        <x-BaseComponents.form.common.select_countries name="country" :model="$model" label="Country"
        :options="$additionalData['countries']" default_option="Primary Category" />

    Less EXAMPLE:-
        <x-BaseComponents.form.common.select_countries name="country" :model="$model"
        :options="$additionalData['countries']" />
_____________________________________________________________________________________
--}}
