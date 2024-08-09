<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .panel-small {
        margin: 0 auto 20px; /* Memusatkan panel secara horizontal dan memberikan margin atas-bawah */
    }
    .panel-body {
        padding: 15px; /* Mengatur padding untuk panel-body, jika ada konten tambahan */
    }
    .panel-heading {
        padding: 10px 15px; /* Mengatur padding untuk panel-heading */
        display: flex;
        align-items: center; /* Menyelaraskan item secara vertikal di tengah */
        justify-content: center; /* Menyelaraskan item secara horizontal di tengah */
    }
    .panel-heading h3 {
        font-size: 18px; /* Mengatur ukuran font judul */
        margin: 0; /* Menghilangkan margin default dari h1 */
        color: white; /* Mengatur warna teks di panel-heading */
    }
    .panel-heading small {
        font-size: 14px; /* Mengatur ukuran font untuk teks kecil */
    }

    /* Dropdown */
    .dropdown-menu.pull-left {
        left: 0; /* Mengatur posisi menu dropdown ke kiri dari posisi tombol */
        right: auto; /* Menyembunyikan pengaturan right untuk dropdown */
    }
    .dropdown-menu > li > a {
        padding: 10px 20px;
        font-weight: bold;
        color: #000; /* Warna teks hitam */
    }
    .dropdown-menu > li > a i {
        margin-right: 10px;
    }
    .panel-body img {
        margin-top: 10px; /* Atur jarak atas gambar sesuai kebutuhan */
    }
</style>

<div class="container">
    <div class="panel panel-primary panel-small">
        <div class="panel-heading">
            <h3 class="text-center"><?php echo $judul; ?><small style="color: #ffffff;"> [Muhamat Irfan Rifai]</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><?php echo $nama ?></div>
                <div class="panel-body">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-left"> <!-- Menambahkan kelas pull-left -->
                            <li><a href="<?= site_url('mahasiswa') ?>"><i class="fa fa-graduation-cap"></i> MAHASISWA</a></li>
                            <li><a href="<?= site_url('dosen') ?>"><i class="fa fa-chalkboard-teacher"></i> DOSEN</a></li>
                            <li><a href="<?= site_url('prodi') ?>"><i class="fa fa-list-alt"></i> PRODI</a></li>
                            <li><a href="<?= site_url('matkul') ?>"><i class="fa fa-book"></i> MATA KULIAH</a></li>
                            <li><a href="<?= site_url('krs') ?>"><i class="fa fa-edit"></i> KRS</a></li>
                        </ul>
                    </div>
                    <img src="<?= base_url('assets/bg.png') ?>" alt="Background Image" class="img img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
