<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">

<div class="container">
    <h1 class="text-primary text-center"><?php echo $judul ?><small> [Muhamat Irfan Rifai]</small></h1>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><?php echo $nama ?></div>
                <br>
                <div class="panel-body">
                    <a class="btn btn-primary" href="<?= site_url('mahasiswa') ?>">MAHASISWA</a>
                    <a class="btn btn-primary" href="<?= site_url('dosen') ?>">DOSEN</a>
                    <a class="btn btn-primary" href="<?= site_url('matkul') ?>">MATA KULIAH</a>
                    <a class="btn btn-primary" href="<?= site_url('krs') ?>">KRS</a>
                    <a class="btn btn-primary" href="<?= site_url('prodi') ?>">PRODI</a>
                    <hr><br>
                    <img src="<?= base_url('assets/bg.png') ?>" alt="Background Image" class="img img-responsive">
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
