<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Admin;
use App\Models\User;
use App\Models\Administator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $messages = Message::where('m_type','=','administator')->get();
    //     return view('student.message.index',compact('messages'));
    // }
    public function index()
    {
        $messages = Message::where('m_type','=','administator')
        ->where('user_id','=',auth()->user()->id)->paginate(9);
        $m_count = Message::where('m_type','=','administator')->get();
        $m_student_count = Message::where('m_type','=','student')->get();

        return view('student.message.index',compact('messages','m_count','m_student_count'));
    }

    /**
     * Show the form for send a new resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $messages = Message::where('m_type','=','administator')
        ->where('user_id','=',auth()->user()->id)->paginate(9);
        $m_count = Message::where('m_type','=','administator')->get();
        $m_student_count = Message::where('m_type','=','student')->get();
        $administators = Administator::all();
        return view('student.message.compose',compact('administators','m_count','m_student_count'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required'
            // 'elm1'=>'required'
        ]);
        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'message');
        }

        $store = new Message();
        $store->user_id = $request->email;
        $store->administator_id = auth()->user()->id;
        $store->subject= $request->subject;
        $store->message = $request->message;
        $store->file = $file;
        $store->m_type = 'student';
        $store->save();
        return redirect()->route('send.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        $m_count = Message::where('m_type','=','administator')->get();
        $m_student_count = Message::where('m_type','=','student')->get();
        return view('student.message.show',compact('message','m_count','m_student_count'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $delete = $message->Delete();
        return redirect()->back();
    }



}
