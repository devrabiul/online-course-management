<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Traits\MultiToaster;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use MultiToaster;

    public function index()
    {
        $students = Course::orderBy('updated_at', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.course.list', compact('students'));
    }

    public function addStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Course::create($validatedData);
        $this->successMessage('Course added successfully!');
        return redirect()->route('frontend.course-list');
    }

    public function edit(Request $request)
    {
        $student = Course::findOrFail($request['id']);
        return view('frontend.course.edit', compact('course'));
    }

    public function update(Request $request)
    {
        $student = Course::findOrFail($request['id']);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $student->update($validatedData);

        $this->successMessage('Course updated successfully!');
        return redirect()->route('frontend.course-list');
    }

    public function destroy(Request $request)
    {
        if ($request['id']) {
            $student = Course::findOrFail($request['id']);
            $student->delete();
            $this->successMessage('Course delete successfully!');
            return redirect()->route('frontend.course-list');
        }

        $this->errorMessage('Invalid Action!');
        return redirect()->route('frontend.course-list');
    }
}
