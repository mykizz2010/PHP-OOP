<?php
require_once 'main/init.php';
$errors = array();
$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}

if(Input::exists()){
	if(Token::check(Input::get('token'))) {

		$validator = new Validator();
        $validator->validate($_POST, [
        'username' => 'required|min:6|max:20|unique:users',
        'name' => 'required|min:6|max:20'
        ]);
        if($validator-> fails()){
        	foreach ($validator->errors() as $error) {
                array_push($errors, $error);
            }
        }else{
        	 $user = new User();
        	 $user = update([
        	 	'username' => Input::get('username'),
        	 	'name' => Input::get('name')
        	 	]);
        }
	}
}

 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Square |Update</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a ><b>Welcome! Please </b>Update Your Profile</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" id="username" name="username" value="<?php echo $user->data()->username;  ?>">
      </div>
      <div class="form-group has-feedback">
        <input type="name" class="form-control" id="name" name="name" value="<?php echo $user->data()->name;  ?>">
      </div>
        <!-- /.col -->
        <div class="col-xs-4">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat" value="">Update</button>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
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