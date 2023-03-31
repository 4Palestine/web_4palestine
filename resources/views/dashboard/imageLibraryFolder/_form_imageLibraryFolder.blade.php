<div class="card-header border-0 d-flex justify-content-between align-items-center">
    <h5 class="card-title">{{ $form_title }}</h5>
    <div>
        <a href="{{ url()->previous() }}" class="btn btn-cancel shadow-sm px-2 ms-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-arrow-left">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Cancel</span>
        </a>
        <x-BaseComponents.form.common.submit_button />

    </div>
    {{-- <button type="submit" class="btn btn-primary px-5">{{ str_word_count($form_title, 1)[0] ?? 'Save' }}</button> --}}
</div>
<hr class="hr p-0 mx-3 my-1">
<div class="card-body table-responsive p-4">
    <div class="row">

        <x-BaseComponents.form.common.input type="text" name="name_en" :model="$model" label="Folder Name (EN)" placeholder="Enter Folder Name (EN)" />
        <x-BaseComponents.form.common.input type="text" name="name_ar" :model="$model" label="Folder Name (AR)" placeholder="Enter Folder Name (AR)" />

        <x-BaseComponents.form.common.select_dynamic name="parent_id" :model="$model" label="Parent Folder"
        :options="$additionalData['libraryFolders']" default_option=" " option_value_column="id" option_label_column="name" />

        <x-BaseComponents.form.common.select_fixed name="is_active" :model="$model" :options="[
            '0' => 'Not Active',
            '1' => 'Active',
        ]" />

        <x-BaseComponents.form.common.images_multiple name="images[]" :model="$model" multiple label="Choose Multiple Images" />

    </div>
</div>


@push('style')
    <style>
        #radio-folders label {
            border: 2px solid transparent !important;
        }
        #radio-folders label:hover {
            background-color: #315dfa45 !important;
        }
        #radio-folders input:checked + label {
            background-color: #315dfa45 !important;
            border: 2px solid #315dfa9a !important;
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).ready(function() {

            // code of lists (texts) multi input generator
            var max_fields = 10;
            var wrapper = $(".kh_wrapper");
            var add_button = $(".kh_add_form_field");
            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                var unique_key = $(this).parent().closest(wrapper).data(
                    'key'); // هان جبنا ال يونيك كي تبع الرابر اللي انا فيه وفققققطط
                var this_wrapper = $(this).parent().closest(
                    wrapper); // هاد عشان يضيف انبوت جديد فقط للرابر اللي انا فيه حاليا مش لكل الرابرز
                // var input_name = $(this).parent().closest(wrapper).find('.kh_input').first().attr('name');
                if (true) { // x <= max_fields
                    x++;

                    var new_input_box = $(
                        '<div class="mt-2 parent_delete"><div class="input-group"><input required type="text" name="' +
                        unique_key + '[]" id="' + unique_key +
                        '" class="form-control rounded-start" aria-describedby="' +
                        unique_key + '"><a href="#" class="kh_delete input-group-text" id="' +
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



            $('#radio-folders input[type=radio]').hide();


        });
    </script>


@endpush
