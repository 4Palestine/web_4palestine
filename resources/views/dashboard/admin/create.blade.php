@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.admin.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('dashboard.admin._form_admin', [
                        'form_title' => 'Create Admin',
                    ])

                </form>
            </div>
        </div>
    </div>

@endsection
