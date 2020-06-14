@extends('user.main')

@section('head')

<meta charset="utf-8">
<title>SocialNet | Profile</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('content')

<div class="card mx-auto" style="width: 300px; margin: 30px;">
  <img src="data:image;base64, {{ $photo }}" class="card-img-top" alt="..." style="width: 300px; height: 300px;">

  @if($username == Auth::user()->username)
  <form id="form" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <input type="file" class="form-control-file" name="photo">
    </div>
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="form-group">
      <label for="fullname">Full Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="{{ $fullname }}">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $username }}">
    </div>
    <div class="form-group">
      <label for="biography">Biography</label>
      <textarea class="form-control" id="biography" name="biography" placeholder="Biography">{{ $biography }}</textarea>
    </div>
    <div class="form-group" style="text-align: center;">
      <button class="btn btn-primary" type="submit" name="update">Update</button>
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#followersModal">Followers</button>
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#followingModal">Following</button>
    </div>
  </form>
  @else
  <form>
    <div class="form-group" style="text-align: center;">
      <h6>{{ $fullname }}</h6>
      <h6 style="color: gray;">{{ $username }}</h6>
    </div>
    <div class="form-group">
      <p>{{ $biography }}</p>
    </div>
    <div class="form-group" style="text-align: center;">
      @if($isFollowing == false)
      <button id="{{ $username }}" class="btn btn-primary follow">Follow</button>
      @else
      <button id="{{ $username }}" class="btn btn-danger follow">Unfollow</button>
      @endif
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#followersModal">Followers</button>
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#followingModal">Following</button>
    </div>
  </form>
  @endif
</div>

<!-- Followers Modal -->
<div class="modal fade" id="followersModal" tabindex="-1" role="dialog" aria-labelledby="followersModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="list-group">
          @foreach($followers as $follower)
          <a href="{{ route('profile', $follower->follower_user) }}" class="list-group-item list-group-item-action">{{ $follower->follower_user }}</a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Following Modal -->
<div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="followingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Following</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="list-group">
          @foreach($followings as $following)
          <a href="{{ route('profile', $following->followed_user) }}" class="list-group-item list-group-item-action">{{ $following->followed_user }}</a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on("click", ".follow", function(e) {
      e.preventDefault();

      var username = $(this).attr("id");

      if ($(this).hasClass("btn-primary")) {
        $.ajax({
         type: 'POST',
         url: '/profile/follow',
         data: {
           followed_user: username
         },
         success: function(data) {
           // alert(data.success);
         }
        });

        $(this).removeClass("btn-primary").addClass("btn-danger");
        $(this).html('Unfollow');
      } else {
        $.ajax({
         type: 'POST',
         url: '/profile/unfollow',
         data: {
           unfollowed_user: username
         },
         success: function(data) {
           // alert(data.success);
         }
        });

        $(this).removeClass("btn-danger").addClass("btn-primary");
        $(this).html('Follow');
      }
    });
  });
</script>

@endsection('content')
