  
@extends('layouts.app')

@section('title', 'Teams')


@section('content')
<h2>Teams</h2>
<ul>
  @foreach ($teams as $team)
     <li><a href="{{route('team', $team->id)}}">{{$team->name}}</a></li> 
  @endforeach
</ul>



  
@endsection