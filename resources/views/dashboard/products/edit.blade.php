@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.products.update', $model->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('dashboard.products._form_product', [
                        'form_title' => 'Edit product'
                    ])

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
