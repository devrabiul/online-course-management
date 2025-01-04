<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('updated_at', 'desc')->orderBy('id', 'desc')->paginate(8);
        return view('frontend.index', compact('courses'));
    }
}
