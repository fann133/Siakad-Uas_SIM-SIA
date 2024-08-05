<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<div class="container">
    <h2 class="<?php echo $header_class ?>"><?php echo $judul ?></h2>
    <?php echo $this->session->flashdata('notif'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel <?php echo $panel_class; ?>">
                <div class="panel-heading text-center"><strong><?php echo $judul1 ?></strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?= site_url($action) ?>" name="form" method="POST">

                        <div class="form-group">
                            <label for="nim" class="control-label col-sm-4">NIM : </label>
                            <div class="col-sm-3">
                                <input required class="form-control" name="nim" type="text" inputmode="numeric" id="nim" value="<?= $data['nim'] ?>" placeholder="Masukkan NIM" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama" class="control-label col-sm-4">Nama Lengkap:</label>
                            <div class="col-sm-4">
                                <input required class="form-control" name="nama" type="text" id="nama" value="<?= $data['nama_mhs'] ?>" placeholder="Masukkan Nama Lengkap" />
                            </div>
                        </div>

                        <div class="form-group">
                <label for="prodi_id" class="control-label col-sm-4">Pilih Prodi:</label>
                <div class="col-sm-4">
                    <select name="prodi_id" id="prodi_id" class="form-control">
                        <option value="" disabled selected>Pilih Prodi</option>
                        <?php foreach ($prodi_list as $prodi): ?>
                            <option value="<?php echo $prodi['id_prodi']; ?>" <?php echo ($data['prodi_id'] == $prodi['id_prodi']) ? 'selected' : ''; ?>>
                                <?php echo $prodi['nama_prodi']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
                  
                        <div class="form-group">
                            <label for="angkatan" class="control-label col-sm-4">Angkatan:</label>
                            <div class="col-sm-2">
                                <input required class="form-control" name="angkatan" type="text" inputmode="numeric" id="angkatan" value="<?= $data['angkatan'] ?>" placeholder="Tahun Masuk" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lahir" class="control-label col-sm-4">Tanggal Lahir:</label>
                            <div class="col-sm-2">
                                <input required class="form-control" name="lahir" type="date" id="lahir" placeholder="Isi Tanggal Lahir" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="kelamin" class="control-label col-sm-4">Jenis Kelamin:</label>
                            <div class="col-sm-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="kelamin" value="Laki-laki" <?php echo set_radio('kelamin', 'Laki-laki', $data['kelamin_mhs'] == 'Laki-laki'); ?> required /> Laki-laki
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="kelamin" value="Perempuan" <?php echo set_radio('kelamin', 'Perempuan', $data['kelamin_mhs'] == 'Perempuan'); ?> required /> Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="agama" class="control-label col-sm-4">Agama:</label>
                            <div class="col-sm-2">
                                <select required class="form-control" name="agama" id="agama">
                                    <option value="" disabled <?php echo empty($data['agama_mhs']) ? 'selected' : ''; ?>>--Pilih Agama--</option>
                                    <option value="islam" <?php echo set_select('agama', 'islam', $data['agama_mhs'] == 'islam'); ?>>Islam</option>
                                    <option value="kristen" <?php echo set_select('agama', 'kristen', $data['agama_mhs'] == 'kristen'); ?>>Kristen</option>
                                    <option value="katholik" <?php echo set_select('agama', 'katholik', $data['agama_mhs'] == 'katholik'); ?>>Katholik</option>
                                    <option value="hindu" <?php echo set_select('agama', 'hindu', $data['agama_mhs'] == 'hindu'); ?>>Hindu</option>
                                    <option value="budha" <?php echo set_select('agama', 'budha', $data['agama_mhs'] == 'budha'); ?>>Budha</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telepon" class="control-label col-sm-4">Telepon:</label>
                            <div class="col-sm-3">
                                <input required class="form-control" name="telepon" type="tel" id="telepon" value="<?= $data['telepon_mhs'] ?>" placeholder="Nomor Telepon" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="control-label col-sm-4">Alamat:</label>
                            <div class="col-sm-4">
                                <textarea name="alamat" id="alamat" rows="4" class="form-control" placeholder="Alamat Rumah"><?= $data['alamat_mhs'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <a class="btn btn-default" href="<?= site_url('Mahasiswa') ?>">Kembali</a>
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
