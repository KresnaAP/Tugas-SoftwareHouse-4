@extends('layouts/app')

@section('content')
    <div class="container">
        <a href="{{url('/forum/create')}}" class="btn btn-primary">Add New Question</a>

        <form method="post" action='{{url("/forum/search")}}' class="d-inline ml-3">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Keyword">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
        </form>

        <div class="list-group mt-3">
            @foreach($question as $i)
            <a href='{{url("forum/$i->id")}}' class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$i->question}}</h5>
                    <small>Upload time : {{$i->created_at}}</small>
                    <small>by : {{$i->user->username}}</small>
                </div>
            </a>
            @endforeach
            <div class="mt-3">
                {{ $question->links() }}
            </div>
        </div>
    </div>
@endsection
