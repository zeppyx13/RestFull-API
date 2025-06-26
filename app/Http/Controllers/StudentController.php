<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

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
    public function create(StoreStudentRequest $request): JsonResponse
    {
        $data = $request->validated();
        if (Student::where('nim', $data['nim'])->exists()) {
            return response()->json(['error' => 'NIM already exists'], 400);
        }
        if (Student::where('email', $data['email'])->exists()) {
            return response()->json(['error' => 'Email already exists'], 400);
        }
        $student = new Student($data);
        $student->save();
        return(new StudentResource($student))->response()->setStatusCode(201);
    }
}
