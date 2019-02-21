@extends('master')

@section('title', 'workflow')

@section('content')
    <h1>{{$document->title}}</h1>
    <p>{{$document->body}}</p>

    <hr>
    <h2>Правки</h2>
    @foreach($document->edit as $user)
    <p>{{$user->name}} - {{$user->pivot->updated_at->diffForHumans()}}</p>
    @endforeach
@endsection