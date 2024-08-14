@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('cssfile/record.css') }}">
    <div class="citizen-container" style="margin-top: 1px; padding: 10px; background-color: #f8f9fa;">

        <div class="head"><h3>Edit Citizen Details</h3></div>
        

        <form class="editform" action="{{ route('update_citizen', $citizen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="full_name">Name:</label>
                <input type="text" id="full_name" name="full_name" value="{{ $citizen->np_first_name }}" class="form-control">
                @error('full_name')
                <div>{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="citizenship_no">Citizenship No:</label>
                <input type="text" id="citizenship_no" name="citizenship_no" value="{{ $citizen->citizenship_number }}" class="form-control">
                @error('citizenship_no"')
                <div>{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="citizenship_issue_date">Issue Date:</label>
                <input type="date" id="citizenship_issue_date" name="citizenship_issue_date" value="{{ $citizen->issued_date_ad }}" class="form-control">
                @error('citizenship_issue_date')
                <div>{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="contact_no">Contact No:</label>
                <input type="text" id="contact_no" name="contact_no" value="{{ $citizen->mobile_number }}" class="form-control">
                @error('mobile_no')
                <div>{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $citizen->email_address }}" class="form-control">
                @error('error')
                <div>{{ $message }}</div>
            @enderror
            </div>

            <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>   
        </form>
        <div class="back">
            <a href="{{ route('admin.record') }}"><button class="btn btn-primary btn-sm mt-2">Back</button></a>      
        </div>
        
    </div>
@endsection
