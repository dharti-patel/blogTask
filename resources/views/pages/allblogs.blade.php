@extends('layouts.app')

@section('content')
<div class="">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h3>Posts</h3>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card-body">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="well">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img style="width:100%" src="{{ asset('storage/profileImages/' . $post->image) }}">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
                                    <p>@php echo substr($post->body,0,20); @endphp</P>
                                    <small>Written on {{$post->created_at}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No posts found</p>
                @endif
            </div>  
        </div>
    </div>
</div>
@endsection
