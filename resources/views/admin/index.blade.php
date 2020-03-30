@extends('layouts.app')
@section('content')
<a class= "btn btn-outline-success" href="{{route("admin.posts.create")}}">crea un post</a>
    <h1>Tutti i post dell' admin</h1>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Autore</th>
        </tr>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                 <td>{{$post->id}}</td>
                 <td><a href="{{route("admin.posts.show",$post->slug)}}">{{$post->title}}</a></td>
                <td>{{$post->body}}</td>
                <td>{{$post->user->name}}</td>
                <td><a href="{{route("admin.posts.edit",$post)}}">Modifica</a></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection