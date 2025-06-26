<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function get()
    {
        $students = Student::all();
        return response()->json($students);
    }
    public function getById($id)
    {
        // find by nim
        $student = Student::where('nim', $id)->first();
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }
        return response()->json($student);
    }
}
