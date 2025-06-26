<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Http\Resources\UserResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function get()
    {
        $students = Student::all();
        return response()->json($students);
    }
    public function getById($id): StudentResource
    {
        // find by nim
        $student = Student::where('nim', $id)->first();
        if (!$student) {
            throw new HttpResponseException(response([
                "errors" => [
                    "NIM" => [
                        "NIM not found"
                    ]
                ]
            ], 404));
        }
        return new StudentResource($student);
    }
    public function create(StoreStudentRequest $request): StudentResource
    {
        $data = $request->validated();
        if (Student::where('nim', $data['nim'])->exists()) {
            throw new HttpResponseException(response([
                "errors" => [
                    "NIM" => [
                        "NIM already exists"
                    ]
                ]
            ], 400));
        }
        if (Student::where('email', $data['email'])->exists()) {
            throw new HttpResponseException(response([
                "errors" => [
                    "Email" => [
                        "Email already exists"
                    ]
                ]
            ], 400));
        }
        $student = new Student($data);
        $student->save();
        return new StudentResource($student);
    }
    public function update(UpdateStudentRequest $request, $id): JsonResponse
    {
        $data = $request->validated();
        $student = Student::where('nim', $id)->first();
        if (!$student) {
            throw new HttpResponseException(response()->json(['error' => 'Student not found'], 404));
        }
        $student->update($data);
        return(new StudentResource($student))->response()->setStatusCode(200);
    }
    public function delete($id): JsonResponse
    {
        $student = Student::where('nim', $id)->first();
        if (!$student) {
            throw new HttpResponseException(response()->json(['error' => 'Student not found'], 404));
        }
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
