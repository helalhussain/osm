<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Administator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::where('m_type','=','student')->paginate(9);
        $m_count = Message::where('m_type','=','administator')->get();
        $m_student_count = Message::where('m_type','=','student')->get();

        return view('administator.message.index',compact('messages','m_count','m_student_count'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::all();
        $m_count = Message::where('m_type','=','administator')->get();
        $m_student_count = Message::where('m_type','=','student')->get();
        return view('administator.message.compose',compact('students','m_count','m_student_count'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'description'=>'required'
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
        $store->message = $request->description;
        $store->file = $file;
        $store->m_type = 'administator';
        $store->save();
        // return response()->json([
        //     'message' => 'Message send successfully'
        // ]);
        return redirect()->route('administator.student-message.send');

    }

    /**
     * Display the specified resource.
     */
    public function show(Message $student_message)
    {
        $m_administator_count = Message::where('m_type','=','administator')->get();
        $m_count = Message::where('m_type','=','student')->get();
        return view('administator.message.show',compact('student_message','m_count','m_administator_count'));
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
    public function destroy(Message $student_message)
    {
        $delete = $student_message->Delete();
        return redirect()->back();
    }


    public function send()
    {
        $messages = Message::where('m_type','=','administator')->paginate(9);
        $m_count = Message::where('m_type','=','administator')->get();
        $m_student_count = Message::where('m_type','=','student')->get();

        return view('administator.message.send',compact('messages','m_count','m_student_count'));
    }
}
