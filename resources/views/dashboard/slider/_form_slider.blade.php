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
    {{-- <div class="row">

        <x-BaseComponents.form.common.select_dynamic_search name="platform_id" :model="$model" label="Platform"
            :options="$additionalData['platforms']" default_option=" " option_value_column="id" option_label_column="name" />

        <x-BaseComponents.form.common.image name="image" :model="$model" />

        <x-BaseComponents.form.common.input type="link" name="mission_link" :model="$model" />

        <x-BaseComponents.form.common.input type="number" name="mission_duration" label="Mission Duration (houres)"
            placeholder="Mission Duration (houres)" :model="$model" />

        <x-BaseComponents.form.common.select_fixed name="mission_type" :model="$model" :options="[
            'support' => 'Support',
            'attack' => 'Attack',
        ]" />

        <x-BaseComponents.form.common.input type="number" name="mission_stars" :model="$model" />

        <x-BaseComponents.form.common.textarea name="description_en" :model="$model" rows="3"
            label="mission Description (EN)" placeholder="Enter mission Description (EN)" />

        <x-BaseComponents.form.common.textarea name="description_ar" :model="$model" rows="3"
            label="mission Description (AR)" placeholder="Enter mission Description (AR)" />


        <div class="mb-3 col-12 col-sm-6">
            <div class="kh_wrapper" data-key="comments_en">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label" for="comments_en[]">Add Comments (EN)</label>
                    <button class="kh_add_form_field btn bg-light-success px-1 py-0"><small>Add New
                            Field
                            +</small></button>
                </div>
                @if (request()->route()->getName() == 'dashboard.mission.create')
                    <div class="mt-2">
                        <div class="input-group">
                            <input type="text" name="comments_en[]" class="kh_input form-control rounded"
                                aria-describedby="comments_en">
                        </div>
                    </div>
                @else
                    @forelse ($model['comments_en'] as $comment)
                        @if ($loop->first)
                            <div class="mt-2">
                                <div class="input-group">
                                    <input type="text" value="{{ $comment }}" name="comments_en[]"
                                        class="kh_input form-control rounded" aria-describedby="comments_en">
                                </div>
                            </div>
                        @else
                            <div class="mt-2 parent_delete">
                                <div class="input-group"><input required type="text" value="{{ $comment }}"
                                        name="comments_en[]" id="comments_en" class="form-control rounded-start"
                                        aria-describedby="comments_en"><a href="#"
                                        class="kh_delete input-group-text" id="comments_en"><img
                                            src="https://freesvg.org/img/trash.png" width="20px" alt="delete"></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="mt-2">
                            <div class="input-group">
                                <input type="text" name="comments_en[]" class="kh_input form-control rounded"
                                    aria-describedby="comments_en">
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>

        <div class="mb-3 col-12 col-sm-6">
            <div class="kh_wrapper" data-key="comments_ar">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label" for="comments_ar[]">Add Comments (AR)</label>
                    <button class="kh_add_form_field btn bg-light-success px-1 py-0"><small>Add New
                            Field
                            +</small></button>
                </div>
                @if (request()->route()->getName() == 'dashboard.mission.create')
                    <div class="mt-2">
                        <div class="input-group">
                            <input type="text" name="comments_ar[]" class="kh_input form-control rounded"
                                aria-describedby="comments_ar">
                        </div>
                    </div>
                @else
                    @forelse ($model['comments_ar'] as $comment)
                        @if ($loop->first)
                            <div class="mt-2">
                                <div class="input-group">
                                    <input type="text" value="{{ $comment }}" name="comments_ar[]"
                                        class="kh_input form-control rounded" aria-describedby="comments_ar">
                                </div>
                            </div>
                        @else
                            <div class="mt-2 parent_delete">
                                <div class="input-group"><input required type="text" value="{{ $comment }}"
                                        name="comments_ar[]" id="comments_ar" class="form-control rounded-start"
                                        aria-describedby="comments_ar"><a href="#"
                                        class="kh_delete input-group-text" id="comments_ar"><img
                                            src="https://freesvg.org/img/trash.png" width="20px"
                                            alt="delete"></a></div>
                            </div>
                        @endif
                    @empty
                        <div class="mt-2">
                            <div class="input-group">
                                <input type="text" name="comments_ar[]" class="kh_input form-control rounded"
                                    aria-describedby="comments_ar">
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Mission Social Tags</label>
            <select name="tags[]" id="option_tags" class="multiple-select" data-placeholder="Choose Mission Social Tags" multiple="multiple">
                @foreach($additionalData['tags'] as $tag)
                    <option value="{{ $tag['name'] }}" @selected(collect(old('tags', $model['tags']))->contains($tag['name']))>{{ $tag['name'] }}</option>
                @endforeach
            </select>
        </div>


        <x-BaseComponents.form.common.select_fixed name="is_active" :model="$model" :options="[
            '1' => 'Active',
            '0' => 'Not Active',
        ]" />


    </div> --}}
    <div class="row">
        <div class="mb-3 col-12">
            <div class="kh_image_wrapper" data-key="mockups">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label" for="mockups[]">Add Mockups</label>
                    <button class="kh_image_add_form_field btn bg-light-success px-1 py-0"><small>Add
                            New Field
                            +</small></button>
                </div>
                @if (request()->route()->getName() == 'dashboard.slider.create')
                    <div class="mt-2">
                        <div class="input-group input-group-lg">
                            <input type="file" name="mockups[]"
                                class="kh_image_input form-control border rounded-start col-12"
                                aria-describedby="mockups">
                                {{-- <x-BaseComponents.form.common.input type='text' name="order" :model="$slider" cols="12" /> --}}
                            <input class="col-12 kh_image_input form-control" type="number" min="0" name="order[]" placeholder="Enter Order" aria-describedby="mockups">
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <x-BaseComponents.form.common.select_fixed name="is_active" :model="$model" label="Is Active" cols="12"
                :options="[
                    '1' => 'Active',
                    '0' => 'Not Active',
                ]" />
        {{-- <x-BaseComponents.form.common.input type='text' name="order" :model="$slider" cols="12" /> --}}
    </div>

</div>

@push('style')
@endpush

@push('script')
<script>

$(document).ready(function() {


    var max_fields = 10;

    // code of Image (mockups) multi input generator
    var image_wrapper = $(".kh_image_wrapper");
    var image_add_button = $(".kh_image_add_form_field");
    var x = 0;

    $(image_add_button).click(function(e) {
        e.preventDefault();
        var unique_key = $(this).parent().closest(image_wrapper).data(
            'key'); // هان جبنا ال يونيك كي تبع الرابر اللي انا فيه وفققققطط
        var this_image_wrapper = $(this).parent().closest(
            image_wrapper); // هاد عشان يضيف انبوت جديد فقط للرابر اللي انا فيه حاليا مش لكل الرابرز
        // var input_name = $(this).parent().closest(image_wrapper).find('.kh_input').first().attr('name');
        if (true) { // x <= max_fields
            x++;

            var new_image_input_box = $(
                '<div class="mt-2 parent_delete"><div class="input-group input-group-lg"><input required type="file" name="' +
                unique_key + '[]" id="' + unique_key +
                '" class="form-control border rounded-start" aria-describedby="' +
                unique_key + '"><input class="col-12 form-control" type="number" min="0" name="order[]" placeholder="Enter Order"><a href="#" class="kh_delete input-group-text" id="' +
                unique_key +
                '"><img src="https://freesvg.org/img/trash.png" width="20px" alt="delete"></a></div></div>'
            ).hide();

            $(this_image_wrapper).append(new_image_input_box); //add input box
            new_image_input_box.show(300);
        } else {
            alert('You Reached the limits')
        }
    });
    $(image_wrapper).on("click", ".kh_delete", function(e) {
        e.preventDefault();
        $(this).parent().closest('.parent_delete').hide(200, function() {
            $(this).remove();
        });
        x--;
    })

});
</script>
@endpush
