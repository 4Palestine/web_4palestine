@foreach ($folder_children as $sub_folder)
    <input class="form-check-input" type="radio" name="folder_attr_name" value="folder_2_2" id="folder_2_2" checked>
    <label class="btn bg-light-primary text-primary text-start mb-2 d-flex align-items-center justify-content-between"
        for="folder_2_2">
        <div>
            <i class="bi bi-folder-fill me-2 text-primary"></i>
            <span class="text-secondary fw-bold">{{ $sub_folder['name'] }}</span>
        </div>
        <span class="float-end badge bg-light-primary text-primary">12</span>
    </label>
@endforeach
