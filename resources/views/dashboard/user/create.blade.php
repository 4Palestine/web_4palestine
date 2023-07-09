@extends('layouts.master')

@section('cssFile')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
@endsection

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('dashboard.user._form_user', [
                        'form_title' => 'Create User',
                    ])

                </form>
            </div>
        </div>
    </div>

@endsection

@section('jsFile')
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('languages')  // id
</script>
@endsection




