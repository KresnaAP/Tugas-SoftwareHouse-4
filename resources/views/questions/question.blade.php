@extends('layouts/app')

@section('content')
    <div class="container">
        <h2>List of Questions</h2>

        <div class="list-group mt-3">
            @foreach($listq as $i)
                <a href='{{url("forum/$i->id")}}' class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$i->question}}</h5>
                        <small>Upload time : {{$i->created_at}}</small>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
