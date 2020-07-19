@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('forum')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" placeholder="Type your question here">
            </div>

            <div class="form-group">
                <label for="detail_question">Describe your question</label>
                <textarea class="form-control" id="detail_question" name="detail_question" rows="3"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
@endsection