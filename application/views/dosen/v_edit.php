<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="container">
    <h2 class="<?php echo $header_class ?>"><?php echo $judul ?></h2>
    <div class="row">
         <div class="col-xs-12">
             <?php echo $this->session->flashdata('notif'); ?>
            <div class="panel <?= $panel_class; ?>">
                <div class="panel-heading text-center"><strong><?php echo $judul1 ?></strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?= site_url($action) ?>" name="form" method="POST">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-4">NIDN :</label>
                            <div class="col-sm-3">
                                <input required class="form-control" name="nidn" type="text" id="nidn" value="<?= $data['nidn'] ?>" placeholder="Masukkan NIDN" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Nama Lengkap :</label>
                            <div class="col-sm-4">
                                <input required class="form-control" name="nama" type="text" id="nama" value="<?= $data['nama_dosen'] ?>" placeholder="Masukkan Nama Lengkap" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Telepon :</label>
                            <div class="col-sm-3">
                                <input required class="form-control" name="telepon" type="tel" id="telepon" value="<?= $data['telepon_dosen'] ?>" placeholder="Nomor Telepon" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Alamat :</label>
                            <div class="col-sm-4">
                                <textarea required class="form-control" name="alamat" id="alamat" rows="4" placeholder="Alamat Rumah"><?= $data['alamat_dosen'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <a class="btn btn-default btn-sm" href="<?= site_url('Dosen') ?>">Kembali</a>
                                <input class="btn btn-success" type="submit" value="Simpan" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>