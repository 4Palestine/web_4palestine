@forelse ($images as $image)
    <div class="col-3 img-holder mt-3 mb-4" id="image_holder_{{ $image->id }}">
        <div>
            <img src="{{ image_url($image->image_path) }}" class="w-100 h-100 rounded" alt="">
        </div>
        <div class="image-label d-flex justify-content-between align-items-center pe-1">
            <span class="image-name">{{ $image->image_name }}</span>
            <span><span style="cursor: pointer;" class="delete_image" data-route="{{ route('dashboard.imageLibraryFolder.manage-library.destroy', $image->id) }}" data-image_id="{{ $image->id }}" ><img
                        src="https://freesvg.org/img/trash.png" width="14px" alt="delete"></span></span>
        </div>
    </div>
@empty
<div class="text-secondary fw-bold pt-3 text-center">
    <img class="w-50 h-50" style="opacity: .6"
    src="{{ asset('admin/assets/images/no-data-1.svg') }}" alt="">
    <div class="my-3 fw-normal">There is no images in this folder, yet !!</div>
</div>
@endforelse
<meta name="csrf-token" content="{{ csrf_token() }}">


<script>
    (function($) {

        "use strict";

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
