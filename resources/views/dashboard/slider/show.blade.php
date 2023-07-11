@extends('layouts.master')

@section('master')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>{{ $model['mission_type'] }}</h4>
            <div>
                <a href="{{ route('dashboard.mission.index') }}" class="btn bg-dark text-white">Missions</a>
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
                            <span><img src="{{ $model['image'] }}" class="product-img-2 border-0" alt="image"></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Description Ar</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['description_ar'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Description En</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['description_en'] }}</span>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Is Active</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span
                                class="badge {{ $model['is_active'] == 1 ? 'bg-success' : 'bg-danger' }}">{{ $model['is_active'] == 1 ? 'Active' : 'Not Active' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Description En</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['description_en'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Platform</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['platform_name'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Mission Link</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['mission_link'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Mission Duration</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['mission_duration'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Mission Stars</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['mission_stars'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Last update by</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['admin_data']->name ?? 'null' }} | {{ $model['admin_data']->email ?? 'null' }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
