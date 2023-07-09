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

        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime, incidunt assumenda labore aut sint similique.

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
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">
                            Accordion Khaled Github Test 2
                        </button>
                    </h2>
                    <div id="collapse_1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            Accordion Body
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
