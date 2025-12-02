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
            'name'  => 'required|max:255',
            'phone' => 'required | max:15',
            'email' => 'required',
        ]);
        Student::create($request->all()); //Student holo model er naam

        return redirect()->route('students.index')->with('success', 'Student add successfully.');
    }

    //Edit
    public function edit($id){
      $student=Student::find($id);
      return view('students.edit',compact('student'));
    }

   
    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'phone' => 'required | max:15',
            'email' => 'required',
        ]);
        $student = Student::find($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

}
