@props([
    'name',
    'model' => $model,
    'options' => $model,
    'default_option' => '',
    'option_value_column' => 'id',
    'option_label_column' => 'name',
    'label' => class_basename($model) . ' ' . preg_quote($name, '_') ? str_replace("_", " ", $name) : $name ,
    'cols' => '6',
])


<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    <select name="{{ $name }}" @class(['form-select', 'is-invalid' => $errors->has($name)]) id="{{ $name }}"
        aria-label="Default select example">
        @if($default_option)
            <option value="">{{ $default_option }}</option>
        @endisset
        @foreach ($options as $option)
            <option value="{{ $option[$option_value_column] }}" @selected(old($name, $model[$name]) == $option[$option_value_column])>
                {{ $option[$option_label_column] }}</option>
        @endforeach
    </select>
    {{-- check if $name as string ends with []
        , then make a loop on the $model[$name] to show the data in badges under the select --}}
    @if (str_ends_with($name, '[]'))
        <div class="d-flex flex-wrap gap-1 mt-1">
            @foreach ($model[rtrim($name, '[]')] as $value)
                <span class="badge py-1 px-2 alert-primary" style="font-size: 12px; font-weight: 500;">{{ $value }}</span>
            @endforeach
        </div>
    @endif
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
    * options => array of values that need to be set as options in the select
    * default_option =>[OPTIONAL] the first option in the select [does not have a value]
    * option_value_column => column of DB that need to be the value of this option [default = id]
    * option_label_column => the label to show of this option [ default = name ]


    Full EXAMPLE:-
        <x-BaseComponents.form.common.select_dynamic name="parent_id" :model="$category" label="Parent ID"
        :options="$parents" default_option="Primary Category" option_value_column="id" option_label_column="name" />

    Less EXAMPLE:-
        <x-BaseComponents.form.common.select_dynamic name="parent_id" :model="$category"
        :options="$parents" option_value_column="id" option_label_column="name" />
_____________________________________________________________________________________
--}}


