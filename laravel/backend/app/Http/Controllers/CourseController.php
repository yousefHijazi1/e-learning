<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
            return response()->json([
                'courses' => $courses
            ], 200, [], JSON_PRETTY_PRINT);
    }

    public function show(Course $course){
        $item = Course::find($course);

        if($item){
            return response()->json([
                'course' => $item
            ], 200, [], JSON_PRETTY_PRINT);
        }else{
            return response()->json([
                'message' => 'no course found'
            ]);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'video' => 'required',
            'rate' => 'nullable',
            'cover' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->toArray(),
                'message' => 'Please enter all fields',
                'code' => 401
            ]);
        }

        $data = $validator->validated();
        $course = Course::create($data);

        if($course){
            return response()->json([
                'message' => 'Course Added Successfully',
                'code' => 200,
            ]);
        }else{
            return response()->json([
                'message'=> 'Course Add Failed',
                'code'=> 500,
            ]);
        }
    }

    public function update(Request $request , Course $course){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'video' => 'required',
            'rate' => 'nullable',
            'cover' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->toArray(),
                'message' => 'Please enter all fields',
                'code' => 401
            ]);
        }

        $data = $validator->validated();
        $course->update($data);

        if($course){
            return response()->json([
                'message' => 'Course Added Successfully',
                'code' => 200,
            ]);
        }else{
            return response()->json([
                'message'=> 'Course Add Failed',
                'code'=> 500,
            ]);
        }
    }

    public function delete(Course $course){
        $deleted = $course->delete();

        if($deleted){
            return response()->json([
                'message' => 'Course deleted',
                'code' => 200
            ]);
        }else{
            return response()->json([
                'message' => 'Course delete failed',
                'code' => 401
            ]);
        }
    }
}
