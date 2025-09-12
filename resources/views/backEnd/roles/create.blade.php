@extends('backEnd.admin.layout.master')
@section('title', 'Create Role')

@section('content')
<div class="page-header-breadcrumb my-4 d-md-flex d-block align-items-center justify-content-between">
    <h1 class="page-title fw-semibold fs-18 mb-0">Create Role</h1>
    <div>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card custom-card">
            <div class="card-body">
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Role Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Permissions</label>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="perm{{ $permission->id }}">
                                        <label class="form-check-label" for="perm{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('permissions')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
