<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Result;
use App\Models\Classroom;
use App\Models\Teacher;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Result::query()->select('id','title','description')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.result.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Result $result)
    {
        $classes = Classroom::all();
        return view('teacher.result.form',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'class' => 'required',
            'title' => 'required',
        ]);

        if($request->file==null){
            $store = new Result();
            $store->classroom_id = $request->class;
            $store->teacher_id = auth()->user()->id;
            // $store->administator_id = 1;
            $store->title = $request->title;
            $store->description = $request->description;

            $store->request =  "requested";
            $store->save();
        }else{
            $store = new Result();
            $store->classroom_id = $request->class;
            $store->teacher_id = auth()->user()->id;
            // $store->administator_id = 1;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->file =  file_upload($request->file, 'result');
            $store->request =  "requested";
            $store->save();

        }


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
        return view('teacher.result.show',compact('result','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        $classes = Classroom::all();
        return view('teacher.result.form',compact('result','classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
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

            ]);
        }else{
            $result->update([
                'classroom_id'=>$request->class,
                'title'=>$request->title,
                'description'=>$request->description,
                'file'=>file_upload($request->file, 'result')

            ]);
        }

        return response()->json(['message' => 'Result updated successfully']);
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
