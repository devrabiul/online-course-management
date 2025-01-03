@extends('frontend.layouts.master')

@section('title', 'Course List')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Add/Edit Student</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('frontend.student-add') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-4 col-lg-3">
                                <label for="name" class="form-label">
                                    Name
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter student's name" required>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="email" class="form-label">
                                    Email
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter student's email" required>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="phone" class="form-label">
                                    Phone
                                    <span class="required-icon">*</span>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter student's phone number" required>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter student's address">
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
                    <h6 class="m-0">Student List</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered m-0">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <a href="{{ route('frontend.student-edit', ['id' => $student->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <a href="{{ route('frontend.student-delete', ['id' => $student->id]) }}" class="btn btn-danger btn-sm">
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
                        {!! $students->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
