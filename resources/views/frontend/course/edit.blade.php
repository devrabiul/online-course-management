@extends('frontend.layouts.master')

@section('title', 'Update Course')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between gap-2">
                        <h6 class="m-0">Update Student</h6>
                        <a href="{{ route('frontend.student-list') }}">
                            <span class="pe-1"><i class="fa-solid fa-caret-left"></i></span>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('frontend.student-update') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-4 col-lg-3">
                                <label for="name" class="form-label">
                                    Name
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="hidden" name="id" value="{{ $student?->id }}">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $student?->name }}"
                                    placeholder="Enter student's name" required>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="email" class="form-label">
                                    Email
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $student?->email }}"
                                    placeholder="Enter student's email" required>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="phone" class="form-label">
                                    Phone
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student?->phone }}"
                                    placeholder="Enter student's phone number" required>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $student?->address }}"
                                    placeholder="Enter student's address">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <span class="pe-1"><i class="fa-regular fa-floppy-disk"></i></span>
                                    Update
                                </button>
                                <button type="reset" class="btn btn-sm btn-outline-danger">
                                    <span class="pe-1"><i class="fa-solid fa-rotate-left"></i></span>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
