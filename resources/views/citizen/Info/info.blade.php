@extends('citizen.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Personal Information</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
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
</script>
    <div class="container-fluid ">
        <div class="card">
            <div class="card-body">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">Full Name</th>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->full_name }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">Citizenship No</th>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->citizenship_no }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">Issue Date</th>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->citizenship_issue_date }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">Contact No</th>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->contact_no }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
