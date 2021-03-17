@extends('layouts.app')

@section('content')
  <form method="POST" action="/food/{{ $food->id }}">
    @csrf
    <!-- {{ method_field('PUT') }} -->
    @method('PUT')
    <input name="name" type="text" value="{{ $food->name }}">
    <input name="price" type="text" value="{{ $food->price }}">
    <textarea name="description" id="description" cols="30" rows="10">{{ $food->description }}</textarea>
    <button>Update</button>
  </form>
@endsection