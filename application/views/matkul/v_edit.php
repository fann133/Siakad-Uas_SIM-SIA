<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="container">
    <h1 class="<?php echo $header_class ?>"><?php echo $judul ?></h1>
    <?php echo $this->session->flashdata('notif'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel <?php echo $panel_class; ?>">
                <div class="panel-heading text-center"><strong><?php echo $judul1 ?></strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?= site_url($action) ?>" name="form" method="POST">
                        <div class="form-group">
                            <label for="nim" class="control-label col-sm-4">Kode MK :</label>
                            <div class="col-sm-3">
                                <input required class="form-control" name="kode" type="text" id="kode" value="<?= $data['kode_mk'] ?>" placeholder="Masukkan Kode Matkul" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama" class="control-label col-sm-4">Nama MK :</label>
                            <div class="col-sm-4">
                                <input required class="form-control" name="matkul" type="text" id="matkul" value="<?= $data['nama_mk'] ?>" placeholder="Masukkan Nama Matkul" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="angkatan" class="control-label col-sm-4">SKS :</label>
                            <div class="col-sm-2">
                                <input required class="form-control" name="jumlah" type="text" idmode="numeric" id="jumlah" value="<?= $data['sks_mk'] ?>" placeholder="SKS" />
                            </div>
                        </div>

						<div class="form-group">
                            <label for="jenis" class="control-label col-sm-4">Jenis MK :</label>
                            <div class="col-sm-2">
                                <select required class="form-control" name="jenis" id="jenis">
                                    <option value="" disabled <?php echo empty($data['jenis_mk']) ? 'selected' : ''; ?>>Jenis Matkul</option>
                                    <option value="wajib" <?php echo set_select('jenis', 'wajib', $data['jenis_mk'] == 'wajib'); ?>>Wajib</option>
                                    <option value="pilihan" <?php echo set_select('jenis', 'pilihan', $data['jenis_mk'] == 'pilihan'); ?>>Pilihan</option>
                                    <option value="khusus" <?php echo set_select('jenis', 'khusus', $data['jenis_mk'] == 'khusus'); ?>>Khusus</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="semester" class="control-label col-sm-4">Semester :</label>
                            <div class="col-sm-2">
                                <select required class="form-control" name="semester" id="semester">
                                    <option value="" disabled <?php echo empty($data['semester']) ? 'selected' : ''; ?>>Pilih semester</option>
                                    <option value="I" <?php echo set_select('semester', 'I', $data['semester_mk'] == 'I'); ?>>I</option>
                                    <option value="II" <?php echo set_select('semester', 'II', $data['semester_mk'] == 'II'); ?>>II</option>
                                    <option value="III" <?php echo set_select('semester', 'III', $data['semester_mk'] == 'III'); ?>>III</option>
                                    <option value="IV" <?php echo set_select('semester', 'IV', $data['semester_mk'] == 'IV'); ?>>IV</option>
                                    <option value="V" <?php echo set_select('semester', 'V', $data['semester_mk'] == 'V'); ?>>V</option>
                                    <option value="VI" <?php echo set_select('semester', 'VI', $data['semester_mk'] == 'VI'); ?>>VI</option>
                                    <option value="VII" <?php echo set_select('semester', 'VII', $data['semester_mk'] == 'VII'); ?>>VII</option>
                                    <option value="VIII" <?php echo set_select('semester', 'VIII', $data['semester_mk'] == 'VIII'); ?>>VIII</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <a class="btn btn-default" href="<?= site_url('Matkul') ?>">Kembali</a>
                                <input class="btn <?php echo $btn_class; ?>" type="submit" value="Simpan" />
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