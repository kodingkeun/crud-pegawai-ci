<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | CRUD PEGAWAI CI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/login">CRUD PEGAWAI <b>CI</b></a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <?php
          if ($this->session->flashdata('error') != '') {
              echo "<div class='alert alert-danger' role='alert'>";
              echo $this->session->flashdata('error');
              echo "</div>";
          }
      ?>

      <form action="<?= base_url('login/store'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="username" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
