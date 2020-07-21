@extends('layouts/app')

@section('content')
    <div class="container">
        <h3>Edit</h3>
        <p>{{$answer->question->question}}</p>

        <form action='{{url("/forum/answer/$answer->id")}}/update' method="POST">
            @csrf

            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea class="form-control" id="answer" name="answer" rows="3">{{$answer->answer}}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Post</button>
        </form>

    </div>
@endsection