 
@extends('layouts.app')

@section('title', 'News for team')


@section('content')
<h2>News for team</h2>

<hr>


@foreach($team->news as $new)


<h3>Naslov vesti: {{$new->title}}</h3>
<br>
<h3>Test vesti: {{$new->content}}</h3>
<hr>

@endforeach

@endsection