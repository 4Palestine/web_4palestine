@props([
    'name',
    'model' => $model,
    'options' => $model,
    'option_value_column' => 'id',
    'option_label_column' => 'name',
    'label' => class_basename((object)$model) . ' ' . preg_quote($name, '_') ? str_replace("_", " ", $name) : $name ,
    'cols' => '12',
])


<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="multiple-select" data-placeholder="{{ ucwords($label) }}" multiple="multiple" {{ $attributes }}>
        @foreach ($options as $option)
            <option value="{{ $option[$option_value_column] }}" @selected(collect(old($name, json_decode($model[$name])))->contains($option[$option_value_column]))>
                {{ $option[$option_label_column] }}</option>
        @endforeach
    </select>
    @error($name)
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>




{{--Docs
    Author: khaled - 04/04/2023
_____________________________________________________________________________________
    * name => input name, should be same as DB attr
    * model => the Model (table) of this item, we use it to show data when editing
    * label =>[OPTIONAL] input label
    * options => array of values that need to be set as options in the select
    * option_value_column => column of DB that need to be the value of this option [default = id]
    * option_label_column => the label to show of this option [ default = name ]


    Full EXAMPLE:-
        <x-BaseComponents.form.common.select_multiple_badge name="tags" :model="$model" label="Select Tags"
        :options="$model" option_value_column="id" option_label_column="name" />

    Less EXAMPLE:-
        <x-BaseComponents.form.common.select_multiple_badge name="tags" :model="$model"
        option_value_column="id" option_label_column="name" />

_____________________________________________________________________________________
--}}


