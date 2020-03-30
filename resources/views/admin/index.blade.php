@extends('layouts.app')
@section('content')
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
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->user->name}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection