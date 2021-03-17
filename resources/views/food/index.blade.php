@extends('layouts.app')

@section('content')
<h1>All foods</h1>
<a href="/food/create">Create item</a>

  @foreach($foods as $food)
    <p>{{ $food->name }}</p>
    <p>$ {{ $food->price  }}</p>
    <p>{{ $food->description }}</p>
    <a href="/food/{{ $food->id }}">Show</a>
  @endforeach


@endsection