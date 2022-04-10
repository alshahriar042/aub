@extends('backEnd.layouts.app')

@section('title', 'Advising Panel | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Student Advising</h4>
                    </div>
                    <div class="card-body">
                                         <div class="form-row align-items-center">
                            <div class="table-responsive">
                                <form id="form_check">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th width="2%"><input name="checkbox" onclick='checkedAll();'
                                                        type="checkbox" readonly="readonly" title="Select All" /></th>
                                                <th class="text-left">SL</th>
                                                <th class="text-left">Course Code</th>
                                                <th class="text-left">Course Title</th>
                                                <th class="text-left">Faculty</th>
                                                <th class="text-left">Total Seat</th>
                                                <th class="text-left">Available seat</th>
                                                <th class="text-left">Credit</th>
                                                <th class="text-left">Amount</th>
                                                <th class="text-left">Created At</th>
                                                {{-- <th class="text-center">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course )
                                                <tr>

                                                    <td align="left" valign="top"><input type="checkbox" name="summe_code[]"

                                                            title="Single Select" />
                                                    </td>
                                                    <td class="text-left">{{$loop->index +1  }}</td>
                                                    <td class="text-left"> {{ $course->code }}</td>
                                                    <td class="text-left">{{ $course->name }}</td>
                                                    <td class="text-left">

                                                    </td>

                                                    <td class="text-left">



                                                    </td>
                                                    <td class="text-left">


                                                        </td>

                                                    <td class="text-left">

                                                    </td>

                                                    <td class="text-left">



                                                    </td>

                                                    <td class="text-left">
                                                    </td>


                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog modal-lg">

    </div>
</div>


