<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('users.index');

        $users = User::all();
        return view('backEnd.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('users.create');

        $month = date("m");
        $max_rec_id = DB::select(DB::raw("select count(*) max_job_id from users where month(created_at) = $month"));
        if ($max_rec_id[0]->max_job_id == 0) {
            $max_job_id = $max_rec_id[0]->max_job_id < 10 ? "0" . $max_rec_id[0]->max_job_id + 1 : $max_rec_id[0]->max_job_id + 1;
        } else {
            $max_job_id = $max_rec_id[0]->max_job_id < 10 ? "0" . $max_rec_id[0]->max_job_id + 1 : $max_rec_id[0]->max_job_id + 1;
        }
        $id_no = "AUB" . "-" . date("ymd") . $max_job_id;


        $roles = Role::all();
        return view('backEnd.users.form',compact('roles','id_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        Gate::authorize('users.create');

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email'  => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:8',
            'avatar' => 'required|image',
            'role' => 'required',
            'status' => 'required'
        ]);

        try {

            $month = date("m");
            $max_rec_id = DB::select(DB::raw("select count(*) max_job_id from users where month(created_at) = $month"));
            if ($max_rec_id[0]->max_job_id == 0) {
                $max_job_id = $max_rec_id[0]->max_job_id < 10 ? "0" . $max_rec_id[0]->max_job_id + 1 : $max_rec_id[0]->max_job_id + 1;
            } else {
                $max_job_id = $max_rec_id[0]->max_job_id < 10 ? "0" . $max_rec_id[0]->max_job_id + 1 : $max_rec_id[0]->max_job_id + 1;
            }
            $id_no = "AUB" . "-" . date("ymd") . $max_job_id;

            $user = User::create([
                'role_id'  => $request->role,
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'status'   => $request->filled('status')
            ]);

            if ($request->hasFile('avatar')) {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }

            notify()->success("User create successfully.", "Success");
            return redirect()->route('users.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("User Create Failed.", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('users.edit');

        $roles = Role::all();
        return view('backEnd.users.form',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('users.edit');

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email'  => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|confirmed|string|min:8',
            'avatar' => 'nullable|image',
            'role' => 'required'
        ]);

        try{
            $user->update([
                'role_id'  => $request->role,
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
                'status'   => $request->filled('status')
            ]);

            if ($request->hasFile('avatar')) {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }

            notify()->success("User Updated Successfully.", "Success");
            return redirect()->route('users.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("User Update Failed", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('users.destroy');

        $user->delete();

        notify()->success("User Deleted Successfully.", "Success");
        return back();
    }
}
