@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.platform.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('dashboard.platform._form_platform', [
                        'form_title' => 'Create platform',
                    ])

                </form>
            </div>
        </div>
    </div>
@endsection
