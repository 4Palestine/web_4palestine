@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-50 p-3 bg-light-pink">
                            <div class="widget-icon bg-light-pink text-pink">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <br>
                            <p>Users increase (last 7 days)</p>
                            <h4 class="text-pink">{{ $users_count }}</h4>
                        </div>
                        <div class="w-50 bg-pink p-3">
                            <p class="mb-3 text-white">{{ $users_increasing_percentage }} <i class="bi bi-arrow-up"></i>
                            </p>
                            <div id="chart3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-6 col-md-3">
            <div class="card radius-10">
                <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-success text-success">
                        <i class="lni lni-world"></i>
                    </div>
                    <h3>{{ $platforms_count }}</h3>
                    <p class="mb-4">Platforms</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card radius-10">
                <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-purple text-purple">
                        <i class="lni lni-target"></i>
                    </div>
                    <h3>{{ $missions_count }}</h3>
                    <p class="mb-4">Missions</p>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-6">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed bg-secondary text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">
                            <i class="fadeIn animated bx bx-message-alt-detail me-2"></i> Contact Requests
                        </button>
                    </h2>
                    <div id="collapse_1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body py-2 px-0">
                            <div class="card p-0 mb-0">
                                <div class="card-body p-0">
                                    <table class="table mb-0">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">user ID</th>
                                                <th scope="col">user name</th>
                                                <th scope="col">message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($contacts as $contact)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $contact->user_id }}</td>
                                                    <td>{{ $contact->user_name }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">there is no contacts, yet.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-12 col-md-6">
            <div class="accordion" id="accordionExampleSlider">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOneSlider">
                        <button class="accordion-button collapsed bg-secondary text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_slider" aria-expanded="false" aria-controls="collapse_slider">
                            <i class="fadeIn animated bx bx-message-alt-detail me-2"></i> Home Slider Images
                        </button>
                    </h2>
                    <div id="collapse_slider" class="accordion-collapse collapse show" aria-labelledby="headingOneSlider" data-bs-parent="#accordionExampleSlider" style="">
                        <div class="accordion-body py-2 px-0">
                            <div class="card p-0 mb-0">
                                <div class="card-body p-0">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


    </div>
@endsection
