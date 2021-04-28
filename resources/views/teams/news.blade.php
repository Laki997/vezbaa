 
@extends('layouts.app')

@section('title', 'News for team')


@section('content')
<h2>News for {{$team->name}}</h2>

<hr>


<!-- @foreach($team->news as $new)


<h3>Naslov vesti: {{$new->title}}</h3>
<br>
<h3>Test vesti: {{$new->content}}</h3>
<hr>

@endforeach -->


@foreach($news as $new)


<h3>Naslov vesti: {{$new->title}}</h3>
<br>
<h3>Test vesti: {{$new->content}}</h3>
<hr>

@endforeach



<br>
<div>{{$news->links()}}</div>
<br>
<style>
  svg {
      width: 20px;
  }
</style>
        @endsection


