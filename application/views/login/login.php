
<div class="login-box">
  <div class="login-logo">
		<img src="<?php echo base_url()?>assets/dempa.jpg" height="40" width="40">
    <a href="../../index2.html"><b>Dempa</b>Wear</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login </p>
      <?= $this->session->flashdata('message');?>

      <form action="<?= base_url('login'); ?>" method="post">
           <?= form_error('email','<small class="text-danger pl-2">','</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Your Email" name="email" value="<?= set_value('email');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
           <?= form_error('password','<small class="text-danger pl-2">','</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="<?= base_url('login/register'); ?>" class="text-center">Daftar Baru</a>
      </p>
      <p class="mb-1">
        <a href="<?= base_url()?>">Kembali</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
