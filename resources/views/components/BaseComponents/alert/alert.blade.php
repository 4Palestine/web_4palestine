@props([
    'type' => 'other',
])

@if (session()->has($type))
    <div @class(['alert border-0 alert-dismissible fade show py-2',
        'bg-success' => $type == 'success',
        'bg-danger' => $type == 'fail',
        'bg-dark' => $type == 'other',])
        style="position: absolute; bottom: 10px; right: 20px; z-index: 99;">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-white"><i
            @class(['', 'bi bi-check-circle-fill' => $type == 'success',
            'bi bi-x-circle-fill' => $type == 'fail'])></i>
            </div>
            <div class="ms-3">
                <div class="text-white">{{ session($type) }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
