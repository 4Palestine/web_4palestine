{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-50 p-3 bg-light-primary">
                            <p>Users increase (last 7 days)</p>
                            <h4 class="text-primary">{{ $users_count }}</h4>
                        </div>
                        <div class="w-50 bg-primary p-3">
                            <p class="mb-3 text-white">{{ $users_increasing_percentage }} <i class="bi bi-arrow-up"></i>
                            </p>
                            <div id="chart3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-12 col-md-6">
        <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
                <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                    <div class="w-50 p-3 bg-light-primary">
                        <p>Users increase (last 7 days)</p>
                        <h4 class="text-primary">{{ $users_count }}</h4>
                    </div>
                    <div class="w-50 bg-primary p-3">
                        <p class="mb-3 text-white">{{ $users_increasing_percentage }} <i class="bi bi-arrow-up"></i></p>
                        <div id="chart4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
