<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APPLICATION;?> | Login</title>
  <link rel="shortcut icon" href="favicon/bp.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="http://mddcdev.ilcs.co.id:3004/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://mddcdev.ilcs.co.id:3004/dist/css/AdminLTE.min.css">
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<body class="hold-transition register-page">
  <div class="mddc-overlay">
<div style="width: 300px;margin: 2% auto;">
  <div class="register-logo">
    <a href="#"><b><font color="black" style="font-size: 40px">Form Login</font></b></a>
  </div>

  <div class="register-box-body">  
	<div class="row">
		 
			<form action="<?php echo site_url('login/verify');?>" method="POST" autocomplete="off">
				<div class="col-md-12">
					<div class="form-group has-feedback"> 
						<label>Username</label>
						<span class="glyphicon glyphicon-user form-control-feedback" style="left:0"></span>
						<input type="text" class="form-control" name="username" placeholder="" value="" style="padding-left:30px;padding-right:10px" required="required">
					</div>
					<div class="form-group has-feedback">
						<label>Password</label>
						<span class="glyphicon glyphicon-lock form-control-feedback" style="left:0"></span>
						<input type="password" class="form-control" name="password" placeholder="" value="" style="padding-left:30px;padding-right:10px" required="required">
					</div>	
				<font color="red" style="font-size: 12px;"><b><?php echo $this->session->flashdata('pesan');?></b></font>	
				</div>
				<div class="col-md-6"> 
				<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
				</div>		
			</form>
		</div>
	</div>
</div>
</body>
</html>