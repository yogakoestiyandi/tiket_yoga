<!DOCTYPE html>
<html lang="en">
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= "{$title} - {$setting_aplikasi->nama}"; ?></title>
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

      <link rel="shortcut icon" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" type="image/x-icon">
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
      <!-- akbr custom -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/css/akbr_custom.css">
</head>
<div id="auth">

      <div class="container">
            <div class="row">
                  <div class="col-md-5 col-sm-12 mx-auto">
                        <div class="card pt-4">
                              <div class="card-body">
                                    <div class="text-center mb-5">
                                          <img src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" height="48" class='mb-4'>
                                          <h3><?= "{$setting_aplikasi->nama}"; ?></h3>
                                          <p>Silahkan isi dara diri.</p>
                                          <div class="text-left">
                                                <form action="<?php echo $action; ?>" method="post">
                                                      <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
                                                      <!-- <input type="hidden" class="form-control" name="id_penumpang" id="id_penumpang" placeholder="Id User" value="<?php echo $id_penumpang; ?>" /> -->
                                                      <div class="form-group">
                                                            <label for="varchar">Nama Awal <?php echo form_error('nama_awal') ?></label>
                                                            <input disabled type="text" class="form-control" name="nama_awal" id="nama_awal" placeholder="nama_awal" value="<?php echo $nama_awal; ?>" />
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="varchar">Nama Akhir <?php echo form_error('nama_akhir') ?></label>
                                                            <input disabled type="text" class="form-control" name="nama_akhir" id="nama_akhir" placeholder="nama_akhir" value="<?php echo $nama_akhir; ?>" />
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="varchar">Jens Kelamin <?php echo form_error('jens_kelamin') ?></label>
                                                            <input type="text" class="form-control" name="jens_kelamin" id="jens_kelamin" placeholder="Jens Kelamin" value="<?php echo $jens_kelamin; ?>" />
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="int">Nomor Hp <?php echo form_error('nomor_hp') ?></label>
                                                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Hp" value="<?php echo $nomor_hp; ?>" />
                                                      </div>
                                                      <input type="hidden" name="id_penumpang" value="<?php echo $id_penumpang; ?>" />
                                                      <div class="text-center"><button type="submit" class="btn btn-primary"><?php echo $button ?></button></div>
                                                      <!-- <a href="<?php echo site_url('penumpang') ?>" class="btn btn-default">Cancel</a> -->
                                                </form>
                                          </div>
                                          <!-- <div class="clearfix">
                                                <a href="<?= base_url('login'); ?>" class="btn btn-primary float-center" type="submit">Login</a>
                                          </div> -->
                                    </div>

                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>
<script src="<?= base_url(); ?>assets/js/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>

<script src="<?= base_url(); ?>assets/js/main.js"></script>
<script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>

<script>
      // sweetallert
      <?php
      if (isset($this->session->success)) { ?>
            alertify.set('notifier', 'position', 'center');
            Swal.fire(
                  'Good Job!',
                  '<?= $this->session->success; ?>',
                  'success'
            )

      <?php } elseif (isset($this->session->error)) { ?>
            alertify.set('notifier', 'position', 'center');
            Swal.fire(
                  'Oopss!',
                  '<?= $this->session->error; ?>',
                  'error'
            )
      <?php } ?>
</script>
</body>

</html>