@extends('user.main')

@section('head')

<meta charset="utf-8">
<title>SocialNet | Posts</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('content')

@foreach($posts as $post)
<div class="card mx-auto" style="width: 600px; margin: 50px;">
  <div class="card-header">
    {{ $post->author }}
    <a href="#" id="{{ $post->id }}" class="float-right delete" style="color: red;">Delete</a>
  </div>
  <div class="card-body">
    @if($post->photo != null)
    <img src="data:image;base64, {{ $post->photo }}" class="card-img-top" alt="...">
    @endif
    <p class="card-text">{{ $post->content }}</p>
  </div>
</div>
@endforeach

<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on('click', '.delete', function(e) {
      e.preventDefault();

      var mid = $(this).attr('id');

      $.ajax({
       type: 'DELETE',
       url: '/posts/delete',
       data: {
         id: mid
       },
       success: function(data) {
         //alert(data.success);
       }
      });

      $(this).parents('.card').hide();
    })
  });
</script>

@endsection
