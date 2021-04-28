 
@extends('layouts.app')

@section('title', 'Single news')


@section('content')
<h2>Single news</h2>

<h3>{{$new->title}}</h3>

<h4>Vest se odnosi na sledece timove:</h4>
@foreach($new->teams as $team)

<h3><a href="{{route('teamNews',['new' => $new->id, 'team'=> $team->id])}}">{{$team->name}}</a> </h3>

@endforeach

@endsection

 
