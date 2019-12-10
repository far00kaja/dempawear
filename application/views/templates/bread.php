
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
						<h1><?=$folder?></h1>
						<?= var_dump($this->session->all_userdata())?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>"><?=$folder?></a></li>
              <li class="breadcrumb-item active"><?= $aktif?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
