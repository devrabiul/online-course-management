@extends('frontend.layouts.master')

@section('title', 'Update Course')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between gap-2">
                        <h6 class="m-0">Update Course</h6>
                        <a href="{{ route('frontend.course-list') }}">
                            <span class="pe-1"><i class="fa-solid fa-caret-left"></i></span>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('frontend.course-update') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="title" class="form-label">
                                    Title
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="hidden" name="id" value="{{ $course?->id }}">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $course?->title }}"
                                    placeholder="Enter course title" required>
                            </div>

                            <div class="col-md-6">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration" value="{{ $course?->duration }}"
                                    placeholder="Enter duration">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">
                                    Description
                                    <span class="required-icon">*</span>
                                </label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter course description" required>{{ $course?->description }}</textarea>
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
