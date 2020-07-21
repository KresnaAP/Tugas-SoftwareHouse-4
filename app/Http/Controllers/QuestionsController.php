<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;

class QuestionsController extends Controller
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
        $question=Question::orderByRaw('created_at DESC')->paginate(5);
        return view('questions/index',compact('question'));
    }

    public function showQuestion()
    {
        //
        $listq=Question::where('user_id', auth()->id())->orderByRaw('created_at DESC')->paginate(5);
        return view('questions/question',compact('listq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Question::create($request->all());
        $request->validate([
            "question" => "required",
            "detail_question" => "required",
        ]);
        Question::create([
            'question' => $request->question,
            'detail_question' => $request->detail_question,
            'user_id' => Auth::user()->id
        ]);
        return redirect('/forum')->with('status','Question Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
        Question::where('id',$question->id)
            ->update([
                'question' => $request->question,
                'detail_question' => $request->detail_question,
            ]);

        return redirect("/forum/$question->id")->with('status','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        Question::destroy($question->id);

        return redirect("/forum")->with('status','Success');
    }

    public function search(Request $request){
        $question=Question::where('question','like',"%$request->keyword%")
            ->orderByRaw('created_at DESC')
            ->paginate(5);

        return view('questions.index',compact('question'));
    }
}
