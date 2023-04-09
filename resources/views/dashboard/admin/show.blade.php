@extends('layouts.master')

@section('master')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>{{ $admin->name }}</h4>
            <div>
                <a href="{{ route('dashboard.admin.index') }}" class="btn bg-dark text-white">Admins</a>
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
                            <span><img src="{{ $admin->avatar }}" class="product-img-2 border-0" alt="image"></span>
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
                            <span>{{ $admin->email }}</span>
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
                                class="badge {{ $admin->is_active == 1 ? 'bg-success' : 'bg-danger' }}">{{ $admin->is_active == 1 ? 'Active' : 'Not Active' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Role</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $admin->role }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


