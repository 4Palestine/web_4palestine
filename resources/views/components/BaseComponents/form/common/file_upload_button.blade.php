@props([
    'name',
    'label' => 'Uplaod File',
])



<button class="btn btn-outline-primary position-relative btn-block mt-2 p-0">
    <span class="position-absolute" style="left: 32%; top: 3px;">
        <i class="lni lni-upload mx-3"></i>{{ $label }}</span>
    <input type="file" name="{{ $name }}" style="opacity: 0" class="p-0 border d-block w-100">
</button>
