<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\Student;
use App\Traits\MultiToaster;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use MultiToaster;

    public function index()
    {
        $courses = Course::orderBy('updated_at', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.course.list', compact('courses'));
    }

    public function addStudent(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:20',
            'duration' => 'nullable|string',
        ]);

        Course::create($validatedData);
        $this->successMessage('Course added successfully!');
        return redirect()->route('frontend.course-list');
    }

    public function edit(Request $request)
    {
        $course = Course::findOrFail($request['id']);
        return view('frontend.course.edit', compact('course'));
    }

    public function update(Request $request)
    {
        $course = Course::findOrFail($request['id']);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:20',
            'duration' => 'nullable|string',
        ]);

        $course->update($validatedData);

        $this->successMessage('Course updated successfully!');
        return redirect()->route('frontend.course-list');
    }

    public function destroy(Request $request)
    {
        if ($request['id']) {
            $course = Course::findOrFail($request['id']);
            $course->delete();
            $this->successMessage('Course delete successfully!');
            return redirect()->route('frontend.course-list');
        }

        $this->errorMessage('Invalid Action!');
        return redirect()->route('frontend.course-list');
    }

    public function viewCourse(Request $request)
    {
        $course = Course::findOrFail($request['id']);
        $ids = CourseEnrollment::get()?->pluck('student_id')?->toArray() ?? [];
        $students = Student::whereNotIn('id', $ids)->orderBy('updated_at', 'desc')->orderBy('id', 'desc')->paginate(10);
        $courseStudents = CourseEnrollment::with(['student'])->orderBy('updated_at', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.course.view', compact('course', 'students', 'courseStudents'));
    }

    public function courseAssign(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|string|max:255',
            'student_id' => 'required|string|max:20',
        ]);

        CourseEnrollment::create($validatedData);
        $this->successMessage('Course assign successfully!');
        return back();
    }
}
