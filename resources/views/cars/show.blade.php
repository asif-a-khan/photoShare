@extends('layouts.app')

@section('content')
  <p>{{ $car->name }}</p>
  <p>{{ $car->brand  }}</p>
  <p>$ {{ $car->price }}</p>
  <a href="/car/{{ $car->id }}/edit">Edit</a>
  <form action="/car/{{ $car->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Delete</button>
  </form>
@endsection