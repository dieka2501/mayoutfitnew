<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Mayoutfit | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{!!config('app.url')!!}assets/dashboard/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!!config('app.url')!!}assets/dashboard/plugins/font-awesome/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!!config('app.url')!!}assets/dashboard/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{!!config('app.url')!!}assets/dashboard/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href=""><img src="{!!config('app.url')!!}assets/dashboard/dist/img/logo_full.png"></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{!!config('app.url')!!}public/admin/login" method="POST">
            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
             {{ csrf_field() }}
          <div class="form-group has-feedback">

            <input type="text" class="form-control" placeholder="Username" name='username'>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name='password'>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-7 col-md-offset-1">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name='remember' value='1'> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <!-- <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a> -->
        </div><!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{!!config('app.url')!!}assets/dashboard/plugins/jquery-libs/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{!!config('app.url')!!}assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{!!config('app.url')!!}assets/dashboard/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
