@extends('layouts.app')

@section('content')
  <form method="POST" action="/car/{{ $car->id }}">
    @csrf
    <!-- {{ method_field('PUT') }} -->
    @method('PUT')
    <input name="name" type="text" value="{{ $car->name }}">
    <input name="brand" type="text" value="{{ $car->brand }}">
    <input name="price" type="number" value="{{ $car->price }}">
    <button>Update</button>
  </form>
@endsection