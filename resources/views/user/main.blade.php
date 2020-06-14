<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @yield('head')
  </head>
  <body>
    @include('user.partials.scripts')
    @include('user.partials.nav')
    @yield('content')
    @include('user.partials.footer')
  </body>
</html>
