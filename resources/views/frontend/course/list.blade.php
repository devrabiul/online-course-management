@extends('frontend.layouts.master')

@section('title', 'Course List')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Add/Edit Course</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('frontend.course-add') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-6 col-lg-6">
                                <label for="title" class="form-label">
                                    Title
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter course title" required>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label for="duration" class="form-label">
                                    Duration
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="text" class="form-control" id="duration" name="duration"
                                    placeholder="Enter course duration">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">
                                    Description
                                    <span class="required-icon">*</span>
                                </label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter course description" required></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <span class="pe-1"><i class="fa-regular fa-floppy-disk"></i></span>
                                    Save
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Course List</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $key => $course)
                            <tr>
                                <td class="text-center">{{ $courses->firstitem() + $key }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ Str::limit($course->description, 20, '...') }}</td>
                                <td>{{ $course->duration }}</td>
                                <td class="text-center">
                                    <a href="{{ route('frontend.course-view', ['id' => $course->id]) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>

                                    <a href="{{ route('frontend.course-edit', ['id' => $course->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <a href="{{ route('frontend.course-delete', ['id' => $course->id]) }}" class="btn btn-danger btn-sm">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">No students found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center py-2">
                        {!! $courses->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
