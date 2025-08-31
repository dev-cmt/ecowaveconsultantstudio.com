@extends('backEnd.admin.layout.master')
@section('title')
    Applications
@endsection
@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Application</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Application</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="alert alert-success d-none" id="successMsg"></div>
    <!-- Page Header Close -->
    <div class="card custom-card">
        <div class="card-header d-block">
            <div class="row">
                <div class="col-md-8 col-12 mb-2">
                    <form action="{{ route('admin.application.bulk.export') }}" method="POST" id="export_form">
                        @csrf
                        <input type="hidden" name="id" id="export_application" value="">
                        <button type="button" class="btn btn-success btn-sm me-1" id="export_button">Excel Export</button>
                        <button type="button" class="btn btn-danger btn-sm" id="bulk_delete_button">Bulk Delete</button>
                    </form>
                </div>
                <div class="col-md-4 col-12">
                    <form action="{{ route('admin.application.index') }}"
                          class="d-flex flex-md-row flex-column align-items-end justify-content-end">
                        <div class="d-flex w-100">
                            <input type="text" class="form-control form-control-sm small-search mb-md-0 mb-1 me-md-1"
                                   name="query" aria-label="Search..." placeholder="Type Here..."
                                   value="{{ request()->query('query') }}">
                            <div class="mb-md-0 mb-1 d-flex ms-2">
                                <button class="btn btn-info btn-sm me-1" type="submit">Search</button>
                                <a href="{{ route('admin.application.index') }}" class="btn btn-dark btn-sm"><i
                                        class="ti ti-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body pt-2">
            <div class="row justify-content-end mb-2">
                <div class="col-1">
                    <form action="" method="get" id="paginate_form">
                        <input type="hidden" name="query" value="{{request()->query('query')??null}}">
                        <div class="form-group">
                            <select name="paginate" id="paginate" class="form-select form-select-sm">
                                <option value="20" {{request()->input('paginate') == 20 ?"selected":""}}>20</option>
                                <option value="50" {{request()->input('paginate') == 50 ?"selected":""}}>50</option>
                                <option value="100" {{request()->input('paginate') == 100 ?"selected":""}}>100</option>
                                <option value="200" {{request()->input('paginate') == 200 ?"selected":""}}>200</option>
                                <option value="500" {{request()->input('paginate') == 500 ?"selected":""}}>500</option>
                                <option value="1000" {{request()->input('paginate') == 1000 ?"selected":""}}>1000</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-nowrap table-bordered" id="my_table">
                    <thead>
                    <tr>
                        <th class="w-1">
                            <input class="form-check-input m-0 align-middle" type="checkbox" id="all_chk">
                        </th>
                        <th scope="col" width="1%">SL.</th>
                        <th scope="col">Personal Info.</th>
                        <th scope="col">Address</th>
                        <th scope="col">ID Type</th>
                        <th scope="col">ID Images</th>
                        <th scope="col">Selfies</th>
                        <th scope="col" class=" text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($applications->count() > 0)
                        @php($i = 1)
                        @foreach ($applications as $key => $item)
                            <tr>
                                <td width="1%" class="align-top text-center">
                                    <input class="form-check-input m-0 align-middle sub_chk" type="checkbox"
                                           id="sub_chk{{ $item->id }}" data-id="{{ $item->id }}">
                                </td>
                                <td width="1%" class="align-top text-center">
                                    {{ $i++ }}<br>
                                    @if ($item->is_mail_send == 1)
                                        <span class="ti ti-inbox text-success fs-18"></span>
                                        <br>
                                    @elseif($item->mail_error_log != null)
                                        <span class="ti ti-inbox text-danger fs-18" data-bs-toggle="tooltip"
                                              data-bs-title="{{ $item->mail_error_log }}"></span>
                                        <br>
                                    @endif

                                    @if ($item->is_exported == 1)
                                        <span class="ti ti-check text-success fs-18"></span>
                                    @endif
                                </td>
                                <td class="text-wrap align-top">
                                    <strong>First Name: </strong> {{ $item->first_name }} <br>
                                    <strong>Last Name: </strong> {{ $item->last_name }} <br>
                                    <strong>Email: </strong> {{ $item->email }} <br>
                                    <strong>Phone: </strong> {{ $item->phone }}<br>
                                    <strong>SSN:</strong> {{ $item->social_security_num }} <br>
                                    <strong>Birthday:</strong> {{ date('d-M-Y', strtotime($item->birthday)) }}
                                </td>
                                <td class="text-wrap align-top">
                                    <strong>Address One:</strong> {{ $item->address_one }} <br>
                                    <strong>Address Two:</strong> {{ $item->address_two }} <br>
                                    <strong>City:</strong> {{ $item->city }} <br>
                                    <strong>State:</strong> {{ $item->state }} <br>
                                    <strong>Zip:</strong> {{ $item->zip }}
                                </td>
                                <td class="text-wrap align-top">
                                    @if ($item->id_type == 1)
                                        ID Card
                                    @elseif ($item->id_type == 2)
                                        Passport
                                    @else
                                        Driver's License
                                    @endif
                                </td>
                                <td class="text-wrap align-top">
                                    Front <br>
                                    @if ($item->id_front_image)
                                        <a
                                            href="{{ route('admin.application.image.download', [$item->id, 'type' => 'id_front_image']) }}">
                                            <img src="{{ asset($item->id_front_image) }}"
                                                 alt="{{ $item->first_name }}" width="50px">
                                        </a>
                                    @endif
                                    <br>
                                    <br>
                                    Back
                                    <br>
                                    @if ($item->id_back_image)
                                        <a
                                            href="{{ route('admin.application.image.download', [$item->id, 'type' => 'id_back_image']) }}">
                                            <img src="{{ asset($item->id_back_image) }}" alt="{{ $item->first_name }}"
                                                 width="50px">
                                        </a>
                                    @endif
                                </td>
                                <td class="text-wrap align-top">
                                    With ID <br>
                                    @if ($item->face_selfie_with_id)
                                        <a
                                            href="{{ route('admin.application.image.download', [$item->id, 'type' => 'face_selfie_with_id']) }}">
                                            <img src="{{ asset($item->face_selfie_with_id) }}"
                                                 alt="{{ $item->first_name }}" width="50px">
                                        </a>
                                    @endif
                                    <br>
                                    <br>
                                    Selfie
                                    <br>
                                    @if ($item->face_selfie)
                                        <a
                                            href="{{ route('admin.application.image.download', [$item->id, 'type' => 'face_selfie']) }}">
                                            <img src="{{ asset($item->face_selfie) }}" alt="{{ $item->first_name }}"
                                                 width="50px">
                                        </a>
                                    @endif
                                </td>
                                <td class="w-1 align-top text-center">
                                    <a href="{{ route('admin.zip.image.download', $item->id) }}" onclick="return confirm('Are You Sure?')"
                                       class="btn btn-outline-info btn-sm mb-1"><i class="ti ti-file-zip"></i></a>
                                    <form action="{{ route('admin.application.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are You Sure?')"
                                                class="btn btn-outline-danger btn-sm"><i class="ti ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-danger text-center fw-bold">No Data Found !</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer border-top-0">
            {{ $applications->links('backEnd.admin.pagination.custom') }}
        </div>
    </div>
@endsection
@push('js')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        $(document).on('change', '#all_chk', function () {
            if ($(this).is(':checked')) {
                $('.sub_chk').prop('checked', true);
            } else {
                $('.sub_chk').prop('checked', false);
            }
        });

        $(document).on('click', '#export_button', function () {
            let ids = [];
            $('.sub_chk').each(function () {
                if ($(this).is(':checked')) {
                    ids.push($(this).data('id'));
                }
            });

            if ($.isEmptyObject(ids)) {
                alert('No application selected');
            } else {
                $('#export_application').val(ids);
                $('#export_form').submit();
            }
        });

        $(document).on('click', '#bulk_delete_button', function () {
            let ids = [];
            $('.sub_chk').each(function () {
                if ($(this).is(':checked')) {
                    ids.push($(this).data('id'));
                }
            });

            if ($.isEmptyObject(ids)) {
                alert('No application selected');
            } else {
                if (confirm('Are Your Sure To Assign?') == true) {
                    $.ajax({
                        url: '{{ route('admin.application.bulk.delete') }}',
                        type: 'POST',
                        data: {
                            _token: @json(csrf_token()),
                            ids: JSON.parse(JSON.stringify(ids)),
                        },
                        success: function (data) {
                            $("#my_table").load(location.href + ' #my_table>*', "");
                        }
                    });
                }

            }
        });

        //paginate
        $('#paginate').on('change', function () {
            $('#paginate_form').submit();
        });
    </script>
@endpush
