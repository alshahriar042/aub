<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Advised;
use Illuminate\Http\Request;

class DropCourseController extends Controller
{
    public function index()
    {
       $advied_students = Advised::all();

      if(!empty($advied_students)){
         return view('backEnd.dropCourse.index',compact('advied_students'));
      }
      return view('backEnd.dropCourse.index');
    }
}
