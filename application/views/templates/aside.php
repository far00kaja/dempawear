
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/dempa.jpg'); ?>" alt="Dempa Wear" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dempa Wear</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  //= $user['email'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact text-sm" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
         <!-- <li class="nav-item has-treeview">
              <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
                <p> Beranda
                
             </p>
            </a>
          </li> -->
         <!-- <li class="nav-item has-treeview">
              <a href="<?= base_url('admin/transaksi')?>" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
                <p> Transaksi
                
             </p>
            </a>
					</li> -->
					<li class="nav-item has-treeview 
				 <?php if($this->uri->segment(3)=="databarang" or 
								 (($this->uri->segment(2)=="barang") and  ($this->uri->segment(3)=="add")) or 
								 (($this->uri->segment(2)=="barang") and  ($this->uri->segment(3)=="edit")) or 
								 (($this->uri->segment(2)=="bahan") and  
								 ($this->uri->segment(3)=="editDetail" or $this->uri->segment(3)=="addDetail" or $this->uri->segment(3)=="add" or $this->uri->segment(3)=="edit" or $this->uri->segment(3)=="history" ) ) or 
								 (($this->uri->segment(2)=="konsumen") and  
								 ($this->uri->segment(3)=="add" or $this->uri->segment(3)=="edit" or $this->uri->segment(3)=="history" ) ) or 
								 $this->uri->segment(3)=="databahan" or 
								 $this->uri->segment(3)=="datasupplier" or 
								 $this->uri->segment(3)=="datakonsumen" or
								 (($this->uri->segment(2)=="supplier") and  
									($this->uri->segment(3)=="add" or $this->uri->segment(3)=="edit" ) )
								 
								 ) { echo "menu-open";}?> >">
            <a href="#" class="nav-link  ">
              <i class="nav-icon fa fa-suitcase "></i>
              <p>Menu Master
                
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
								<a href="<?= base_url('admin/barang/databarang')?>" class="nav-link
								<?php if($this->uri->segment(3)=="databarang" or 
								(($this->uri->segment(2)=="barang") and ($this->uri->segment(3)=="add")) or
								(($this->uri->segment(2)=="barang") and ($this->uri->segment(3)=="edit"))
								 ){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('admin/bahan/databahan')?>" class="nav-link
								<?php if($this->uri->segment(3)=="databahan" or 
								(($this->uri->segment(2)=="bahan") and ($this->uri->segment(3)=="add")) or
								(($this->uri->segment(2)=="bahan") and  
								 ($this->uri->segment(3)=="editDetail" or $this->uri->segment(3)=="addDetail" or $this->uri->segment(3)=="add" or $this->uri->segment(3)=="edit" or $this->uri->segment(3)=="history" ) )
								
								){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bahan Baku</p>
                </a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('admin/konsumen/datakonsumen')?>" class="nav-link
								<?php if(($this->uri->segment(3)=="datakonsumen") or
														(($this->uri->segment(2)=="konsumen") and  
								 ($this->uri->segment(3)=="add" or $this->uri->segment(3)=="edit" or $this->uri->segment(3)=="history" ) )){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Konsumen</p>
                </a>
              </li>
							<li class="nav-item">
								<a href="<?= base_url('admin/supplier/datasupplier')?>" class="nav-link
								<?php if($this->uri->segment(3)=="datasupplier" or 
								(($this->uri->segment(2)=="supplier") and ($this->uri->segment(3)=="add")) or
								(($this->uri->segment(2)=="supplier") and  
								 ($this->uri->segment(3)=="add" or $this->uri->segment(3)=="edit" or $this->uri->segment(3)=="history" ) )
								
								){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Supplier</p>
                </a>
              </li>
                </ul>
              </li>
							<li class="nav-item has-treeview 
				 <?php if($this->uri->segment(3)=="pembelianbarang" or $this->uri->segment(3)=="pemesananbahanbaku" or $this->uri->segment(3)=="laporanpembelian" ){ echo "menu-open";}?> >">
            <a href="#" class="nav-link  ">
              <i class="nav-icon fa fa-suitcase "></i>
              <p>Menu Pembelian
                
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
								<a href="<?= base_url('admin/bahan/pemesananbahanbaku')?>" class="nav-link
								<?php if($this->uri->segment(3)=="pemesananbahanbaku"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pemesanan Bahan Baku</p>
                </a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('admin/bahan/pembelianbarang')?>" class="nav-link
								<?php if($this->uri->segment(3)=="pembelianbarang"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pembelian Barang</p>
                </a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('admin/bahan/laporanpembelian')?>" class="nav-link
								<?php if($this->uri->segment(3)=="laporanpembelian"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Pembelian</p>
                </a>
              </li>
							
                </ul>
              </li>
							<li class="nav-item has-treeview 
				 <?php if($this->uri->segment(3)=="ftransaksipenjualan" or $this->uri->segment(3)=="dtransaksipenjualan" or $this->uri->segment(3)=="dtransaksipembayaran"  or $this->uri->segment(3)=="laporanpenjualan" ){ echo "menu-open";}?> >">
            <a href="#" class="nav-link  ">
              <i class="nav-icon fa fa-suitcase "></i>
              <p>Menu Penjualan
                
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
								<a href="<?= base_url('admin/transaksi/ftransaksipenjualan')?>" class="nav-link
								<?php if($this->uri->segment(3)=="ftransaksipenjualan"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Transaksi Penjualan</p>
                </a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('admin/transaksi/dtransaksipenjualan')?>" class="nav-link
								<?php if($this->uri->segment(3)=="dtransaksipenjualan"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Transaksi Penjualan</p>
                </a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('admin/transaksi/dtransaksipembayaran')?>" class="nav-link
								<?php if($this->uri->segment(3)=="dtransaksipembayaran"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Transaksi Pembayaran</p>
                </a>
              </li>
							
							<li class="nav-item">
								<a href="<?= base_url('admin/transaksi/laporanpenjualan')?>" class="nav-link
								<?php if($this->uri->segment(3)=="laporanpenjualan"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
							
                </ul>
              </li>
							<li class="nav-item has-treeview 
				 <?php if($this->uri->segment(3)=="fproduksi" or $this->uri->segment(3)=="dproduksi" or $this->uri->segment(2)=="catalog" ){ echo "menu-open";}?> >">
            <a href="#" class="nav-link  ">
              <i class="nav-icon fa fa-suitcase "></i>
              <p>Data Produksi
                
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
								<a href="<?= base_url('admin/produksi/fproduksi')?>" class="nav-link
								<?php if($this->uri->segment(3)=="fproduksi"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Produksi</p>
                </a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('admin/produksi/dproduksi')?>" class="nav-link
								<?php if($this->uri->segment(3)=="dproduksi"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Produksi</p>
                </a>
							</li>
													
                </ul>
							</li>
							<li class="nav-item has-treeview">
              <a href="<?= base_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
                <p> Logout
                
             </p>
            </a>
          </li>
				             
							<!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Member
                
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi </p>
                </a>
              </li>
              
              </ul>
          </li>
			      
					<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Laporan
                
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan </p>
                </a>
              </li> -->
              
							</ul>
							
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
