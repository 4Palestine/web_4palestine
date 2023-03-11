@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.tag.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('dashboard.tag._form_tag', [
                        'form_title' => 'Create Tag',
                    ])

                </form>
            </div>
        </div>
    </div>
@endsection
