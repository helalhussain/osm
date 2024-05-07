<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use App\Models\Result;
use App\Models\Classroom;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Result::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('administator.result.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Result $result)
    {
        $classes = Classroom::all();
        return view('administator.result.form',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'title' => 'required',
            'file' => 'required',
        ]);

        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'result');
        }

        $store = new Result();
        $store->classroom_id = $request->class;
        $store->administator_id = auth()->user()->id;
        $store->title = $request->title;
        $store->description = $request->description;
        $store->file =  $file;
        $request->request = "requested";
        $store->save();
        return response()->json([
            'message' => 'Result added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        $classes = Classroom::all();
        return view('administator.result.show',compact('result','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        $classes =Classroom::all();
        return view('administator.result.form',compact('result','classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        {

            $request->validate([
                'class' => 'required',
                'title' => 'required',


            ]);
            if($request->file==null){
                $result->update([
                    'classroom_id'=>$request->class,

                    'title'=>$request->title,
                    'description'=>$request->description,
                    'request'=>$request->requested
                ]);
            }else{
                $result->update([
                    'classroom_id'=>$request->class,

                    'title'=>$request->title,
                    'description'=>$request->description,
                    'file'=>file_upload($request->file, 'result'),
                    'request'=>$request->requested
                ]);

            }


            return response()->json(['message' => 'Recult updated successfully']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        $result->delete();
        return response([
            'message'=>'Result deleted succssful'
        ]);
    }
}
