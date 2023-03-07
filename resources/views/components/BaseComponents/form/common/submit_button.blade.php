@props([
    'text' => 'Save',
    'btn_color' => 'btn-primary',
])

<button type="submit" class="btn {{ $btn_color }} shadow px-3 ms-1">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-check-square">
        <polyline points="9 11 12 14 22 4"></polyline>
        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
    </svg>
    <span class="mx-1">{{ $text }}</span>
</button>




{{--

<x-BaseComponents.form.common.submit_button
text="save"
btn_color="btn-primary"/>
_______________________________________________________________
<x-BaseComponents.form.common.submit_button />

--}}
