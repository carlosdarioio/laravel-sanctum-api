@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts)>0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" alt="Madre" style="width:100%">
                    </div>
                    <div class="col-4">
                        <h3> <a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
                        <!--alola obtendiendo user directamente desde el  PostModel->belongsTo !!!-->
                        <small>Writte on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
                
            </div><br>
        @endforeach
        {{$posts->links()}}
    @else
    <p>Posts Not found</p>
    @endif
@endsection