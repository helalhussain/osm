<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Certificate;
use App\Models\User;
use App\Models\Teacher;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Certificate::query()->select('id','title','request','description')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Certificate $certificate)
    {
        $students = User::all();
        return view('teacher.certificate.form',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'title' => 'required',
            'file' => 'required',
        ]);

        if($request->file==null){
            $store = new Certificate();
            $store->user_id = $request->email;
            $store->teacher_id = auth()->user()->id;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->request =  "requested";
            $store->save();
        }else{
            $store = new Certificate();
            $store->user_id = $request->email;
            $store->teacher_id = auth()->user()->id;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->file =  file_upload($request->file, 'certificate');
            $store->request =  "requested";
            $store->save();

        }
        return response()->json([
            'message' => 'Certificate added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        $users = User::all();
        return view('teacher.certificate.show',compact('certificate','users'));
    }
    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        $students = User::all();
        return view('teacher.certificate.form',compact('certificate','students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, certificate $certificate)
    {
        $request->validate([
            'email' => 'required',
            'title' => 'required',

        ]);
        if($request->file==null){
            $certificate->update([
                'user_id'=>$request->email,
                'title'=>$request->title,
                'description'=>$request->description,

            ]);
        }else{
            $certificate->update([
                'user_id'=>$request->email,
                'title'=>$request->title,
                'description'=>$request->description,
                'file'=>file_upload($request->file, 'certificate')

            ]);
        }

        return response()->json(['message' => 'Certificate updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return response([
            'message'=>'Certificate deleted succssful'
        ]);
    }
}
