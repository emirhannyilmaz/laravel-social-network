@extends('user.main')

@section('head')

<meta charset="utf-8">
<title>SocialNet | Explore</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@endsection

@section('content')

<h1 style="text-align: center;">Discover People</h1>

@foreach($users as $user)
@if($user->username != Auth::user()->username)
<div class="card mx-auto" style="width: 600px; margin: 30px;">
  <div class="card-body">
    <img src="data:image;base64, {{ $user->photo }}" class="rounded-circle" alt="..." style="width: 25px; height: 25px;">
    &nbsp
    <a href="{{ route('profile', $user->username) }}">{{ $user->fullname }}</a>
    <a style="color: gray;">{{ $user->username }}</a>
  </div>
</div>
@endif
@endforeach

@endsection
