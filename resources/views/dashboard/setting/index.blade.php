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
                                                    <label class="form-label"
                                                        for="{{ $social->key }}">{{ $social->key }}</label>
                                                    <input type="text" class="col-12 form-control"
                                                        name="{{ $social->key }}" id="{{ $social->key }}"
                                                        placeholder="Enter {{ $social->key }} value"
                                                        value="{{ old($social->key, $social->value) }}">
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach ($modes as $mode)
                                            <div class="mb-3 col-12">
                                                <label class="form-label"
                                                    for="{{ $mode->key }}">{{ $mode->key }}</label>
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

                                        <div class="mb-3 col-12 col-sm-12">
                                            <div class="kh_wrapper" data-key="faq" data-key1="questions" data-key2="answers">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="form-label" for="faq[]">Add FAQ's</label>
                                                    <button class="kh_add_form_field btn bg-light-success px-1 py-0"><small>Add
                                                            New
                                                            FAQ
                                                            +</small></button>
                                                </div>
                                                @if (isset($faqs->questions))
                                                    @foreach ($faqs->questions as $index => $question)
                                                        <div class="mt-3 parent_delete">
                                                            <div class="input-group">
                                                                <input required type="text" value="{{ $question }}"
                                                                    name="questions[]" id="questions"
                                                                    class="form-control rounded-start me-2"
                                                                    aria-describedby="questions" placeholder="question #{{ $index+1 }}">

                                                                <input required type="text" value="{{ $faqs->answers[$index] }}"
                                                                    name="answers[]" id="answers"
                                                                    class="form-control rounded-start"
                                                                    aria-describedby="answers" placeholder="answer #{{ $index+1 }}">
                                                                <a href="#" class="kh_delete input-group-text"
                                                                    id="faq"><img
                                                                        src="https://freesvg.org/img/trash.png"
                                                                        width="20px" alt="delete"></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="mt-3">
                                                        <div class="input-group">
                                                            <input type="text" name="questions[]"
                                                                class="kh_input form-control me-2 rounded"
                                                                aria-describedby="questions" placeholder="question #1">

                                                                <input type="text" name="answers[]"
                                                                class="kh_input form-control rounded"
                                                                aria-describedby="answers" placeholder="answer #1">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

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

@push('script')
    <script>
        $(document).ready(function() {

            // code of lists (texts) multi input generator
            var max_fields = 20;
            var wrapper = $(".kh_wrapper");
            var add_button = $(".kh_add_form_field");
            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                var unique_key = $(this).parent().closest(wrapper).data(
                    'key'); // هان جبنا ال يونيك كي تبع الرابر اللي انا فيه وفققققطط

                    var unique_key1 = $(this).parent().closest(wrapper).data(
                    'key1');
                    var unique_key2 = $(this).parent().closest(wrapper).data(
                    'key2');
                var this_wrapper = $(this).parent().closest(
                    wrapper); // هاد عشان يضيف انبوت جديد فقط للرابر اللي انا فيه حاليا مش لكل الرابرز
                // var input_name = $(this).parent().closest(wrapper).find('.kh_input').first().attr('name');
                if (true) { // x <= max_fields
                    x++;

                    var new_input_box = $(
                        '<div class="mt-2 parent_delete"><div class="input-group"><input required type="text" name="' +
                            unique_key1 + '[]" id="' + unique_key1 +
                        '" class="form-control rounded-start me-2" aria-describedby="' +
                        unique_key1 + '" placeholder="question #' + x + '"><input required type="text" name="' +
                        unique_key2 + '[]" id="' + unique_key2 +
                        '" class="form-control rounded-start" aria-describedby="' +
                        unique_key2 + '" placeholder="answer #' + x + '"><a href="#" class="kh_delete input-group-text" id="' +
                        unique_key +
                        '"><img src="https://freesvg.org/img/trash.png" width="20px" alt="delete"></a></div></div>'
                    ).hide();
                    $(this_wrapper).append(new_input_box); //add input box
                    new_input_box.show(300);
                } else {
                    alert('You Reached the limits')
                }
            });
            $(wrapper).on("click", ".kh_delete", function(e) {
                e.preventDefault();
                $(this).parent().closest('.parent_delete').hide(200, function() {
                    $(this).remove();
                });
                x--;
            })

        });
    </script>
@endpush
