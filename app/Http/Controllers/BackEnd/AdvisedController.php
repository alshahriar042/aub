<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Course;
use App\Models\Advised;
use Illuminate\Http\Request;
use App\Models\AdvisedCourse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;
use function GuzzleHttp\Promise\each;

class AdvisedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('advised.index');

        // $advisors = Advised::all();
        // return view('backEnd.advisor.index',compact('advisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('advised.create');

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
        Gate::authorize('advised.create');

        try {

            $advised = Advised::create([
                'student_id' => $request->student,
                'teacher_id' => Auth::user()->id,
            ]);

            $all_datas = $request->course_id;
            if (!empty($all_datas)) {
                foreach ($all_datas as $key => $data) {
                    $new_datas = explode(",",$data);

                    $all_course_val = [
                        'advised_id' => $advised->id,
                        'course_id'  => $new_datas[0],
                        'credit'     => $new_datas[1],
                        'fee'        => $new_datas[2],
                        'semister'   => "summer-2022"
                    ];
                    AdvisedCourse::create($all_course_val);
                }
            }

            notify()->success("Advised create successfully.", "Success");
            return redirect()->route('advised.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Advised Create Failed.", "Error");
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
        Gate::authorize('advised.edit');
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
        Gate::authorize('advised.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('advised.destroy');
    }
}
