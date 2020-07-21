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
                        
                        @if( Auth::user()->id === $question->user_id)
                            <form action='{{url("/forum/$question->id")}}' method="post" class="d-inline">
                                @method('patch')
                                @csrf
                                <button type="submit" class="btn btn-danger">Edit</button>
                            </form>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <form action='{{url("/forum/$question->id")}}' method="POST">
                @csrf
                @method('put')
                
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
                        @if(Auth::user()->id === $i->user_id)
                            <form action='{{url("/forum/answer/$i->id")}}' method="post" class="d-inline">
                                @method('patch')
                                @csrf
                                <button type="submit" class="btn btn-danger">Edit</button>
                            </form>
                        @endif
                    </div>    
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection