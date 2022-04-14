<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advised;
use App\Models\AdvisedCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize('dashboard');

        return view('backEnd.dashboard');
    }

    public function mycourse()
    {

        $mycourses = Advised::where('student_id', Auth::user()->id)->first();
        $advisedcourses = AdvisedCourse::where('advised_id', $mycourses->id)->get();

        return view('backEnd.course.mycourse', compact('advisedcourses'));
    }
}
