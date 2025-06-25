<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Admin;
use App\Models\User;
use App\Models\Administator;
use App\Models\Teacher;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $messages = Message::where('student','=','recieve')
        ->where('user_id','=',auth()->user()->id)->paginate(9);

      $student_send = Message::where('user_id','=',auth()->user()->id)
        ->where('student','=','send')->where('m_type','=','student')->get();

        $m_t_student = Message::where('user_id','=',auth()->user()->id)
        ->where('student','=','send')->where('m_type','=','student')->get();

        $student_recieve = Message::where('student','=','recieve')->get();

        return view('student.message.index',compact('messages','m_t_student','student_send','student_recieve'));
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
        $student_send = Message::where('user_id','=',auth()->user()->id)
        ->where('student','=','send')->where('m_type','=','student')->get();
        $student_recieve = Message::where('student','=','recieve')->get();
        $administators = Administator::all();
        $teachers = Teacher::all();
        return view('student.message.compose',compact('teachers','administators','student_send','student_recieve'));
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

        if($request->administrator_email == null){
            $store = new Message();
            $store->user_id = auth()->user()->id;
            $store->administator_id = 0;
            $store->teacher_id = $request->teacher_email;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator =0;
            $store->teach = 'recieve';
            $store->student = 'send';
            $store->m_type = 'student';
            $store->save();


        }elseif($request->teacher_email == null){
            $store = new Message();
            $store->user_id = auth()->user()->id;
            $store->administator_id = $request->administrator_email;
            $store->teacher_id = 0;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 'recieve';
            $store->teach = 0;
            $store->student = 'send';
            $store->m_type = 'student';
            $store->save();
        }elseif($request->administrator_email != null and $request->teacher_email != null){
            $store = new Message();
            $store->user_id =auth()->user()->id;
            $store->administator_id = $request->administrator_email;
            $store->teacher_id = $request->teacher_email;
            $store->subject= $request->subject;
            $store->message = $request->description;
            $store->file = $file;
            $store->administrator = 'recieve';
            $store->teach = 'recieve';
            $store->student = 'send';
            $store->m_type = 'student';
            $store->save();
        }

        else{
            return response()->json([
                'message' => 'You did not mantion any administrator or teacher'
                 ]);
            // return redirect()->route('administator.student-message.send');
        }
        // return redirect()->route('administator.message.send');
        return redirect()->route('message.send');
        // return response()->json([
        //     'message' => 'Message send successfully'
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {



        $m_student_count = Message::where('m_type','=','student')->get();

        $m_t_student = Message::where('user_id','=',auth()->user()->id)
        ->where('student','=','send')->where('m_type','=','student')->get();

        $student_recieve = Message::where('student','=','recieve')->get();

        return view('student.message.show',compact('message','m_t_student','student_recieve','m_student_count'));
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
        $messages = Message::where('student','=','send')
        ->where('m_type','=','student')
        ->where('user_id','=',auth()->user()->id)->paginate(9);


        $m_t_student = Message::where('user_id','=',auth()->user()->id)
        ->where('student','=','send')->where('m_type','=','student')->get();
        $student_recieve = Message::where('student','=','recieve')->get();

        return view('student.message.send',compact('messages','m_t_student','student_recieve'));
    }

    public function send_show($id){
        $m_t_student = Message::where('user_id','=',auth()->user()->id)
        ->where('student','=','send')->where('m_type','=','student')->get();

        $recieve_message = Message::where('student','=','recieve')->get();

        $messages = Message::where('student','=','send')
        ->where('m_type','=','student')
        ->where('user_id','=',auth()->user()->id)->paginate(9);

        $message = Message::where('student','=','send',)->find($id);

        return view('student.message.send_show',compact('message','recieve_message','m_t_student','messages'));
    }

}
