@extends('layouts/app')

@section('content')

<div class="container">
    <a href="{{url('/forum/create')}}" class="btn btn-primary">Add New Question</a>
    <div class="list-group mt-3">
        @foreach($question as $i)
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$i->question}}</h5>
                <small>Upload time : {{$i->created_at}}</small>
                <small>by : {{$i->user->username}}</small>
            </div>
        </a>
        @endforeach
    </div>
    
    
</div>

@endsection