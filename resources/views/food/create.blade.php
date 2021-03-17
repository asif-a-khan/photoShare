@extends('layouts.app')

@section('content')
  <form method="POST" action="/food">
    @csrf
    <input name="name" type="text">
    <input name="price" type="text">
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <button>Submit</button>
  </form>
@endsection