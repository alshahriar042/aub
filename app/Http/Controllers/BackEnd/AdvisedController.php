<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Course;
use App\Models\Advised;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\AdvisedCourse;
use Illuminate\Support\Facades\Auth;

class AdvisedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advisors = Advised::all();
        return view('backEnd.advisor.index',compact('advisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::where('role_id',3)->get();
        $courses =Course::orderBY('id')->get();
        // dd($courses);
        return view('backEnd.advisor.create',compact('courses','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $a= implode ("-", $request->course_id);
        dd($a);


        // try {
        //   $id=   Advised::create([
        //         'student_id' => $request->student,
        //         'teacher_id' => Auth::user()->id,
        //     ]);

        //     AdvisedCourse::create([

        //     ])

        //     // dd($id->id);

        //     notify()->success("Advised create successfully.", "Success");
        //     return redirect()->route('batchs.index');

        // } catch (\Throwable $th) {
        //     Log::error($th->getMessage());

        //     notify()->error("Advised Create Failed.", "Error");
        //     return back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
