<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        if ($student->count() > 0) {
            $data = [
                'status' => 200,
                'student' => $student,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'message' => 'No record found',
            ];
            return response()->json($data, 404);
        }
    }

    public function store(StoreStudentRequest $request)
    {
        // No need to manually validate and handle errors as it's done automatically by StoreStudentRequest

        $student = Student::create([
            'name' => $request->name,
            'course' => $request->course,
            'email' => $request->email,
            'phone' => $request->phone, // Fixed the typo 'phome' to 'phone'
        ]);

        if ($student) {
            $data = [
                'status' => 200,
                'message' => 'student created successfully',
                'student'=> $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 500,
                'message' => 'something went wrong',
            ];
            return response()->json($data, 500);
        }
    }

    public function show($id){
        $student = Student::find($id);
        if($student){
            $data = [
                'status' => 200,
                'student'=> $student
            ];
            return response()->json($data, 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No such student Found'
            ], 404);
        }
    }

    public function edit ($id){
        $student = Student::find($id);
        if($student){
            $data = [
                'status' => 200,
                'student'=> $student
            ];
            return response()->json($data, 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No such student Found'
            ], 404);
        }
    }

    public function update (StoreStudentRequest $request, int $id){
        $student = Student::find($id);
      
        if ($student) {
            $student->update([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone, // Fixed the typo 'phome' to 'phone'
            ]);
            $data = [
                'status' => 200,
                'message' => 'student updated successfully',
                'student'=> $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'message' => 'No such student found',
            ];
            return response()->json($data, 404);
        }
    }

    public function destory($id){
        $student = Student::find($id);
        if($student){
                $student->delete();
            $data = [
                'status' => 200,
                'message' => 'student has been deleted successfully'
            ];

            return response()->json($data, 200);
    }else{
            $data = [
                'status' => 404,
                'message' => 'No such Student Found'
            ];
            return response()->json($data, 404);
            }
    }
}
