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
    </table>
@endsection
            
           
            