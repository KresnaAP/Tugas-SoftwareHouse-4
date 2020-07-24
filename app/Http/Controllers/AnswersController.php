<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Answer;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function showAnswer()
    {
        //
        $lista=Answer::where('user_id', auth()->id())->orderByRaw('created_at DESC')->paginate(5);
        return view('answers/answer',compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store($question_id,Request $request)
    {
        $request->validate([
            "answer" => "required",
        ]);
        Answer::create([
            'answer' => $request->answer,
            'question_id' => $question_id,
            'user_id' => Auth::user()->id
        ]);
        return redirect("/forum/$question_id")->with('status','Answer Posted Successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
        return view('answers.edit',compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
        $validator = Validator::make($request->all(), [
            "editanswer" => "required",
        ]);

        if ($validator->fails()) {
            return redirect("/forum/$answer->question_id")
                        ->withErrors($validator)
                        ->with('status','Update unsuccessfull');
        }
        Answer::where('id',$answer->id)
        ->update([
            'answer' => $request->editanswer,
        ]);

        return redirect("/forum/$answer->question_id")->with('status','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
        $getid=$answer->question_id;
        Answer::destroy($answer->id);

        return redirect("/forum/$getid")->with('status','Deleted Successfully');
    }
}
