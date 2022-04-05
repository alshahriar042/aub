@extends('backEnd.layouts.app')

@section('title', 'Create Role | Top Gear Auto Service BD Ltd')

@section('content')


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary rounded-0">
                    <div class="card-body text-center">
                        <h4 class="mb-0">User Create</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="First name">
                                </div>
                                <div class="col-6">
                                    <label for="email">Email</label>

                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>

                                <div class="col-6">
                                    <label for="phone">Phone</label>

                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                </div>
                                <div class="col-6">
                                    <label for="password">Password</label>

                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-6">
                                    <label for="role"> Role</label>
                                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>

                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row justify-content-center">
                                <div class="col-4 text-center">
                                    <button type="submit" class="btn btn-primary btn-block mt-3">Save</button>

                                </div>
                            </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
