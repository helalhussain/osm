<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Administator;
use App\Models\Teacher;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recieve_message = Message::where('administrator','=','recieve')->get();
        $messages = Message::where('administrator','=','recieve')->paginate(9);

        $t_m_administrator = Message::where('administator_id','=',auth()->user()->id)
        ->where('administrator','=','send')->where('m_type','=','administator')->get();
        return view('administator.message.index',compact('messages','t_m_administrator','recieve_message'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::all();
        $teachers = Teacher::all();
        $recieve_message = Message::where('administrator','=','recieve')->get();
        $t_m_administrator = Message::where('administator_id','=',auth()->user()->id)
        ->where('administrator','=','send')->where('m_type','=','administator')->get();

        $m_student_count = Message::where('administrator','=','recieve')->get();
        return view('administator.message.compose',compact('students','teachers','recieve_message','t_m_administrator','m_student_count'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([


        ]);

        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'message');
        }

        if($request->student_email == null){
            $store = new Message();
            $store->user_id = 0;
            $store->administator_id = auth()->user()->id;
            $store->teacher_id = $request->teacher_email;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 'send';
            $store->teach = 'recieve';
            $store->student = 0;
            $store->m_type = 'administator';
            $store->save();


        }elseif($request->teacher_email == null){
            $store = new Message();
            $store->user_id = $request->student_email;
            $store->administator_id = auth()->user()->id;
            $store->teacher_id = 0;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 'send';
            $store->teach = 0;
            $store->student = 'recieve';
            $store->m_type = 'administator';
            $store->save();
        }elseif($request->student_email != null and $request->teacher_email != null){
            $store = new Message();
            $store->user_id = $request->student_email;
            $store->administator_id = auth()->user()->id;
            $store->teacher_id = $request->teacher_email;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 'send';
            $store->teach = 'recieve';
            $store->student = 'recieve';
            $store->m_type = 'administator';
            $store->save();
        }

        else{
            return response()->json([
                'message' => 'You did not mantion any student or teacher'
                 ]);
            // return redirect()->route('administator.student-message.send');
        }
        return redirect()->route('administator.message.send');
        // return response()->json([
        //     'message' => 'Message send successfully'
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        $t_m_administrator = Message::where('administator_id','=',auth()->user()->id)
        ->where('administrator','=','send')->where('m_type','=','administator')->get();

        $recieve_message = Message::where('administrator','=','recieve')->get();
        $messages = Message::where('administrator','=','send')
        ->where('m_type','=','administator')
        ->where('administator_id','=',auth()->user()->id)->paginate(9);
        $recieve_messages = Message::Where('administrator','=','revieve')->get();

        return view('administator.message.show',compact('message','recieve_message','t_m_administrator','messages','recieve_messages'));
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
    // public function destroy(Message $student_message)
    // {
    //     $delete = $student_message->Delete();
    //     return redirect()->back();
    // }
    public function destroy(Message $message)
    {
        $delete = $message->Delete();
        return redirect()->back();
    }



    public function send()
    {
        $messages = Message::where('administrator','=','send')
        ->where('m_type','=','administator')
        ->where('administator_id','=',auth()->user()->id)->paginate(9);

        $recieve_message = Message::where('administrator','=','recieve')->get();
        $t_m_administrator = Message::where('administator_id','=',auth()->user()->id)
        ->where('administrator','=','send')->where('m_type','=','administator')->get();


        return view('administator.message.send',compact('messages','recieve_message','t_m_administrator'));
    }

    public function send_show($id){
        $t_m_administrator = Message::where('administator_id','=',auth()->user()->id)
        ->where('administrator','=','send')->where('m_type','=','administator')->get();

        $recieve_message = Message::where('administrator','=','recieve')->get();
        $messages = Message::where('administrator','=','send')
        ->where('m_type','=','administator')
        ->where('administator_id','=',auth()->user()->id)->paginate(9);
        $message = Message::find($id);

        return view('administator.message.send_show',compact('message','recieve_message','t_m_administrator','messages'));
    }
}
