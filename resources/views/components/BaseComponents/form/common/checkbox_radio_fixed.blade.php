@props([
    'name',
    'type' => 'radio',
    'model' => $model,
    'label' => class_basename($model) . ' ' . rtrim($name, '[]'), 'options' => [],
    'cols' => '12',
])

<div class="mb-3 col-12 col-sm-{{ $cols }}">
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    <div class="d-flex flex-wrap align-items-center mt-2">
        @foreach ($options as $value => $option_label)
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="{{ $name }}" type="{{ $type }}" id="{{ $value }}"
                    value="{{ $value }}" @checked(old($name, $model[$name]) == $value)>
                <label class="form-check-label" for="{{ $value }}">{{ Str::ucfirst($option_label) }}</label>
            </div>
        @endforeach
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
    * options => array of key=>value | the key is the value of the option,
                                    and the value is the label of this option

    Full EXAMPLE:-
    <x-BaseComponents.form.common.checkbox_radio_fixed name="status" :model="$category" label="category status"
    :options="[
        'fixed' => 'Fixed',
        'mobile' => 'Mobile'
    ]" />

    Less EXAMPLE:-
    <x-BaseComponents.form.common.checkbox_radio_fixed name="status" :model="$category"
    :options="[
        'fixed' => 'Fixed',
        'mobile' => 'Mobile'
    ]" />
_____________________________________________________________________________________ --}}
