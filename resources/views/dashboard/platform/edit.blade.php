@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.platform.update', $model->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('dashboard.platform._form_platform', [
                        'form_title' => 'Edit platform'
                    ])

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection


@push('style')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=tags]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
@endpush
