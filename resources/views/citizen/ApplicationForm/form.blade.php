@extends('citizen.layouts.app')
@section('content')
<section class="content-header">
    <!-- <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div> -->
</section>

<section class="content">

@include('citizen.message')
<script>
        // Hide the success message after 2 seconds (2000 milliseconds)
        setTimeout(function () {
            var successAlert = document.getElementById('success');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 2000);
        setTimeout(function () {
            var DangerAlter = document.getElementById('error');
            if (DangerAlter) {
                DangerAlter.style.display = 'none';
            }
        }, 2000);
</script>

    <div class="container-fluid ">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('citizen.form.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="citizenship_no">Citizenship No</label>
                                <input type="text" name="citizenship_no" id="citizenship_no" class="form-control"
                                    placeholder="Citizenship No" value="{{ old('citizenship_no')}}" required>
                                    @error('citizenship_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="citizenship_issue_date">Citizenship Issue Date</label>
                                <input type="date" name="citizenship_issue_date" id="citizenship_issue_date"
                                    class="form-control" value="{{ old('citizenship_issue_date')}}" required>
                                    @error('citizenship_issue_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="f_name">First Name</label>
                                <input type="text" name="f_name" id="f_name" class="form-control"
                                    placeholder="First Name" value="{{ old('f_name')}}" required>
                                    @error('citizenship_issue_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="m_name">Middle Name</label>
                                <input type="text" name="m_name" id="m_name" class="form-control"
                                    placeholder="Middle Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="l_name">Last Name</label>
                                <input type="text" name="l_name" id="l_name" class="form-control"
                                    placeholder="Last Name" value="{{ old('l_name')}}"  required>
                                    @error('l_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control"
                                    placeholder="Full Name" value="{{ old('full_name')}}"  required>
                                    @error('full_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="t_province">Province</label>
                                <input type="text" name="t_province" id="t_province" class="form-control"
                                    placeholder="Province" value="{{ old('t_province')}}"  required>
                                    @error('t_province')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="t_district">District</label>
                                <input type="text" name="t_district" id="t_district" class="form-control"
                                    placeholder="District" value="{{ old('t_district')}}" required>
                                    @error('t_district')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="t_municipality">Municipality</label>
                                <input type="text" name="t_municipality" id="t_municipality" class="form-control"
                                    placeholder="Municipality" value="{{ old('t_municipality')}}">
                                    @error('t_municipality')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="t_ward_no">Ward No</label>
                                <input type="number" name="t_ward_no" id="t_ward_no" class="form-control"
                                    placeholder="Ward No" value="{{ old('t_ward_no')}}" required>
                                    @error('t_ward_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="t_tole">Tole</label>
                                <input type="text" name="t_tole" id="t_tole" class="form-control" placeholder="Tole">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="f_fname">Father's First Name</label>
                                <input type="text" name="f_fname" id="f_fname" class="form-control"
                                    placeholder="Father's First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="f_mname">Father's Middle Name</label>
                                <input type="text" name="f_mname" id="f_mname" class="form-control"
                                    placeholder="Father's Middle Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="l_fname">Father's Last Name</label>
                                <input type="text" name="l_fname" id="l_fname" class="form-control"
                                    placeholder="Father's Last Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="m_fname">Mother's First Name</label>
                                <input type="text" name="m_fname" id="m_fname" class="form-control"
                                    placeholder="Mother's First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="m_mname">Mother's Middle Name</label>
                                <input type="text" name="m_mname" id="m_mname" class="form-control"
                                    placeholder="Mother's Middle Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="l_mname">Mother's Last Name</label>
                                <input type="text" name="l_mname" id="l_mname" class="form-control"
                                    placeholder="Mother's Last Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="f_gname">Father's Grandfather's Name</label>
                                <input type="text" name="f_gname" id="f_gname" class="form-control"
                                    placeholder="Father's Grandfather's Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="m_gname">Mother's Grandfather's Name</label>
                                <input type="text" name="m_gname" id="m_gname" class="form-control"
                                    placeholder="Mother's Grandfather's Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="l_gname">Grandfather's Last Name</label>
                                <input type="text" name="l_gname" id="l_gname" class="form-control"
                                    placeholder="Grandfather's Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contact_no">Contact No</label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control"
                                    placeholder="Contact No" value="{{ old('contact_no')}}" required>
                                    @error('contact_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email')}}" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('citizen.dashboard') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>
@endsection