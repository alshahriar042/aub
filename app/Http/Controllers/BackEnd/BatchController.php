<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batchs = Batch::all();
        return view('backEnd.batch.index',compact('batchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.batch.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|numeric|min:1|max:3|unique:batches',
        ]);

        try {
            Batch::create([
                'name' => $request->name,
            ]);

            notify()->success("Batch create successfully.", "Success");
            return redirect()->route('batchs.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Batch Create Failed.", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch = Batch::findOrFail($id);
        return view('backEnd.batch.form',compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $batch = Batch::findOrFail($id);

        $this->validate($request,[
            'name'  => 'required|numeric|min:1|max:3|unique:batches,name,'.$batch->id,
        ]);

        try{
            $batch->update([
                'name'     => $request->name,
            ]);

            notify()->success("Batch Updated Successfully.", "Success");
            return redirect()->route('batchs.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Batch Update Failed", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Batch::findOrFail($id)->delete();

        notify()->success("Batch delete successfully.", "Success");
        return back();
    }
}
