<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('users.create');

        $roles = Role::all();
        return view('users.form',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

            return redirect()->route('users.index')->with('success', 'User Created Successfully.');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('warning', ' User Create Failed.');
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
        return view('users.form',compact('roles','user'));
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

            return redirect()->route('users.index')->with('success', 'User Updated Successfully.');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('warning', ' User Update Failed.');
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

        return back()->with('success', 'User Deleted Successfully.');
    }
}
