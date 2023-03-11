@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.platform.update', $model['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('dashboard.platform._form_platform', [
                        'form_title' => 'Edit platform'
                    ])

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
