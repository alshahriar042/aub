@extends('layouts.main')

@section('title', 'Profile')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-6 col-md-6 col-lg-6">
        <div class="card author-box">
            <div class="card-body">
                <div class="author-box-center">
                    @php
                        $user = Auth::user();
                    @endphp

                    <img class="rounded-circle author-box-picture" src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160.png' }}" alt="User Avatar">
                    <div class="clearfix"></div><br>
                    <div class="author-box-name">
                        <span style="color: #6777ef">{{ $user->name }}</span>
                        {{-- <a href="#">{{ $user->name }}</a> --}}
                    </div><br>
                    <div>
                        <p class="clearfix">
                            <span class="float-left">Role</span>
                            <span class="float-right text-muted">{{ $user->role->name }}</span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">Phone</span>
                            <span class="float-right text-muted">{{ $user->phone }}</span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">E-Mail</span>
                            <span class="float-right text-muted">{{ $user->email }}</span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">Join</span>
                            <span class="float-right text-muted">{{ date('d-M-Y',strtotime($user->created_at)) }}</span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">Status</span>
                            @if ($user->status == 1)
                                <span class="float-right badge badge-success">Active</span>
                            @else
                                <span class="float-right badge badge-warning">Inactive</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-6 col-lg-6">
        <div class="card">
            <form method="post" action="{{ route('profile_update') }}" class="needs-validation" enctype="multipart/form-data">
                @csrf

                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" placeholder="Enter your name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" placeholder="Enter your e-mail">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" placeholder="Enter your phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 col-12">
                            <label for="avatar">Avatar</label>
                            <input id="avatar" type="file" class="dropify form-control @error('avatar') is-invalid @enderror" name="avatar" data-default-file="{{ @Auth::user() ? Auth::user()->getFirstMediaUrl('avatar') : '' }}" data-height="190">

                            @error('avatar')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer text-left">
                  <button class="btn btn-primary">Update profile</button>
                </div>
            </form>
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
