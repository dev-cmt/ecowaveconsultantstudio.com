@extends('backEnd.admin.layout.master')
@section('title')
    Properties Management
@endsection

@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Services Management</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Services List
                    </div>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                        <i class="ri-add-line me-1 fw-semibold align-middle"></i>Add New Service
                    </a>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $key => $service)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if($service->image)
                                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" style="max-height: 50px; max-width: 80px;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ Str::limit($service->description, 50) }}</td>
                                    <td>{{ $service->sort_order }}</td>
                                    <td>
                                        <span class="badge bg-{{ $service->status == 'active' ? 'success' : 'danger' }}-transparent">
                                            {{ ucfirst($service->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <button type="button" class="btn btn-sm btn-warning-light btn-icon edit-service"
                                                data-id="{{ $service->id }}"
                                                data-title="{{ $service->title }}"
                                                data-description="{{ $service->description }}"
                                                data-icon="{{ $service->icon }}"
                                                data-sort_order="{{ $service->sort_order }}"
                                                data-status="{{ $service->status }}"
                                                data-meta_title="{{ $service->meta_title }}"
                                                data-meta_description="{{ $service->meta_description }}"
                                                data-image="{{ $service->image }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editServiceModal">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger-light btn-icon" onclick="return confirm('Are you sure you want to delete this service?')">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No services found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        $('.alert').alert('close');
    }, 5000);
</script>
@endsection
