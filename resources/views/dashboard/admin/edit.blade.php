@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('dashboard.admin._form_admin', [
                        'form_title' => 'Edit Admin'
                    ])

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
