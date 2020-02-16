<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{site('name')}} - {{__('site.login')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{asset('admin')}}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin')}}/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <b>{{site('name')}}</b>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <h5>{{__('site.pass_reset_brief')}}</h5>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            @if(count($errors))
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        - {{$error}} <br>
                    @endforeach
                </div>
            @endif
        <form action="{{route('password.email')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('site.pass_reset')}}</button>
                </div><!-- /.col -->
            </div>
        </form>
        <hr>
        <a href="{{route('login')}}">{{__('site.login')}}</a><br>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<!-- jQuery 2.1.4 -->
<script src="{{asset('admin')}}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.4 -->
<script src="{{asset('admin')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('admin')}}/plugins/iCheck/icheck.min.js"></script>
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
