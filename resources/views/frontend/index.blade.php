@extends('frontend.layouts.master')

@section('title', 'Online Course List')

@section('content')
<div class="container">
    <h5>Online Course List</h5>

    <div class="row g-2">
        <div class="col-md-4 col-lg-3">
            <div class="card course-card">
                <div class="card-body">
                    <div class="card-image-box">
                        Card title
                    </div>
                    <h6 class="card-title line-limit-1">
                        Card title
                    </h6>
                    <p class="card-text line-limit-2">
                        Some quick example text to build on the card title and make up the
                        bulk of the card's content.
                    </p>
                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <span class="pe-1"><i class="fa-solid fa-book"></i></span>
                        Enroll List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
