@extends('frontend.layouts.master')

@section('title', 'Online Course List')

@section('content')
<div class="container">

    <div>
        <div class="row g-2 align-items-center py-3 min-height-70vh flex-column-reverse flex-md-row header-section">
            <div class="col-md-6">
                <div class="header-text">
                    <span class="welcome">
                        Welcome to...
                    </span>
                    <h1 class="title">
                        Online Course Management System
                    </h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <img src="{{ getDynamicAsset('assets/img/boy-reading.png') }}" alt="boy-reading" class="header-image" />
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center g-2">
        @if (count($courses) > 0)

            <div class="col-12">
                <h3 class="text-center">Online Course List</h3>
                <p class="text-center">Manage and explore courses effortlessly.</p>
            </div>

            @foreach($courses as $course)
                <div class="col-md-4 col-lg-3">
                    <div class="card course-card">
                        <div class="card-body">
                            <div class="card-image-box">
                                {{ $course?->title }}
                            </div>
                            <h6 class="card-title line-limit-1">
                                {{ $course?->title }}
                            </h6>
                            <p class="card-text line-limit-2">
                                {{ Str::limit($course->description, 20, '...') }}
                            </p>
                            <a href="{{ route('frontend.course-view', ['id' => $course->id]) }}" class="btn btn-sm btn-outline-primary">
                                <span class="pe-1"><i class="fa-solid fa-book"></i></span>
                                Enroll List
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="d-flex justify-content-center py-4">
                {!! $courses->links() !!}
            </div>

        @endif
    </div>
</div>
@endsection
