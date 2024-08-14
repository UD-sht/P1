@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('cssfile/record.css') }}">
<section class="record-view-container">
        <div class="citizen-container" style="margin-top: 50px; padding: 20px; background-color: #f8f9fa;">

        <div class="head"><h3>Citizen Details</h3></div>

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->np_first_name }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Citizenship No</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->citizenship_number }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Issue Date</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->issued_date_ad }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Contact No</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->mobile_number }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $citizen->email_address }}</td>
            </tr>
            
        </table>
        <div class="back mt-3">
                <a href="{{ route('admin.record') }}"><button class="btn btn-primary btn mt-2">Back</button></a>          
        </div>
    </div>
</section>

@endsection
