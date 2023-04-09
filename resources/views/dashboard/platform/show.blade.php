@extends('layouts.master')

@section('master')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>{{ $model['name'] }}</h4>test 555
            <div>
                <a href="{{ route('dashboard.platform.index') }}" class="btn bg-dark text-white">Platforms</a>
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
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Description</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex justify-content-between align-items-center p-0">
                            <span>{{ $model['description'] }}</span>
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
                                class="badge {{ $model['is_active'] == 1 ? 'bg-success' : 'bg-danger' }}">{{ $model['is_active'] == 1 ? 'Active' : 'Not Active' }}</span>
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
                            <span>{{ $model['admin_data']->name }} | {{ $model['admin_data']->email }} </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border p-2 d-flex align-items-center">
                    <div class="row w-100 ">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Tags</span>
                            <span>:</span>
                        </div>
                        <div class="col-9 d-flex align-items-center p-0">
                            @foreach ($model['tags'] as $tag)
                                <span class="badge bg-dark text-white me-2">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
