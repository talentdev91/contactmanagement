@extends('layouts.app-master')

@section('content')
<div>
  <h2>Create New Contact</h2>
  @if(count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form method="POST" action="{{route('contacts.store')}}">
    {{ csrf_field()}}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact')}}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection