@foreach ($images as $image)
<div class="col-3 img-holder mt-3">
    <img src="{{ image_url($image->image_path) }}" class="w-100 rounded" alt="">
    <div class="image-label d-flex justify-content-between align-items-center pe-1">
        <span class="image-name">{{ $image->image_name }}</span>
        <span><a href="#" id=""><img src="https://freesvg.org/img/trash.png" width="14px" alt="delete"></a></span>
    </div>
</div>
@endforeach

