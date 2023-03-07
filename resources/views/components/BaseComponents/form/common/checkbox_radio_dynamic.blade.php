@props([
    'name',
    'model' => $model,
    'type' => 'radio',
    'options' => $model,
    'option_value_column' => 'id',
    'option_label_column' => 'name',
    'label' => class_basename($model) . ' ' . preg_quote($name, '_') ? str_replace('_', ' ', $name) : $name,
    'display' => 'inline',
    'cols' => '12',
])

<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    @foreach ($options as $option)
        <div class="form-check form-check-{{ $display }}">
            <input class="form-check-input" name="{{ $name }}" type="{{ $type }}" id="{{ $option[$option_value_column] }}"
                value="{{ $option[$option_value_column] }}" @checked(old($name, $model[$name]) == $option[$option_value_column])>
            <label class="form-check-label" for="{{ $option[$option_value_column] }}">{{ $option[$option_label_column] }}</label>
        </div>
    @endforeach
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
    * options => array of values that need to be set as options in the checkboxes or radios [default = the current model]
    * option_value_column => column of DB that need to be the value of this option [default = id]
    * option_label_column => the label to show of this option [ default = name ]
    * type => type on input [ checkbox OR radio ]


    Full EXAMPLE:-
    <x-BaseComponents.form.common.checkbox_radio_dynamic name="status" :model="$category" type="checkbox" label="category status"
    :options="$parents" option_value_column="id" option_label_column="name" display="col" />

    Less EXAMPLE:-
    <x-BaseComponents.form.common.checkbox_radio_dynamic name="status" :model="$category"
    :options="$parents" />
_____________________________________________________________________________________
--}}
