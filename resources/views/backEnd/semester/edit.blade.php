@extends('backEnd.layouts.app')

@section('title', 'Create Course. | AUB')

@section('content')


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary rounded-0">
                    <div class="card-body text-center">
                        <h4 class="mb-0">Current Semester Update</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card-header justify-content-between">
                            <a href="#" style="float: left"></a>
                            <a href="{{ route('semesters.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                                <i class="fa fa-arrow-circle-left"></i>
                                <span>Back to list</span>
                            </a>
                        </div>

                        <form action="{{ route('semesters.update',$semester->id) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <div class="row align-items-center">
                            <div class="col-6" >
                                <label for="batch">Semester</label>
                                <select id="batch" class="form-control @error('semester') is-invalid @enderror" name="semester" autofocus>
                                    <option value="">Select Semester</option>
                                    <option value="summer">Summer</option>
                                    <option value="spring">Spring</option>
                                    <option value="fall">Fall</option>
                                </select>
                            </div>


                                <div class="col-3 text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-block mt-3">Save</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
