 
@extends('layouts.app')

@section('title', 'Player')


@section('content')
<h2>Player</h2>

<h3>{{$player->first_name}}</h3>
<h3>{{$player->last_name}}</h3>
<h3><a href="{{route('team',$player->team->id)}}">{{$player->team->name}}</a></h3>

@endsection
