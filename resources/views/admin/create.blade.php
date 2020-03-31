@extends('layouts.app')
@section('content')

    <form action="{{route("admin.posts.store")}}" method="POST">
        @csrf
        @method("POST")
        
        <input class="form-control" type="text" name="title" placeholder="titolo">
        <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
        <div class="form-group">
            <label for="tags">Tags</label>
            @foreach ($tags as $tag)
              <span>{{$tag->name}}</span>
              <input type="checkbox" name="tags[]" id="" value="{{$tag->id}}">
            @endforeach
        </div>
        <button type="submit">Salva</button>
    </form>

@endsection

