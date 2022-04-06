<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Course::all();
        return view('backEnd.course.index', compact('courses'));
    }

    public function create()
    {
        return view('backEnd.course.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'code'  => 'required',
            'name' => 'required',
            'credit' => 'required',
            'amount' => 'required',

        ]);

        try {
            $user = Course::create([
                'code'  => $request->code,
                'name'     => $request->name,
                'credit'    => $request->credit,
                'amount'    => $request->amount,
                'status'   => $request->filled('status')
            ]);

            notify()->success("Course create successfully.", "Success");
            return redirect()->route('course.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Course Create Failed.", "Error");
            return back();
        }    }
}
