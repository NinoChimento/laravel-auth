@extends('layouts.app')
@section('content')
    <form action="{{route("admin.posts.store")}}" method="POST">
        @csrf
        @method("POST")
        
        <input class="form-control" type="text" name="title" placeholder="titolo">
        <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
        <button type="submit">Salva</button>
    </form>

@endsection

