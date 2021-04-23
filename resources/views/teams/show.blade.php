  
@extends('layouts.app')

@section('title', 'Team')


@section('content')
<h2>Team</h2>

<h3>{{$team->name}}</h3>
<h3>{{$team->email}}</h3>
<h3>{{$team->address}}</h3>
<h3>{{$team->city}}</h3>

<hr>

<h3>Comments</h3>

<form action="{{route('createComment', ['team' => $team])}}" method="POST">
  @csrf
  
  <div class="form-group">
    <label for="content">Add comment:</label>
    <textarea
      class="form-control @error('content') is-invalid @enderror"
      id="content"
      rows="2"
      name="conent"
    ></textarea>
    @error('content')
      <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<h1>Igraci tima</h1>

<hr>

<ul>

@foreach($team->players as $player)
<li><a href="{{route('player',[$team->id, $player->id])}}">{{$player->first_name}} {{$player->last_name}}</a></li>


@endforeach

</ul>

@endsection