<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HRMS</title>
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
<body class="hold-transition login-page" style="background-image:url('images/bk.jpg'); background-size:100%;">
<div class="login-box" style="background-color:#fff;">
  <div class="login-logo">
    <a href="index2.html"><b>HRMS</b> System</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><h3><center>Silahkan Login</center></h3></p>
	<p>User: putri -> Password : putri</p>
	<p>User: yuli -> Password : yuli</p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php
  if(isset($_POST["submit"])){
  session_start();
  include "config/anti_injection.php";
  $pengguna=anti_injection($_POST["username"]);
  $kata_kunci=anti_injection($_POST["password"]);
  $encryptPassword=md5($kata_kunci);

  $dataValid="YA";
  
  if(strlen(trim($pengguna))==0){
    echo "<font color='red'>*Username harus diisi</font></br>";
    $dataValid="TIDAK";
  }
  if(strlen(trim($kata_kunci))==0){
    echo "<font color='red'>*Password harus diisi</font></br>";
    $dataValid="TIDAK";
  }
  if((strlen(trim($pengguna))!=0)&&(strlen(trim($kata_kunci))!=0)){
  include "config/koneksi.php";
  $sql="select * from employeecredentials where EmployeeUserName='".$pengguna."' and EmployeePasswordEncryptor='".$encryptPassword."' limit 1";
  $hasil=mysqli_query($conn,$sql) or die('Gagal Akses.');
  $jumlah=mysqli_num_rows($hasil);
  if($jumlah > 0){
    $row=mysqli_fetch_assoc($hasil);
    $_SESSION["username"]=$row["EmployeeUserName"];
    $_SESSION["tipe"]=$row["EmployeeLoginType"];
    header("Location:media.php");
  }else{
    echo "<font color='red'>*Username atau password salah</font>";
    //echo "<input type='button' value='Kembali' onclick='self.history.back()'>";
  }}
}
?>

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
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
