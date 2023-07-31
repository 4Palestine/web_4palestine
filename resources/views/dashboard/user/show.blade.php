@extends('layouts.master')

@section('master')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>{{ $user->name }}</h4>
            <div>
                <a href="{{ route('dashboard.user.index') }}" class="btn bg-dark text-white">Users</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="row p-0 m-0">
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Image</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span><img src="{{ $user->avatar }}" class="product-img-2 border-0" alt="image"></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Email</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $user->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Is Active</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span
                                class="badge {{ $user->is_active == 1 ? 'bg-success' : 'bg-danger' }}">{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Is Super</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span
                                class="badge {{ $user->is_super == 1 ? 'bg-primary' : 'bg-secondary' }}">{{ $user->is_super == 1 ? 'Super' : 'Not Super' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Country</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $user->country }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Languages</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $user->languages }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Stars</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $user->stars->stars ?? 0 }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Missions</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ count($user->missions_count) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Contacts</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ count($user->contacts) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

