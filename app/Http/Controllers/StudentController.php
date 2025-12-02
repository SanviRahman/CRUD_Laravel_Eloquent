<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //read
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    //create
    public function create()
    {
        return view('students.create');
    }

    //store
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255|min:3',
            'phone' => 'required|string|max:15|min:11',
            'email' => 'required|email|unique:students|max:255',
        ], [
            'name.required' => 'Please enter student name',
            'name.min' => 'Name must be at least 3 characters',
            'phone.required' => 'Please enter phone number',
            'phone.min' => 'Phone number must be at least 11 digits',
            'email.required' => 'Please enter email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
        ]);//Student holo model er naam

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student add successfully.');
    }

    //Edit
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    //update
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|string|max:255|min:3',
            'phone' => 'required|string|max:15|min:11',
            'email' => 'required|email|max:255|unique:students,email,' . $id,
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    //Delete
    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

}
