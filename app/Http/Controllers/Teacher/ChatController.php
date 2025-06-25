<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;



class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $students = DB::table('users')->orderBy('id', 'desc')->get();

        // $chat_list = Chat::select('user_id', DB::raw('COUNT(*) as id'))
        // ->orderBy('id', 'desc')->groupBy('user_id')->get();
        // $subjects= Subject::all();


        $query = User::query();
        if($request->ajax()){
            
            $users = $query->get();
            return response()->json(['users'=>$users]);
        }else{
            $students = DB::table('users')->orderBy('id', 'desc')->get();

            $chat_list = Chat::select('user_id', DB::raw('COUNT(*) as id'))
            ->orderBy('id', 'desc')->groupBy('user_id')->get();
            $subjects= Subject::all();

            return view('teacher.chat.index',compact('students','chat_list','subjects'));
        }


        // return view('teacher.chat.index',compact('students','chat_list','subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $store = new Chat();
        $store->user_id = $request->user_id;
        $store->teacher_id = auth()->user()->id;
        $store->message = $request->message;
        $store->chat_type = 'teacher';
        $store->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $students = DB::table('users')
        ->orderBy('id', 'desc')->get();

        // $chat_list = Chat::select('user_id', DB::raw('COUNT(*) as id'))
        // ->groupBy('user_id')
        // ->orderBy('id', 'asc')
        // ->get();
        $chat_list = Chat::select('user_id', DB::raw('COUNT(*) as id'))
        ->orderBy('id', 'desc')
                 ->groupBy('user_id')
                 ->get();

        // $users = User::all();
        $chat = User::find($id);
        $messages = Chat::where('teacher_id','=',auth()->user()->id)
        ->where('user_id','=',$chat->id)->get();
        return view('teacher.chat.show',compact('chat','messages','students','chat_list'));

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
    public function destroy(Chat $chat)
    {
        $delete =$chat->delete();
        if($delete){
            return redirect()->back();
        }else{
            return redirect()->back();
            // return redirect('my-account/product');
        }
    }
}
