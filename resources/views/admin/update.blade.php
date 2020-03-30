@extends('layouts.app')

 @section('content')
     <form action="{{route("admin.posts.update",$post)}}" method="POST">
        @csrf
        @method("PATCH")
        
        <input class="form-control" type="text" name="title" placeholder="titolo" value="{{$post->title}}">
        <textarea class="form-control" name="body" id="" cols="30" rows="10">{{$post->body}}</textarea>
        <button type="submit">Salva</button>
    </form>
 @endsection

