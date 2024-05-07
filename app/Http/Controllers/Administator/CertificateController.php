<?php

namespace App\Http\Controllers\Administator;

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
            return DataTables::eloquent(Certificate::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('administator.certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Certificate $certificate)
    {
        $students = User::all();
        return view('administator.certificate.form',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'title' => 'required',
        ]);

        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'certificate');
        }

        $store = new Certificate();
        $store->user_id = $request->email;
        // $store->teacher_id =1;
        // $store->teacher_id = auth()->user()->id;
        $store->title = $request->title;
        $store->description = $request->description;
        $store->file =  $file;
        $store->request = 'requested';
        $store->save();
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
        return view('administator.certificate.show',compact('certificate','users'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        $students = User::all();
        return view('administator.certificate.form',compact('certificate','students'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
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
                'request'=>$request->requested
            ]);
        }else{
            $certificate->update([
                'user_id'=>$request->email,
                'title'=>$request->title,
                'description'=>$request->description,
                'file'=>file_upload($request->file, 'certificate'),
                'request'=>$request->requested
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



// class CertificateController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         if (request()->ajax()) {
//             return DataTables::eloquent(Certificate::query())
//                 ->addIndexColumn()
//                 ->addColumn('action', fn () => '')
//                 ->toJson();
//         }
//         return view('administator.certificate.index');
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create(Certificate $certificate)
//     {
//         $students = User::all();
//         return view('administator.certificate.form',compact('students'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'email' => 'required',
//             'title' => 'required',
//             'file' => 'required',
//         ]);

//         if($request->file==null){
//             $file = null;
//         }else{
//             $file = file_upload($request->file, 'certificate');
//         }

//         $store = new Certificate();
//         $store->user_id = $request->email;
//         // $store->teacher_id = auth()->user()->id;
//         $store->title = $request->title;
//         $store->description = $request->description;
//         $store->file =  $file;
//         $store->request =  "requested";
//         $store->save();
//         return response()->json([
//             'message' => 'Certificate added successfully'
//         ]);
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Certificate $certificate)
//     {
//         $users = User::all();
//         return view('administator.certificate.show',compact('certificate','users'));
//     }
//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Certificate $certificate)
//     {
//         $students =User::all();
//         return view('administator.certificate.form',compact('certificate','students'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Certificate $certificate)
//     {
//         {

//             $request->validate([
//                 'email' => 'required',
//                 'title' => 'required',


//             ]);
//             if($request->file==null){
//                 $certificate->update([
//                     'user_id'=>$request->email,
//                     'title'=>$request->title,
//                     'description'=>$request->description,
//                     'request'=>$request->requested
//                 ]);
//             }else{
//                 $certificate->update([
//                     'user_id'=>$request->email,
//                     'title'=>$request->title,
//                     'description'=>$request->description,
//                     'file'=>file_upload($request->file, 'certificate'),
//                     'request'=>$request->requested
//                 ]);

//             }


//             return response()->json(['message' => 'Certificate updated successfully']);

//         }
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Certificate $certificate)
//     {
//         $certificate->delete();
//         return response([
//             'message'=>'Certificate deleted succssful'
//         ]);
//     }
// }
