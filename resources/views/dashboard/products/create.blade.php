@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('dashboard.products._form_product', [
                        'form_title' => 'Create product',
                    ])

                </form>
            </div>
        </div>
    </div>
@endsection
