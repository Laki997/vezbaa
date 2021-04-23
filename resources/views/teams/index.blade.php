  
@extends('layouts.app')

@section('title', 'Teams')


@section('content')
<h2>Teams</h2>
<ul>
  @foreach ($teams as $team)
     <li><a href="{{route('team', $team->id)}}">{{$team->name}}</a></li> 
  @endforeach
</ul>


<form action="{{route('createComment', ['team' => $team])}}" method="POST">
  @csrf

  
@endsection