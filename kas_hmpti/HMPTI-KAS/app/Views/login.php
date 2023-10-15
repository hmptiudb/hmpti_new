<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Kas | <?= $title; ?></title>

  <link rel="icon" type="image/x-icon" href="https://hmpti.udb.ac.id/assets/img/logo.png?1624943673">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url('/login'); ?>"><b>LOGIN</b> BENDAHARA</a>
    </div>
    <!-- /.login-logo -->

    <div class="card">
      <div class="card-body login-card-body">
        <form action="<?= base_url('/login/cek_login'); ?>" method="post">
          <?= csrf_field(); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= validation_show_error('email') ? 'is-invalid' : ''; ?>" placeholder="Email" name="email" value="<?= old('email'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= validation_show_error('email') ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control <?= validation_show_error('password') ? 'is-invalid' : ''; ?>" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= validation_show_error('password') ?>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      let msg = "<?= session()->getFlashData('msg'); ?>";
      if (msg) {
        let pesan = msg.split('#');
        Swal.fire({
          position: 'top-end',
          toast: true,
          icon: pesan[0],
          title: pesan[1],
          showConfirmButton: false,
          timer: 4000
        });
      }
    });
  </script>
</body>

</html>