  
@extends('layouts.app')

@section('title', 'Team')


@section('content')
<h2>Team </h2>

<h3>Tim: {{$team->name}}</h3>
<h3>Adresa: {{$team->address}}</h3>
<h3>Grad: {{$team->city}}</h3>

<br>
<hr>

@foreach($team->news as $new)
<li><a href="{{route('team',['team' =>$team->id, 'new' => $new->id])}}">{{$team->name}}</a></li>

@endforeach



<hr>

<h3>Comments</h3>
<hr>

<ul>

@foreach($team->comments as $comment)
<li>{{$comment->content}}</li>

@endforeach
</ul>


<form action="{{route('createComment', ['team' => $team])}}" method="POST">
  @csrf
  
  <div class="form-group">
    <label for="content">Add comment:</label>
    <textarea
      class="form-control @error('content') is-invalid @enderror"
      id="content"
      rows="2"
      name="content"
    ></textarea>
    @error('content')
      <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <br>
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