@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Photo Sharing Feed</h1>
    

    @foreach($images as $image)
        <image-component 
            url="{{ asset('storage/'.$image->name) }}" 
            user-name="{{ $image->user_name }}" 
            time-stamp="{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}"
        >
        </image-component>
    @endforeach
</div>
@endsection


<!-- User should be able to upload png/jpg/jpeg images. -->
<!-- User should see all uploaded images in the dashboard. -->