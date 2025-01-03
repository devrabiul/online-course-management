<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Traits\MultiToaster;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use MultiToaster;

    public function index()
    {
        $students = Student::orderBy('updated_at', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.student.list', compact('students'));
    }

    public function addStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Student::create($validatedData);
        $this->successMessage('Student added successfully!');
        return redirect()->route('frontend.student-list');
    }

    public function edit(Request $request)
    {
        $student = Student::findOrFail($request['id']);
        return view('frontend.student.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $student = Student::findOrFail($request['id']);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $student->update($validatedData);

        $this->successMessage('Student updated successfully!');
        return redirect()->route('frontend.student-list');
    }

    public function destroy(Request $request)
    {
        if ($request['id']) {
            $student = Student::findOrFail($request['id']);
            $student->delete();
            $this->successMessage('Student delete successfully!');
            return redirect()->route('frontend.student-list');
        }

        $this->errorMessage('Invalid Action!');
        return redirect()->route('frontend.student-list');
    }
}
