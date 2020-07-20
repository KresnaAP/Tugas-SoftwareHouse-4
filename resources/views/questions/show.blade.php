@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$question->question}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$question->created_at}} Author:{{$question->user->username}}</h6>
                        <p class="card-text">{{$question->detail_question}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <form action='{{$question->id}}' method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="question_id" value="{{$question->id}}">
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="3"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
            </div>
        </div>
        
        @foreach($question->answers as $i)
        <div class="row">
            <div class="col">
                <div class="card text-right">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$i->created_at}} by:{{$i->user->username}}</h6>
                        <p class="card-text">{{$i->answer}}</p>
                    </div>    
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection