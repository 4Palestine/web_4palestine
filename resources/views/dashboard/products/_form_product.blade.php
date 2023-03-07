<div class="card-header border-0 d-flex justify-content-between align-items-center">
    <h5 class="card-title">{{ $form_title }}</h5>
    <div>
        <a href="{{ url()->previous() }}" class="btn btn-cancel shadow-sm px-2 ms-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            <span>Cancel</span>
        </a>
        <x-BaseComponents.form.common.submit_button />

    </div>
    {{-- <button type="submit" class="btn btn-primary px-5">{{ str_word_count($form_title, 1)[0] ?? 'Save' }}</button> --}}
</div>
<hr class="hr p-0 mx-3 my-1">
<div class="card-body table-responsive p-4">
    <div class="row">

        <x-BaseComponents.form.common.input type="text" name="name" :model="$model" />

        <x-BaseComponents.form.common.textarea name="description" :model="$model" rows="3" label="Product Description" placeholder="Enter Product Description" />

        <x-BaseComponents.form.common.input type="number" name="price" :model="$model" />
        <x-BaseComponents.form.common.input type="number" name="compare_price" :model="$model" />

        {{-- <x-BaseComponents.form.common.input type="text" name="tags" :model="$additionalData['tags']" /> --}}

        <div class="mb-3 col-12 col-sm-6 d-flex flex-column">
            <label class="form-label" for="tags">Product Tags</label>
            <input type="text" name="tags" value="{{ $additionalData['tags'] ?? '' }}" id="tags" placeholder="Enter Product Tags" @class([
                'form-control',
                'is-invalid' => $errors->has('tags')
            ])>
            @error('tags')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <x-BaseComponents.form.common.select_dynamic name="store_id" :model="$model" label="Store ID"
        :options="$additionalData['stores']" default_option=" " option_value_column="id" option_label_column="name" />

        <x-BaseComponents.form.common.select_dynamic name="category_id" :model="$model" label="Category ID"
        :options="$additionalData['categories']" default_option=" " option_value_column="id" option_label_column="name" />


        <x-BaseComponents.form.common.select_fixed name="status" :model="$model"
        :options="[
            'active' => 'active',
            'draft' => 'draft',
            'archived' => 'archived',
        ]" />

        <x-BaseComponents.form.common.select_fixed name="featured" :model="$model"
        :options="[
            '1' => 'Featured',
            '0' => 'Not Featured',
        ]" />

        <x-BaseComponents.form.common.image name="image" :model="$model" />

    </div>
</div>
