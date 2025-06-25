<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Message;
use App\Models\Teacher;
use App\Models\Administator;
use App\Models\User;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $messages = Message::where('teach','=','recieve')->paginate(9);

        $recieve_message = Message::where('teach','=','recieve')->get();

        $m_t_teacher = Message::where('teacher_id','=',auth()->user()->id)
        ->where('teach','=','send')->where('m_type','=','teacher')->get();

        return view('teacher.message.index',compact('messages','m_t_teacher','recieve_message'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::all();
        $administators = Administator::all();
        $m_t_teacher = Message::where('teacher_id','=',auth()->user()->id)
        ->where('teach','=','send')->where('m_type','=','teacher')->get();
        $recieve_message = Message::where('teach','=','recieve')->get();
        return view('teacher.message.compose',compact('students','administators','m_t_teacher','recieve_message'));
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
            $store->administator_id = $request->administator_email;
            $store->teacher_id = auth()->user()->id;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 'recieve';
            $store->teach = 'send';
            $store->student = 0;
            $store->m_type = 'teacher';
            $store->save();


        }elseif($request->administator_email == null){
            $store = new Message();
            $store->user_id = $request->student_email;
            $store->administator_id = 0;
            $store->teacher_id = auth()->user()->id;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 0;
            $store->teach = 'send';
            $store->student = 'recieve';
            $store->m_type = 'teacher';
            $store->save();

        }elseif($request->student_email != null and $request->administator_email != null){
            $store = new Message();
            $store->user_id = $request->student_email;
            $store->administator_id =$request->administator_email;
            $store->teacher_id =  auth()->user()->id;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 'recieve';
            $store->teach = 'send';
            $store->student = 'recieve';
            $store->m_type = 'teacher';
            $store->save();
        }

        else{
            return response()->json([
                'message' => 'You did not mantion any student or administrator'
                 ]);
            // return redirect()->route('administator.student-message.send');
        }
        return redirect()->route('teacher.message.send');
        // return response()->json([
        //     'message' => 'Message send successfully'
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        $m_administator_count = Message::where('m_type','=','teacher')->get();
    $m_t_teacher = Message::where('teacher_id','=',auth()->user()->id)
        ->where('teach','=','send')->where('m_type','=','teacher')->get();
        $recieve_message = Message::where('teach','=','recieve')->get();
        return view('teacher.message.show',compact('message','recieve_message','m_t_teacher','m_administator_count'));
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

    public function send()
    {
        $messages = Message::where('teach','=','send')->where('m_type','=','teacher')
        ->where('teacher_id','=',auth()->user()->id)->paginate(9);

        $m_t_teacher = Message::where('teacher_id','=',auth()->user()->id)
        ->where('teach','=','send')->where('m_type','=','teacher')->get();

        $recieve_message = Message::where('teach','=','recieve')->get();

        return view('teacher.message.send',compact('messages','m_t_teacher','recieve_message'));
    }



    public function send_show($id){
        $m_t_teacher = Message::where('teacher_id','=',auth()->user()->id)
        ->where('teach','=','send')->where('m_type','=','teacher')->get();

        $recieve_message = Message::where('teach','=','recieve')->get();
        $messages = Message::where('teach','=','send')
        ->where('m_type','=','teacher')
        ->where('teacher_id','=',auth()->user()->id)->paginate(9);
        $message = Message::find($id);

        return view('teacher.message.send_show',compact('message','recieve_message','m_t_teacher','messages'));
    }
}
