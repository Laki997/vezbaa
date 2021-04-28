  
@extends('layouts.app')

@section('title', 'News')


@section('content')
<h2>News</h2>
<ul>
  @foreach ($news as $new)
     <li><a href="{{route('new',['new' => $new->id])}}">Vest: {{$new->title}} Autor: {{$new->user->name}}</a></li> 
  @endforeach
</ul>

@if (session('status_message'))
    <div class="alert alert-success">
        {{ session('status_message') }}
    </div>
@endif

<div>{{$news->links()}}</div>

    <style>
  svg {
      width: 20px;
  }
</style>



  
@endsection