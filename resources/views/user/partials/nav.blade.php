<style>
  .dropdown-menu {
    left: inherit !important;
    right: 0px;
  }
</style>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">SocialNet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="{{ Request::routeIs('home') ? 'nav-item active' : 'nav-item' }}">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
      </li>
      <li class="{{ Request::routeIs('explore') ? 'nav-item active' : 'nav-item' }}">
        <a class="nav-link" href="{{ route('explore') }}">Explore</a>
      </li>
  </div>
  <div class="collapse navbar-collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="data:image;base64, {{ Auth::user()->photo }}" class="rounded-circle" alt="..." style="width: 25px; height: 25px;">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('profile', Auth::user()->username) }}">Profile</a>
              <a class="dropdown-item" href="{{ route('posts') }}">Posts</a>
              <a class="dropdown-item" href="{{ route('messages') }}">Messages</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
          </li>
        </ul>
    </div>
</nav>
