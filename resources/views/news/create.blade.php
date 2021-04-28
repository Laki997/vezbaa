@extends('layouts.app')

@section('title','Create a news')

@section('content')

<form action="/news" method="POST">
   @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror id="title" aria-describedby="emailHelp" placeholder="Enter title">
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5"></textarea>
  </div>
    @error('content')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
 
       <div class="form-check form-check-inline" >
    
       @foreach($teams as $team)
      <input type="checkbox" class="btn-check" id="tag-{{$team->id}}" checked autocomplete="off" name="teams[]" value="{{$team->id}}"> 
      <label class="btn btn-outline-secondary" for="tag-{{$team->id}}">{{$team->name}}</label>
    @error('teams')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
  
    @endforeach
      </div>
      <br>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection