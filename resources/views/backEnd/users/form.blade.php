@extends('layouts.main')

@section('title', 'Role | Top Gear Auto Service BD Ltd')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection

@section('content')
    <div class="section-body">
        <div class="form-row">
            <div class="col-12">
                <div class="card card-primary rounded-0 shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="mb-0">{{ @$user? 'Edit' : 'Create' }} User</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header justify-content-between">
                        <a href="#" style="float: left"></a>
                        <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($user) ? route('users.update',$user->id) : route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($user)
                                @method('PUT')
                            @endisset
                            <div class="form-row align-items-center">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-body" style="padding: 10px;">
                                                <h5 class="card-title">User Info</h5>

                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}" placeholder="Enter user name" autofocus>

                                                    @error('name')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" placeholder="Enter user email">

                                                    @error('email')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter user password">

                                                    @error('password')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="confirm_password">Confirm Password</label>
                                                    <input id="confirm_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Re-Type password">

                                                    @error('password')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body" style="padding: 10px;">
                                                <h5 class="card-title">Select Roles and Status</h5>

                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select id="role" class="form-control select2 @error('role') is-invalid @enderror" name="role" autofocus>
                                                        <option value="">Select role</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ @$user->role->id == $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="avatar">Avatar</label>
                                                    <input id="avatar" type="file" class="dropify form-control @error('avatar') is-invalid @enderror" name="avatar" data-default-file="{{ @$user ? $user->getFirstMediaUrl('avatar') : '' }}" data-height="190">

                                                    @error('avatar')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" name="status" id="status" {{ @$user->status == true ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="status" style="margin-left: 35px;">Status</label>
                                                    </div><br>

                                                    @error('status')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa {{ @$user? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                                        <span>{{ @$user? 'Update User' : 'Save User' }}</span>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- image --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
