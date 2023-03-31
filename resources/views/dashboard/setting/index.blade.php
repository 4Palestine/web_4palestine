@extends('layouts.master')

@section('master')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="panel-body">
                            <form action="{{ route('dashboard.setting.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($socials as $social)
                                            <div class="form-group col-12">
                                                <label for="first_name">{{ $social->key }}</label>
                                                <div class="col-12">
                                                    <div class="row-update">
                                                        <input type="text" class="col-12 form-control-update"
                                                            name="{{ $social->key }}" id="value"
                                                            placeholder="Enter Value" value="{{ $social->value }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach ($modes as $mode )
                                        <div class="form-group col-12">
                                            <label for="first_name">{{ $mode->key }}</label>
                                            <div class="col-12">
                                                <div class="row-update">
                                                    <select class="form-control-update col-12" id="{{ $mode->key }}"
                                                            name="{{ $mode->key }}">
                                                            <option value="">Choose Mode</option>
                                                            <option @if ($mode->value == 'light') selected @endif
                                                                value="light">Light Mode</option>
                                                            <option @if ($mode->value == 'dark') selected @endif
                                                                value="dark">Dark Mode</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    {{-- <a href="{{ route('admins.index') }}" type="submit" class="btn btn-info">Go Back</a> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
