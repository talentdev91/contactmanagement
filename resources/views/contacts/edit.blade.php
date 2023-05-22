@extends('layouts.app-master')

@section('content')
<div>
  <h2>Edit Contact</h2>
  @if(count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form method="POST" action="{{route('contacts.update', $contact->id)}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}">
    </div>
    <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="text" class="form-control" id="contact" name="contact" value="{{ $contact->contact }}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" value="{{ $contact->email }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection