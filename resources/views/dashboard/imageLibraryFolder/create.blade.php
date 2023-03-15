@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.imageLibraryFolder.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('dashboard.imageLibraryFolder._form_imageLibraryFolder', [
                        'form_title' => 'Create New Images Folder',
                    ])

                </form>
            </div>
        </div>
    </div>
@endsection
