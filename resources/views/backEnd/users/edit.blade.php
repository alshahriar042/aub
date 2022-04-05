@extends('backEnd.layouts.app')

@section('title', 'Create Role | Top Gear Auto Service BD Ltd')

@section('content')


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary rounded-0">
                    <div class="card-body text-center">
                        <h4 class="mb-0">User Edit_{{ $user->name }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="">
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="First name">
                            </div>
                            <div class="col-6">
                                <label for="email">Email</label>

                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="phone">Phone</label>

                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="Phone">
                            </div>
                            <div class="col-6">
                                <label for="password">Password</label>

                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>

                            <div class="col">
                                <label for="role"> Role</label>
                                <select name="roles[]" id="roles" class="select2" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        <button type="submit" class="btn btn-primary ">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
