@extends('layouts.app')

 @section('content')
     <form action="{{route("admin.posts.update",$post)}}" method="POST">
        @csrf
        @method("PATCH")
        
        <input class="form-control" type="text" name="title" placeholder="titolo" value="{{$post->title}}">
        <textarea class="form-control" name="body" id="" cols="30" rows="10">{{$post->body}}</textarea>
        <div class="form-group">
            <label for="tags">Tags</label>
            @foreach ($tags as $tag)
              <span>{{$tag->name}}</span>
        <input type="checkbox" name="tags[]" id="" value="{{$tag->id}} " {{($post->tags->contains($tag->id)) ? "checked" : ""}}>
            @endforeach
        </div>
        <button type="submit">Salva</button>
    </form>
 @endsection

{}