@extends('layouts.app-master')

@section('content')
<div>
  <h2>Contact Details</h2>
  <p><strong>ID:</strong> {{ $contact->id }}</p>
  <p><strong>Name:</strong> {{ $contact->name }}</p>
  <p><strong>Contact:</strong> {{ $contact->contact }}</p>
  <p><strong>Email:</strong> {{ $contact->email }}</p>
  <div class="btn-group">
    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-info">Edit</a>
    <form action="{{route('contacts.destroy', $contact->id)}}" style="display:inline" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
    </form>
  </div>
</div>
@endsection