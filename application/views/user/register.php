<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="<?= base_url("assets/img/logo.png") ?>" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        .login-dark {
          height: 100vh;
          background: #475d62 url(<?= base_url('assets/img/star-sky.jpg') ?>);
          background-size: cover;
          position: relative;
        }

        .login-dark form {
          max-width: 288px;
          width: 81%;
          background-color: #1e2833;
          padding: 36px;
          border-radius: 3.6px;
          transform: translate(-50%, -50%);
          position: absolute;
          top: 50%;
          left: 50%;
          color: #fff;
          box-shadow: 2.7px 2.7px 3.6px rgba(0,0,0,0.2);
        }

        .login-dark .illustration {
          text-align: center;
          padding: 9px 0 18px;
        }

        .login-dark form .form-control {
          background: none;
          border: none;
          border-bottom: 0.9px solid #434a52;
          border-radius: 0;
          box-shadow: none;
          outline: none;
          color: inherit;
          font-size: 90%;
        }

        .login-dark form .btn-primary {
          background: #214a80;
          border: none;
          border-radius: 3.6px;
          padding: 9.9px;
          box-shadow: none;
          margin-top: 23.4px;
          text-shadow: none;
          outline: none;
          font-size: 90%;
        }

        .login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
          background: #214a80;
          outline: none;
        }

        .login-dark form .forgot {
          display: block;
          text-align: center;
          font-size: 10.8px;
          color: #6f7a85;
          opacity: 0.9;
          text-decoration: none;
        }

        .login-dark form .forgot:hover, .login-dark form .forgot:active {
          opacity: 1;
          text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-dark">
        <?php if ($this->session->flashdata('success')): ?>
            <p style="color: green; font-size: 90%;"> <?php echo $this->session->flashdata('success'); ?> </p>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <p style="color: red; font-size: 90%;"> <?php echo $this->session->flashdata('error'); ?> </p>
        <?php endif; ?>

        <?php echo validation_errors(); ?>

        <form method="post" action="<?php echo site_url('registerr'); ?>">
            <div class="illustration">
                <img src="<?= base_url('assets/img/logo perpus.png'); ?>" alt="Login Illustration" style="width:90px;height:auto;"> 
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
            </div>

            <div class="form-group">
              <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
            </div>

            <div class="form-group">
              <input class="form-control" type="text" name="alamat" placeholder='Alamat'>
            </div>

            <div class="form-group">
              <input class="form-control" type="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
              <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
            </div>

            <button class="btn btn-primary btn-block" type="submit">Register</button>

            <a href="<?= base_url('loginuser') ?>" class="forgot">Sudah punya akun? Login</a>
        </form>
    </div>
</body>
</html>
