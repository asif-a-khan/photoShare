@extends('layouts.app')

@section('content')
  <h1>All cars</h1>
  <a href="/car/create">Create item</a>

  @foreach($cars as $car)
    <car-component
      user-id="{{ $car->user_id }}"
      car-name="{{ $car->name }}"
      car-brand="{{ $car->brand }}"
      car-price="{{ $car->price }}"
      car-slug="/car/{{ $car->id }}"
    ></car-component>
  @endforeach


@endsection

