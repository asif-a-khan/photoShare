@extends('layouts.app')

@section('content')
  <form method="POST" action="/car">
    @csrf
    <input name="name" type="text">
    <input name="brand" type="text">
    <input name="price" type="number">
    <button>Submit</button>
  </form>
@endsection