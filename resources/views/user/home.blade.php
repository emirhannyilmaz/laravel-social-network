@extends('user.main')

@section('head')

<meta charset="utf-8">
<title>SocialNet | Home</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

@endsection

@section('content')

<div class="card mx-auto" style="width: 600px; margin: 50px;">
  <div class="card-body">
    <form action="{{ route('createPost') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group row">
        <div class="col-sm-12">
          <textarea class="form-control" name="content" rows="3" cols="45" placeholder="What do you think?"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="file" class="form-control-file" name="photo">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">Share</button>
        </div>
      </div>
    </form>
  </div>
</div>

@foreach($posts as $post)
<div class="card mx-auto" style="width: 600px; margin: 50px;">
  <div class="card-header">
    <a href="{{ route('profile', $post->author) }}">{{ $post->author }}</a>
  </div>
  <div class="card-body">
    @if($post->photo != null)
    <img src="data:image;base64, {{ $post->photo }}" class="card-img-top" alt="...">
    @endif

    <p class="card-text">{{ $post->content }}</p>
  </div>
</div>
@endforeach

@endsection
