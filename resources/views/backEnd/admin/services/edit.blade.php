@extends('backEnd.admin.layout.master')
@section('title')
    Edit Service: {{ $service->title }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backEnd/plugins/summernote/summernote-lite.min.css') }}">
    <style>
        .image-container {position:relative;border:1px solid transparent;overflow:hidden;transition:0.3s;cursor:pointer;}
        .default-image {border-color:#845adf;box-shadow:0 0 15px #845adf8c;}
        .image-container:hover {transform:translateY(-5px);box-shadow:0 10px 20px rgba(0,0,0,0.1);}
        .img-thumbnail {width:100%;aspect-ratio:1/1;object-fit:cover;transition:0.3s;}
        .default-badge {position:absolute;top:10px;right:10px;background:#0d6efd;color:#fff;padding:3px 7px;border-radius:3px;font-size:10px;font-weight:bold;}
        .image-container.new .default-badge {background:#28a745;}
        .form-check-input[type="radio"] {display:none;}
        .existing-image {position: relative;}
        .delete-existing {position: absolute; bottom: 0; left: 0; right: 0; background: rgba(220,53,69,0.9); color: white; text-align: center; padding: 3px; display: none;}
        .existing-image:hover .delete-existing {display: block;}
    </style>
@endpush
@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Edit Service: {{ $service->title }}</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-8">
                <!-- Basic Information -->
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Basic Information</div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Service Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $service->title) }}" required>
                            @error('title')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $service->slug) }}">
                            @error('slug')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control summernote" rows="5">{!! old('description', $service->description) !!}</textarea>
                            @error('description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
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
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $service->seo->meta_title ?? '') }}">
                            @error('meta_title')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $service->seo->meta_description ?? '') }}</textarea>
                            @error('meta_description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $service->seo->meta_keywords ?? '') }}" placeholder="Separate keywords with commas">
                            @error('meta_keywords')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_image" class="form-label">Meta Image</label>
                            <input type="file" class="form-control" id="meta_image" name="meta_image" accept="image/*">
                            @if(!empty($service->seo->og_image))
                                <div class="mt-2">
                                    <img src="{{ asset($service->seo->og_image) }}" alt="Meta Image" class="img-thumbnail" style="max-height: 60px; width:auto">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remove_meta_image" id="remove_meta_image" value="1">
                                        <label class="form-check-label" for="remove_meta_image">
                                            Remove meta image
                                        </label>
                                    </div>
                                </div>
                            @endif
                            @error('meta_image')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
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

                        <!-- Existing Images -->
                        <label class="form-label">Service Images</label>
                        <div class="row mt-2" id="images-container">
                            @foreach($service->media as $media)
                                <div class="col-md-3 col-sm-4 col-6 mb-3 text-center existing-image">
                                    <div class="image-container {{ $media->is_default ? 'default-image' : '' }}">
                                        <img src="{{ asset($media->file_path) }}" class="img-thumbnail">
                                        <div class="default-badge">Existing</div>
                                        <input type="radio" name="is_default" class="form-check-input" value="{{ $media->id }}" {{ $media->is_default ? 'checked' : '' }}>
                                        <div class="delete-existing">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="delete_media[]" value="{{ $media->id }}" id="delete_media_{{ $media->id }}">
                                                <label class="form-check-label" for="delete_media_{{ $media->id }}">Delete</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Add New Image Card -->
                            <div class="col-md-3 col-sm-4 col-6 mb-3">
                                <label for="images" class="image-container d-flex flex-column align-items-center justify-content-center position-relative" style="cursor:pointer; min-height:100%; border:2px dashed #ced4da;">
                                    <i class="ri-add-line text-secondary fs-3"></i>
                                    <span class="text-secondary fs-6 p-2">Add Image</span>
                                    <span class="selected-count position-absolute top-0 end-0 p-1 text-primary fs-7"></span>
                                    <input type="file" id="images" name="media[]" multiple accept="image/*" class="d-none">
                                </label>
                            </div>
                        </div>

                        <!-- Attachments -->
                        <div class="mb-3">
                            <label class="form-label">Attachments</label>
                            <div id="attachments-list">
                                @foreach($service->attachments as $attachment)
                                    <div class="d-flex align-items-center justify-content-center gap-2 py-1 attachment-row">
                                        <input type="text" name="existing_attachment_names[{{ $attachment->id }}]" 
                                            class="form-control" 
                                            value="{{ $attachment->name }}" 
                                            placeholder="Attachment name">

                                        <div class="form-text">
                                            <a href="{{ asset($attachment->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>

                                        <!-- Direct file input styled as button -->
                                        <label class="btn btn-sm btn-outline-primary mb-0">
                                            <i class="ri-upload-cloud-line"></i>
                                            <input type="file" name="existing_attachment_files[{{ $attachment->id }}]" class="d-none" accept=".pdf,.doc,.docx,.jpg,.png">
                                        </label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="delete_attachments[]" value="{{ $attachment->id }}" id="delete_attachment_{{ $attachment->id }}">
                                            <label class="form-check-label" for="delete_attachment_{{ $attachment->id }}">Delete</label>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                            <button type="button" class="btn btn-sm btn-primary mt-2" id="add-attachment">
                                <i class="ri-add-line me-1"></i> Add New Attachment
                            </button>
                        </div>

                        <!-- Template for attachment row (hidden) -->
                        <template id="attachment-template">
                            <div class="d-flex align-items-center gap-2 py-1">
                                <input type="text" name="new_attachment_names[]" class="form-control" placeholder="Attachment name">
                                <input type="file" name="new_attachment_files[]" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
                                <button type="button" class="btn btn-icon btn-sm btn-danger-light remove-attachment">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Features -->
                <div class="card custom-card mt-3">
                    <div class="card-header">
                        <div class="card-title">Features</div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Select Features</label>
                            <div class="d-flex flex-wrap gap-3">
                                @forelse($features as $feature)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="features[]" 
                                               value="{{ $feature->id }}" id="feature{{ $feature->id }}"
                                               {{ in_array($feature->id, $service->features->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="feature{{ $feature->id }}">
                                            {{ $feature->feature_name }}
                                        </label>
                                    </div>
                                @empty
                                    <p class="text-muted">No features available. <a href="{{ route('admin.features.index') }}">Create one first</a>.</p>
                                @endforelse
                            </div>
                            @error('features')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
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
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}">
                            @error('sort_order')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Actions -->
                <div class="card custom-card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100">Update Service</button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
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
            $('.summernote').summernote({
                height: 150,
            });
            
            // Generate slug from title
            $('#title').on('keyup', function() {
                const title = $(this).val();
                if (title) {
                    $('#slug').val(title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, ''));
                }
            });
        });
    </script>

    <script>
        $(function(){
            const $container = $('#images-container');
            
            // Set Default
            const setDefault = $el => {
                $container.find('.image-container').removeClass('default-image');
                $el.addClass('default-image').find('input[type="radio"]').prop('checked', true);
            };

            // Click images
            $container.on('click', '.image-container', e => {
                if($(e.target).closest('.delete-image, .remove-new, .form-check-input').length) return;
                setDefault($(e.currentTarget));
            });

            // Add new images
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

                        // Remove new image
                        $div.find('.remove-new').on('click', () => $div.remove());
                    };
                    reader.readAsDataURL(file);
                });
            });
        });
    </script>

    <script>
        // Add attachment functionality
        $(function(){
            $('#add-attachment').on('click', function(){
                const $row = $($('#attachment-template').html());
                $('#attachments-list').append($row);

                // Remove row
                $row.find('.remove-attachment').on('click', function(){
                    $row.remove();
                });
            });
        });
    </script>
@endpush