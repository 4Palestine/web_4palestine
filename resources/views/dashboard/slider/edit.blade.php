@extends('layouts.master')

@section('master')
<div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.slider.update', $model['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header border-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Edit Slider</h5>
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

                    <div class="row">
                        <div class="p-4">
                            <x-BaseComponents.form.common.input type='file' name="mockups" :model="$model" cols="12" />
                            <x-BaseComponents.form.common.input type='number' name="order" min='0' :model="$model" cols="12" />
                            <x-BaseComponents.form.common.select_fixed name="is_active" :model="$model" label="Is Active" cols="12"
                    :options="[
                        '1' => 'Active',
                        '0' => 'Not Active',
                    ]" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('style')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />\
    <style>
        .customSuggestionsList > div{
            max-height: 100px;
            min-height: 20px;
            border: 2px solid pink;
            overflow: auto;
        }

        .customSuggestionsList .empty{
            color: #999;
            font-size: 20px;
            text-align: center;
            padding: .8em;
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    {{-- <script>
        var input = document.querySelector('input[name=tags]'),
            // init Tagify script on the above inputs
            tagify = new Tagify(input, {
                whitelist: ["like", "share", "retweet"],
                dropdown: {
                    position: "manual",
                    maxItems: Infinity,
                    enabled: 0,
                    classname: "customSuggestionsList"
                },
                templates: {
                    dropdownItemNoMatch() {
                        return `<div class='empty'>Nothing Found</div>`;
                    }
                },
                enforceWhitelist: true
            })

        tagify.on("dropdown:show", onSuggestionsListUpdate)
            .on("dropdown:hide", onSuggestionsListHide)
            .on('dropdown:scroll', onDropdownScroll)

        renderSuggestionsList() // defined down below

        // ES2015 argument destructuring
        function onSuggestionsListUpdate({
            detail: suggestionsElm
        }) {
            console.log(suggestionsElm)
        }

        function onSuggestionsListHide() {
            console.log("hide dropdown")
        }

        function onDropdownScroll(e) {
            console.log(e.detail)
        }

        // https://developer.mozilla.org/en-US/docs/Web/API/Element/insertAdjacentElement
        function renderSuggestionsList() {
            tagify.dropdown.show() // load the list
            tagify.DOM.scope.parentNode.appendChild(tagify.DOM.dropdown)
        }
    </script> --}}
@endpush
