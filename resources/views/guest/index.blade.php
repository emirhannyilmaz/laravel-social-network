<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SocialNet</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
      .login-container {
        margin-top: 5%;
        margin-bottom: 5%;
      }
      .login-form-1 {
        padding: 9%;
        /* background:#282726; */
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
      }
      .login-form-1 h3 {
        text-align: center;
        margin-bottom:12%;
        color:#fff;
      }
      .login-form-2 {
        padding: 9%;
        /* background: #f05837; */
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
      }
      .login-form-2 h3 {
        text-align: center;
        margin-bottom:12%;
        color: #fff;
      }
      .btnSubmit {
        font-weight: 600;
        width: 50%;
        color: #282726;
        background-color: #fff;
        border: none;
        border-radius: 1.5rem;
        padding:2%;
      }
    </style>
  </head>
  <body>
    <div class="container login-container">
      <div class="row">
        <div class="col-md-6 login-form-1 bg-primary">
          <h3>Login</h3>
          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="submit" class="btnSubmit" value="Login">
            </div>
            <div class="form-group">
              <a href="#" class="btnForgetPwd">Forget Password?</a>
            </div>
          </form>
        </div>
        <div class="col-md-6 login-form-2 bg-primary">
          <h3>Register</h3>
          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
              <input type="text" name="fullname" class="form-control" placeholder="Full Name">
            </div>
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="submit" class="btnSubmit" value="Register">
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
