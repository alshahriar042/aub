<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Semester;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters= Semester::orderBy('id')->get();
        return view('backEnd.semester.index',compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'semester' => 'required',
        ]);

        try {
            Semester::create([
                'currentSemester' => $request->semester,
            ]);

            notify()->success("Semester create successfully.", "Success");
            return redirect()->route('semesters.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Semester Create Failed.", "Error");
            return back();
        }
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

        $semester = Semester::findOrFail($id);
        return view('backEnd.semester.edit',compact('semester'));
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
        $semester = Semester::findOrFail($id);

        $this->validate($request,[
            'semester' => 'required',
        ]);

        try {
            $semester->update([
                'currentSemester' => $request->semester,
            ]);

            notify()->success("Semester Update successfully.", "Success");
            return redirect()->route('semesters.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Semester Update Failed.", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Semester::findOrFail($id)->delete();

        notify()->success("Semester delete successfully.", "Success");
        return back();
    }
}
