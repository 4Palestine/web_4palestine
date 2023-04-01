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
                            <h4 class="card-title">Settings</h4>
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
                                                <div class="mb-3 col-12">
                                                    <label class="form-label" for="{{ $social->key }}">{{ $social->key }}</label>
                                                    <input type="text" class="col-12 form-control"
                                                        name="{{ $social->key }}" id="{{ $social->key }}"
                                                        placeholder="Enter {{ $social->key }} value" value="{{ old($social->key, $social->value) }}">
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach ($modes as $mode )
                                            <div class="mb-3 col-12">
                                                <label class="form-label" for="{{ $mode->key }}">{{ $mode->key }}</label>
                                                <select class="form-select" id="{{ $mode->key }}"
                                                        name="{{ $mode->key }}" aria-label="Default select example">
                                                        <option value="">Choose Mode</option>
                                                        <option @selected(old($mode->key, $mode->value) == 'light')>Light Mode</option>
                                                        <option @selected(old($mode->key, $mode->value) == 'dark')>Dark Mode</option>

                                                        {{-- @if ($mode->value == 'light') selected @endif
                                                        value="light" --}}

                                                        {{-- @if ($mode->value == 'dark') selected @endif
                                                            value="dark" --}}
                                                </select>
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
