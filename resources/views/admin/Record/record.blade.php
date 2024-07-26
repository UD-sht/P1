@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('cssfile/record.css') }}">

<section class="content container-fluid">
    @if(session('success'))
        <div class="alert alert-success" role="alert" id="success">
            {{ session('success') }}
        </div>
    @endif

    <script>
        // Hide the success message after 2 seconds (2000 milliseconds)
        setTimeout(function () {
            var successAlert = document.getElementById('success');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 2000);
    </script>

    <div class="import_export_container border-bottom mb-1 pb-1">
        <form action="{{ route('importexceldata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row align-items-center">
                <div class="col-12 col-sm-auto mb-1">
                    <label class="sr-only" for="import_file">Choose file</label>
                    <input type="file" id="import_file" name="import_file" required
                        class="form-control-file form-control-sm">
                </div>
                <div class="col-12 col-sm-auto mb-1">
                    <button type="submit" class="btn btn-primary btn-sm mb-1">Import</button>
                </div>
                <div class="col-12 col-sm-auto mb-1">
                    <a href="{{ route('exportexceldata') }}" class="btn btn-secondary btn-sm mb-1">Export</a>
                </div>
                <div class="col-12 col-sm-auto ml-auto text-sm-right"> <!-- Shifts content to the right on small screens -->
            <div class="sample-download">
                <h6 class="mb-0">Download Master Sample</h6>
                <a href="{{ route('downloadsamplefile') }}" class="btn btn-primary btn-sm mb-1">Download</a>
            </div>
        </div>
            </div>
        </form>
        
    </div>

    <div class="search-container mb-1">
        <h6>Filter Search:</h6>
        <form action="{{ route('admin.record') }}" method="GET" id="search-form" class="form-inline">
            @csrf
            <input type="hidden" name="api_token" value="NftPSzhR22T7c7oLtrLFV7O3O2jtfAqqdRiOIvw8">
            <div class="form-group mb-1 mr-2">
                <input type="text" value="{{ Request::get('citizenship_number') }}" id="citizenship_number"
                    name="citizenship_number" placeholder="Citizenship No" class="form-control form-control-sm">
            </div>
            <div class="form-group mb-1 mr-2">
                <input type="text" value="{{ Request::get('hhid') }}" id="hhid"
                    name="hhid" placeholder="hhid" class="form-control form-control-sm">
            </div>
            <div class="form-group mb-1 mr-2">
                <input type="date" value="{{ Request::get('issued_date_ad') }}" id="issued_date_ad"
                    name="issued_date_ad" class="form-control form-control-sm">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mb-1">Search</button>
            <button type="button" class="btn btn-secondary btn-sm mb-1 ml-2" id="reset-btn"
                onclick="window.location.href='{{ route('admin.record') }}'">Reset</button>
        </form>
    </div>

    <div class="record-container bg-light p-1 rounded">
        <h4 class="text-center mb-1">List of Records</h4>

        @if($citizens->isEmpty())
            <div class="text-center py-2">
                <p>No Records Found</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>

                            <th>HHID</th>

                            <th>First Name</th>
                            <th>Last name</th>
                            <th>Citizenship No</th>
                            <th>Issue Date</th>
                            <th>Contact No</th>

                            <th>Province</th>
                            <th>District</th>
                            <th>Municipality</th>
                            <th>Ward</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citizens as $citizen)
                            <tr>
                                <td>{{ $citizen->id }}</td>

                                <td>{{ $citizen->hhid }}</td>

                                <td>{{ $citizen->np_first_name }}</td>
                                <td>{{ $citizen->np_last_name }}</td>
                                <td>{{ $citizen->citizenship_number }}</td>
                                <td>{{ $citizen->issued_date_ad }}</td>
                                <td>{{ $citizen->mobile_number }}</td>

                                <td>{{ $citizen->province }}</td>
                                <td>{{ $citizen->district }}</td>
                                <td>{{ $citizen->municipality }}</td>
                                <td>{{ $citizen->ward }}</td>
                                <td class="text-center">
                                    <a href="{{ route('view_citizen', $citizen->id) }}" class="text-primary"><i
                                            class="fa-solid fa-eye"></i></a> |
                                    <a href="{{ route('show_editpage', $citizen->id) }}" class="text-success"><i
                                            class="fa-solid fa-pen-to-square"></i></a> |
                                    <form action="{{ route('delete_citizen', $citizen->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: none; border: none; color: red; cursor: pointer;"
                                            onclick="return confirm('Are you sure you want to delete this record?');"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $citizens->appends(request()->query())->onEachSide(1)->links() }}
            </div>
        @endif
    </div>


</section>
@endsection