@extends('layouts.app')

@section('content')
<div class="">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h3>{{$post->title}}</h3>
            </div>
            <div class="card-body">
                <img style="width:100%" src="{{ asset('storage/profileImages/' . $post->image) }}">
                <br><br>
                <div>
                    {{$post->body}}
                </div>
                <hr>
                <small>Written on {{$post->created_at}}</small>
                <hr>
                <a href="/" class="btn btn-default">Go Back</a>
            </div>  
        </div>
    </div>
</div>
@endsection
