@extends('layouts.app-master')

@section('content')
<div>
  <h2>List of Contacts</h2>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{$contact->name}}</td>
        <td>{{$contact->contact}}</td>
        <td>{{$contact->email}}</td>
        <td>
          <a href="{{route('contacts.show', $contact->id)}}" class="btn btn-info">View</a>
          <a href="{{route('contacts.edit', $contact->id)}}" class="btn btn-primary">Edit</a>
          <form action="{{route('contacts.destroy', $contact->id)}}" style="display:inline" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{route('contacts.create')}}" class="btn btn-success">Add New Contact</a>
</div>
@endsection