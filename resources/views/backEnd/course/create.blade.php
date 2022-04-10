@extends('backEnd.layouts.app')

@section('title', 'Create Course. | AUB')

@section('content')


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary rounded-0">
                    <div class="card-body text-center">
                        <h4 class="mb-0">Course Create</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card-header justify-content-between">
                            <a href="#" style="float: left"></a>
                            <a href="{{ route('courses.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                                <i class="fa fa-arrow-circle-left"></i>
                                <span>Back to list</span>
                            </a>
                        </div>

                        <form action="{{ route('courses.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Course Title</label>
                                    <input type="text" name="name" class="form-control" placeholder="Course name">
                                </div>
                                <div class="col-6">
                                    <label for="code">Course Code</label>

                                    <input type="code" name="code" class="form-control" placeholder="Course Code">
                                </div>

                                <div class="col-6" >
                                        <label for="batch">Department</label>
                                        <select id="batch" class="form-control @error('department') is-invalid @enderror" name="department" autofocus>
                                            <option value="">Select Batch</option>
                                            @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>

                                </div>

                                <div class="col-6" >
                                    <label for="batch">Teachers</label>
                                    <select id="batch" class="form-control @error('teacher') is-invalid @enderror" name="teacher" autofocus>
                                        <option value="">Select Couser Teacher</option>
                                        @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>

                            </div>



                                <div class="col-6">
                                    <label for="credit">Credit</label>

                                    <input type="text" name="credit" class="form-control" placeholder="Credit">
                                </div>
                                <div class="col-6">
                                    <label for="amount">Amount</label>

                                    <input type="text" name="amount" class="form-control" placeholder="Amount">
                                </div>

                            </div>

                                   <br>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" {{ @$course->status == true ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="status" style="margin-left: 35px;">Status</label>
                                </div><br>

                                @error('status')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
