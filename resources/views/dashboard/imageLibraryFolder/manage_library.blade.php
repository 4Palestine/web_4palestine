@extends('layouts.master')

@section('master')
    <div class="row">
        <div id="radio-folders" class="form-check col-4 d-flex flex-column border-end mt-3">
            @foreach ($data['libraryFolders'] as $folder)
                <div>
                    <input class="form-check-input" type="radio" name="folder_attr_name" value="{{ 'folder_' . $folder['id'] }}"
                        id="{{ 'folder_' . $folder['id'] }}">
                    <label
                        data-folder_id="{{ $folder['id'] }}"
                        data-route="{{ route('dashboard.imageLibraryFolder.manage-library') }}"
                        class="_folder btn bg-light-primary text-primary text-start mb-2 d-flex align-items-center justify-content-between"
                        for="{{ 'folder_' . $folder['id'] }}">
                        <div>
                            <i class="bi bi-folder-fill me-2 text-primary"></i>
                            <span class="text-secondary fw-bold">{{ $folder['name'] }}</span>
                        </div>
                        <span class="float-end badge bg-light-primary text-primary">{{ $folder->children_count }} - {{ $folder->folder_images_count }}</span>
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
            <div id="render_images" class="row">
                @include('dashboard.imageLibraryFolder.parts.render_images', ['images' => $data['images']])
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

        #radio-folders input:checked+label {
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


            // get the images when click on one of folders
            $('._folder').on('click', function() {
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
                    error: function(error) {},
                });
            })



        // delete image
        $(".delete_image").click(function() {
            var id = $(this).data("image_id");
            var token = $("meta[name='csrf-token']").attr("content");
            var route = $(this).data("route");
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function() {
                    $('#image_holder_'.id).remove();
                    // $('#image_holder_'.id).hide();
                }
            });
        });




        })(jQuery);
    </script>
@endpush
