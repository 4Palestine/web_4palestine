@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('dashboard.mission.update', $model['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('dashboard.mission._form_mission', [
                        'form_title' => 'Edit mission'
                    ])

                </form>
            </div>
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
    <script>
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
    </script>
@endpush
