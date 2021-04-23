  
@extends('layouts.app')

@section('title', 'Team')


@section('content')
<h2>Team</h2>

<h3>{{$team->name}}</h3>
<h3>{{$team->email}}</h3>
<h3>{{$team->address}}</h3>
<h3>{{$team->city}}</h3>

<hr>

<h1>Igraci tima</h1>

<hr>

<ul>

@foreach($team->players as $player)
<li><a href="{{route('player',[$team->id, $player->id])}}">{{$player->first_name}} {{$player->last_name}}</a></li>


@endforeach

</ul>

@endsection