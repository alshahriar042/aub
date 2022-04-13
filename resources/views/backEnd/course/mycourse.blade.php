@extends('backEnd.layouts.app')

@section('title', 'Course Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>My Course Lists</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Course Title</th>
                                        <th class="text-center">Course Code</th>
                                         <th class="text-center">Credit</th>
                                        <th class="text-center">Amount</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mycourses as $mycourse )
                                     @foreach ($mycourse->advisedCourses as $key=> $course )


                                     @dd($key);
                                     <tr>
                                         <td class="text-center"></td>
                                         <td class="text-center"></td>
                                         <td class="text-center"></td>
                                         <td class="text-center"></td>
                                         <td class="text-center"></td>


                                        </tr>
                                        @endforeach
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
