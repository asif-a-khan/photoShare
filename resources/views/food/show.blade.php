@extends('layouts.app')

@section('content')
  <p>{{ $food->name }}</p>
  <p>$ {{ $food->price  }}</p>
  <p>{{ $food->description }}</p>
  <a href="/food/{{ $food->id }}/edit">Edit</a>
  <form action="/food/{{ $food->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Delete</button>
  </form>
@endsection