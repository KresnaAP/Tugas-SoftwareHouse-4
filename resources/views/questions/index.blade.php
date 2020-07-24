@extends('layouts/app')

@section('content')
    <div class="container mt-3">
        <a href="{{url('/forum/create')}}" class="btn btn-primary d-inline">Add New Question</a>

        <form method="post" action='{{url("/forum/search")}}' class="d-inline form-inline ml-5">
            @csrf
            <input type="text" class="form-control w-50 @error('keyword') is-invalid @enderror" id="keyword" name="keyword" placeholder="Keyword">

            <button type="submit" class="btn btn-success ml-2">Search</button>
        </form>
        @if (session('status'))
            <div class="alert alert-warning mt-3">
                {{ session('status') }}
            </div>
        @endif

        <div class="list-group mt-4">
            @foreach($question as $i)
            <a href='{{url("forum/$i->id")}}' class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$i->question}}</h5>
                    <small>Upload : {{$i->created_at}} - Edited : {{$i->updated_at}}</small>
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
