@extends('Layouts.master')


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




