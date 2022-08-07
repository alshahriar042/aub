<?php

namespace App\Http\Controllers;

use App\Models\Advised;
use App\Models\Course;
use Illuminate\Http\Request;

class PreviousCourse extends Controller
{
    public function index()
    {
        $courses = Advised::with(['user','advisedCourses','advisedCourses.course'])->get();

        // return  $courses;

        return view('backEnd.course.previouscourse',compact('courses'));
    }
}
