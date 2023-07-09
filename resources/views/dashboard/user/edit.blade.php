@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('dashboard.user._form_user', [
                        'form_title' => 'Edit User'
                    ])

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
