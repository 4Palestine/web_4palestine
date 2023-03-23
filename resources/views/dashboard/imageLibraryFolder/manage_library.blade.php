@extends('layouts.master')

@section('master')


<div class="row">
    <div id="radio-folders" class="form-check col-4 d-flex flex-column border-end mt-3">
        @foreach ($data['libraryFolders'] as $folder)
            <div id="_folder" data-folder_id="{{ $folder['id'] }}" data-route="{{ route('dashboard.imageLibraryFolder.manage-library') }}">
                <input class="form-check-input" type="radio" name="folder_attr_name" value="{{ 'folder_'.$folder['id'] }}" id="{{ 'folder_'.$folder['id'] }}">
                <label class="btn bg-light-primary text-primary text-start mb-2 d-flex align-items-center justify-content-between" for="{{ 'folder_'.$folder['id'] }}">
                    <div>
                        <i class="bi bi-folder-fill me-2 text-primary"></i>
                        <span class="text-secondary fw-bold">{{ $folder['name'] }}</span>
                    </div>
                    <span class="float-end badge bg-light-primary text-primary">12</span>
                </label>
            </div>
            {{-- @if (isset($folder->children))
                <div class="ms-4 d-flex flex-column">
                    @include('dashboard.imageLibraryFolder.recursive-loop-folders', [ 'folder_children' => $folder->children])
                </div>
            @endif --}}
        @endforeach

    </div>
    <div class="col-8">
        <div class="row">
            <div id="render_images">
                @include('dashboard.imageLibraryFolder.parts.render_images', ['images' => $data['images']])
            </div>
        </div>
    </div>
</div>


@endsection


@push('style')
    <style>
        #radio-folders label {
            border: 3px solid transparent !important;
            width: 250px !important
        }
        #radio-folders label:hover {
            background-color: #315dfa45 !important;
        }
        #radio-folders input:checked + label {
            background-color: #315dfa45 !important;
            border: 3px solid #315dfa9a !important;
        }

        .img-holder .image-label .image-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100px;
        }
    </style>
@endpush



@push('script')
<script>
    $(document).ready(function() {
        $('#radio-folders input[type=radio]').hide();
    });
</script>

<script>
    (function($) {

        "use strict";

        $('#_folder').on('click', function() {
            var route = $(this).data('route');
            var folder_id = $(this).data('folder_id');
            $.ajax({
                type: "GET",
                url: route,
                data: {
                    "folder_id": folder_id
                },
                datatype: "json",
                success: function(response) {
                    // console.log('render_images', response);
                    $("#render_images").html(response.html);
                },
                error: function(error) {
                },
            });
        })
    })(jQuery);
</script>
@endpush
