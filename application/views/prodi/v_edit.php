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
                            <label class="control-label col-sm-4">Kode Prodi :</label>
                            <div class="col-sm-3">
                                <input required class="form-control" name="kode" type="text" id="kode" minlength="5" maxlength="5" value="<?= $data['kode_prodi'] ?>" placeholder="Masukkan Kode Prodi" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Nama Prodi :</label>
                            <div class="col-sm-4">
                                <input required class="form-control" name="nama" type="text" id="nama" value="<?= $data['nama_prodi'] ?>" placeholder="Masukkan Nama Prodi" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-4">Fakultas :</label>
                            <div class="col-sm-4">
                                <input required class="form-control" name="fakultas" type="text" id="fakultas" value="<?= $data['fakultas'] ?>" placeholder="Masukkan Nama Fakultas" />
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <label class="control-label col-sm-4">Ketua Prodi :</label>
                            <div class="col-sm-4">
                                <input required class="form-control" name="ketua" id="ketua" rows="4" placeholder="Ketua Prodi" value="<?= $data['ketua_prodi'] ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <a class="btn btn-default btn-sm" href="<?= site_url('Prodi') ?>">Kembali</a>
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