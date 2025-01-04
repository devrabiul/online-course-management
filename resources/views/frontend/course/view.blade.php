@extends('frontend.layouts.master')

@section('title', 'Update Course')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between gap-2">
                        <h6 class="m-0">Assign Course</h6>
                        <a href="{{ route('frontend.course-list') }}">
                            <span class="pe-1"><i class="fa-solid fa-caret-left"></i></span>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('frontend.course-assign') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-12">
                                <strong>Title</strong>
                                <h6>{{ $course?->title }}</h6>
                                <div>
                                    <p>{{ $course?->description }}</p>
                                </div>
                                <input type="hidden" name="course_id" value="{{ $course?->id }}">
                            </div>

                            <div class="col-md-12">
                                <label for="student_id" class="form-label">
                                    Student
                                    <span class="required-icon">*</span>
                                </label>
                                <select class="form-select" name="student_id" required id="student_id">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <span class="pe-1"><i class="fa-regular fa-floppy-disk"></i></span>
                                    Assign
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Assign List</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered m-0">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Student</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courseStudents as $courseStudent)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $courseStudent->student->name }}</td>
                                <td>
                                    <a href="{{ route('frontend.course-assign-delete', ['id' => $course->id]) }}" class="btn btn-danger btn-sm">
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
                        {!! $courseStudents->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
