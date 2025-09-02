@extends('backEnd.admin.layout.master')
@section('title')
    Add New Service
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
        <h1 class="page-title fw-semibold fs-18 mb-0">Add New Service</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" disabled>
                            @error('slug')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control summernote" rows="5">{!! old('description') !!}</textarea>
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
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                            @error('meta_title')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="Separate keywords with commas">
                            @error('meta_keywords')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_image" class="form-label">Meta Image</label>
                            <input type="file" class="form-control" id="meta_image" name="meta_image" accept="image/*">
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

                        <!-- Add Image Card -->
                        <label for="images" class="form-label">Service Images</label>
                        <div class="row mt-2" id="images-container">
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
                            <div id="attachments-list"></div>
                            <button type="button" class="btn btn-sm btn-primary mt-2" id="add-attachment">
                                <i class="ri-add-line me-1"></i> Add Attachment
                            </button>
                        </div>

                        <!-- Template for attachment row (hidden) -->
                        <template id="attachment-template">
                            <div class="d-flex align-items-center gap-2 py-1">
                                <input type="text" name="attachment_names[]" class="form-control" placeholder="Attachment name">
                                <input type="file" name="attachment_files[]" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
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
                                        <input class="form-check-input" type="checkbox" name="features[]" value="{{ $feature->id }}" id="feature{{ $feature->id }}">
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
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                            @error('sort_order')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option>
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
                        <button type="submit" class="btn btn-primary w-100">Save Service</button>
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
                if($(e.target).closest('.delete-image, .remove-new').length) return;
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
                                <div class="image-container new ${$container.find('.image-wrapper').length===1?'default-image':''}">
                                    <img src="${e.target.result}" class="img-thumbnail">
                                    <div class="default-badge">New</div>
                                    <input type="radio" name="is_default" class="form-check-input" value="new_${Date.now()}" ${$container.find('.image-wrapper').length===1?'checked':''}>
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