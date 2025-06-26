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
}
