@extends('layouts.app')
@section('content')

    <h1>Tutti i dettagli</h1>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Autore</th>
            <th>Slug</th>
        </tr>
        <tbody>
            <tr>
                 <td>{{$post->id}}</td>
                 <td><a href="{{route("admin.posts.show",$post->slug)}}">{{$post->title}}</a></td>
                <td>{{$post->body}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->slug}}</td>
            </tr>
        </tbody>

        <tr>
            
            <th>Autore</th>
            <th>Body</th>
        </tr>
        <tbody>
            
            @foreach ($post->comments as $comment)
            <td>{{$comment->name}}</td>
            <td>{{$comment->body}}</td>
           
        </tr>
        @endforeach
        <
    </tbody>
</table>
<a class="btn btn-success" href="{{route("admin.posts.index")}}">Home</a>
@endsection
            
                
            
            
            
           
            