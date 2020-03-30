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
                 <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->slug}}</td>
            </tr>

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
        </tbody>
        
     <form action="{{route("comment")}}" method="POST">
        @csrf
        @method("POST")
        
        <input class="form-control" type="text" name="name" placeholder="nome utente">
        <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button type="submit">Salva</button>
    </form>
        
@endsection