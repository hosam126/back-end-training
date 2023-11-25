<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $courses = Course::where('name', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%")
                ->paginate(10);
            $courses->appends(['search' => $request->search]);
        } else {
            $courses = Course::paginate(10);
        }
        return response()->json([
            'message' => 'success',
            'courses' => $courses,

        ]);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course_data = $request->except('images');
        $image = $request->file('image')->store('courses_photos');
        $course_data['image'] = $image;
        $course = Course::create($course_data);

        return response()->json([
            'message' => 'Course created successfully!',
            'course' => $course,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        return response()->json([
            'message' => 'success',
            'data' => $course,

        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        $course_data = $request->except('image');
        if ($request->hasFile('image'))
            $course_data['image'] = $request->file('image')->store('courses_photos');
        $course->update($course_data);

        return response()->json([
            'message' => 'Course updated successfully!',
            'course' => $course,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json([
            'message' => 'Course deleted successfully!',
        ]);
    }
}