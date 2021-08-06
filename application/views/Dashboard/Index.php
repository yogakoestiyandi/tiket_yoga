<?php
$pemilik = 33;
$admin = 1;
$kasir = 32;
$penumpang = 2;
?>

<?php if ($this->ion_auth->in_group($pemilik)) : ?>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah User yang terdaftar</span>
          <span class="info-box-number">18.942 orang</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Total User
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Transaksi Penjualan Tiket Selesai</span>
          <span class="info-box-number">20.861</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Total Seluruh Transaksi Tiket Selesai
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.info-box-content -->
  </div>
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
        </ul>
        <center>
          <h2><b>PT KAPAL FERRY IHAN BATAK</b></h2>
          <p></p>
        </center>
        <div class="text-center">
          <center>
            <img src="<?= base_url('assets/'); ?>img/PAK LUHUT.png" class="img-responsive" width="55%" alt="User Image"></img>
        </div>
        </center>
    </section>
    </section>

  </div>
<?php endif; ?>

<?php if ($this->ion_auth->in_group($admin)) : ?>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah User yang terdaftar</span>
          <span class="info-box-number">18.942 orang</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Total User
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Transaksi Penjualan Tiket Selesai</span>
          <span class="info-box-number">20.861</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Total Seluruh Transaksi Tiket Selesai
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.info-box-content -->
  </div>
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
        </ul>
        <center>
          <h2><b>PT KAPAL FERRY IHAN BATAK</b></h2>
          <p></p>
        </center>
        <div class="text-center">
          <center>
            <img src="<?= base_url('assets/'); ?>img/PAK LUHUT.png" class="img-responsive" width="55%" alt="User Image"></img>
        </div>
        </center>
    </section>
    </section>

  </div>
<?php endif; ?>

<?php if ($this->ion_auth->in_group($kasir)) : ?>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah User yang terdaftar</span>
          <span class="info-box-number">18.942 orang</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Total User
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Transaksi Penjualan Tiket Selesai</span>
          <span class="info-box-number">20.861</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Total Seluruh Transaksi Tiket Selesai
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.info-box-content -->
  </div>
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
        </ul>
        <center>
          <h2><b>PT KAPAL FERRY IHAN BATAK</b></h2>
          <p></p>
        </center>
        <div class="text-center">
          <center>
            <img src="<?= base_url('assets/'); ?>img/PAK LUHUT.png" class="img-responsive" width="50%" alt="User Image"></img>
        </div>
        </center>
    </section>


    </section>

  </div>
<?php endif; ?>

<?php if ($this->ion_auth->in_group($penumpang)) : ?>
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
        </ul>
        <center>
          <h2><b>SELAMAT DATANG DI PEMESANAN TIKET KAPAL FERRY IHAN BATAK</b></h2>
          <p></p>
        </center>
        <left>
          <h4> <b>
              < < < < Silahkan Pesan tiketmu sekarang! </b>
          </h4>
          <p></p>

        </left>
        <div class="text-center">
          <center>
            <img src="<?= base_url('assets/'); ?>img/kapal.gif" class="img-responsive" width="60%" alt="User Image"></img>
        </div>
        </center>
    </section>


    </section>

  </div>
<?php endif; ?>