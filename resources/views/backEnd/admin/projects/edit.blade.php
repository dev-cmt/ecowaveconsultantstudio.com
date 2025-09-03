@extends('backEnd.admin.layout.master')
@section('title')
    Edit Project
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backEnd/plugins/summernote/summernote-lite.min.css') }}">
    <style>
        .image-container {position:relative;border:1px solid transparent;overflow:hidden;transition:0.3s;cursor:pointer;}
        .default-image {border-color:#845adf;box-shadow:0 0 15px #845adf8c;}
        .image-container:hover {transform:translateY(-5px);box-shadow:0 10px 20px rgba(0,0,0,0.1);}
        .img-thumbnail {width:100%;aspect-ratio:1/1;object-fit:cover;transition:0.3s;}
        .default-badge {position:absolute;top:10px;right:10px;background:#0d6efd;color:#fff;padding:3px 7px;border-radius:3px;font-size:10px;font-weight:bold;display:none;}
        .image-container.new .default-badge {display:block;background:#28a745;}
        .default-image .default-badge {display:block;}
        .form-check-input[type="radio"] {display:none;}
    </style>
@endpush
@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Edit Project</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-8">
                <!-- Basic Details -->
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Basic Information</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" 
                                       value="{{ old('title', $project->title) }}" required>
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control summernote" rows="5">{!! old('description', $project->description) !!}</textarea>
                                @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Info -->
                <div class="card custom-card mt-3">
                    <div class="card-header">
                        <div class="card-title">Project Information</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="client_name" class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" 
                                       value="{{ old('client_name', $project->client_name) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" 
                                       value="{{ old('location', $project->location) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="area_size" class="form-label">Area Size (sq ft)</label>
                                <input type="text" class="form-control" id="area_size" name="area_size" 
                                       value="{{ old('area_size', $project->area_size) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="build_year" class="form-label">Build Year</label>
                                <input type="number" class="form-control" id="build_year" name="build_year" 
                                       value="{{ old('build_year', $project->build_year) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" 
                                       value="{{ old('price', $project->price) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="architect" class="form-label">Architect</label>
                                <input type="text" class="form-control" id="architect" name="architect" 
                                       value="{{ old('architect', $project->architect) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO -->
                <div class="card custom-card mt-3">
                    <div class="card-header">
                        <div class="card-title">SEO Information</div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" 
                                   value="{{ old('meta_title', $project->meta_title) }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" 
                                       value="{{ old('meta_keywords', $project->meta_keywords) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="meta_image" class="form-label">Meta Image</label>
                                <input type="file" class="form-control" id="meta_image" name="meta_image" accept="image/*">
                                @if($project->meta_image)
                                    <img src="{{ asset($project->meta_image) }}" class="img-thumbnail mt-2" width="120">
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $project->meta_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Media -->
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Media</div>
                    </div>
                    <div class="card-body">
                        <label for="images" class="form-label">Project Images</label>
                        <div class="row mt-2" id="images-container">
                            <!-- Existing images -->
                            @foreach($project->media as $media)
                                <div class="col-md-3 col-sm-4 col-6 mb-3 text-center image-wrapper">
                                    <div class="image-container {{ $media->is_default ? 'default-image' : '' }}">
                                        <img src="{{ asset($media->file_path) }}" class="img-thumbnail">
                                        <div class="default-badge">Default</div>
                                        <input type="radio" name="is_default" value="{{ $media->id }}" {{ $media->is_default ? 'checked' : '' }}>
                                        <button type="button" class="delete-image btn btn-danger-transparent rounded-0 p-0 mt-1" data-id="{{ $media->id }}" style="width:100%;height:22px"><i class="ri-close-line"></i></button>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Add New Image -->
                            <div class="col-md-3 col-sm-4 col-6 mb-3">
                                <label for="images" class="image-container d-flex flex-column align-items-center justify-content-center position-relative" style="cursor:pointer; min-height:100%; border:2px dashed #ced4da;">
                                    <i class="ri-add-line text-secondary fs-3"></i>
                                    <span class="text-secondary fs-6 p-2">Add Image</span>
                                    <span class="selected-count position-absolute top-0 end-0 p-1 text-primary fs-7"></span>
                                    <input type="file" id="images" name="media[]" multiple accept="image/*" class="d-none">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="card custom-card mt-3">
                    <div class="card-header">
                        <div class="card-title">Settings</div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1" {{ old('status', $project->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $project->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="card custom-card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100">Update Project</button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('backEnd/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({ height: 150 });
        });
    </script>

    <script>
        $(function(){
            const $container = $('#images-container');
            const setDefault = $el => {
                $container.find('.image-container').removeClass('default-image');
                $el.addClass('default-image').find('input[type="radio"]').prop('checked', true);
            };

            $container.on('click', '.image-container', e => {
                if($(e.target).closest('.delete-image, .remove-new').length) return;
                setDefault($(e.currentTarget));
            });

            $('#images').on('change', function(){
                const files = Array.from(this.files);
                $(this).closest('.image-container').find('.selected-count').text(files.length ? files.length+' file'+(files.length>1?'s':'') : '');

                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = e => {
                        const $div = $(`
                            <div class="col-md-3 col-sm-4 col-6 mb-3 text-center image-wrapper">
                                <div class="image-container new">
                                    <img src="${e.target.result}" class="img-thumbnail">
                                    <div class="default-badge">New</div>
                                    <input type="radio" name="is_default" class="form-check-input" value="new_${Date.now()}">
                                    <button type="button" class="remove-new btn btn-danger-transparent rounded-0 p-0 mt-1" style="width:100%;height:22px"><i class="ri-close-line"></i></button>
                                </div>
                            </div>
                        `).insertBefore($container.children().last());

                        $div.find('.remove-new').on('click', () => $div.remove());
                    };
                    reader.readAsDataURL(file);
                });
            });

            // Delete existing image (AJAX)
            $container.on('click', '.delete-image', function(){
                const id = $(this).data('id');
                const $wrapper = $(this).closest('.image-wrapper');
                if(confirm('Are you sure you want to delete this image?')) {
                    $.ajax({
                        url: '{{ route("admin.projects.deleteMedia") }}',
                        type: 'POST',
                        data: {_token: '{{ csrf_token() }}', id},
                        success: res => $wrapper.remove(),
                        error: () => alert('Failed to delete image.')
                    });
                }
            });
        });
    </script>
@endpush
