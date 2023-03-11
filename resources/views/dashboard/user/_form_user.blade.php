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

        {{-- <x-BaseComponents.form.common.input type="text" name="guard_name" :model="$user" /> --}}
        <x-BaseComponents.form.common.input type="text" name="name" :model="$user" />

        <x-BaseComponents.form.common.input type="email" name="email" :model="$user" />

        <x-BaseComponents.form.common.password name="password" :model="$user" />
        <x-BaseComponents.form.common.password name="confirm-password" :model="$user" />


        <x-BaseComponents.form.common.select_fixed name="country" :model="$user"
        :options="[
            'PAL' => 'Palestine',
            'EGY' => 'Egypt',
        ]" />

        <x-BaseComponents.form.common.select_fixed name="languages" :model="$user"
        :options="[
            'ar' => 'Arabic',
            'en' => 'English',
            'fr' => 'French',
            'de' => 'German',
            'tr' => 'Turkish',
        ]" />

        <x-BaseComponents.form.common.checkbox_radio_fixed name="is_active" :model="$user" label="Is Active" cols="6"
        :options="[
            '1' => 'Active',
            '0' => 'Not Active'
        ]" />

        <x-BaseComponents.form.common.checkbox_radio_fixed name="is_super" :model="$user" label="Is Super" cols="6"
        :options="[
            '1' => 'Super',
            '0' => 'Not Super'
        ]" />


        <x-BaseComponents.form.common.image name="avatar" :model="$user" />


    </div>
</div>
