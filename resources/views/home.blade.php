@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p>Hello, {{ $user->name }}</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="/upload" enctype="multipart/form-data">
                        @csrf
                        <label>Upload image</label>
                        <input id="image" type="file" name="image">
                        <button type="submit">Submit</button>
                    </form>

                    <hr>
                    <h1>User's pictures</h1>

                    <div class="row">
                        @foreach($images as $image)
                        <div class="col-md-4">
                            <image-component 
                                url="{{ asset('storage/'.$image->name) }}" 
                                user-name="{{ $user->name }}" 
                                time-stamp="{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}"
                            >
                            </image-component>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
