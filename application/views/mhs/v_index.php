<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">


<div class="container-fluid">
<h1 class="text-primary"><?php echo $judul ?></h1>
<?php echo $this->session->flashdata('notif'); ?>
<div class="row">
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><strong><?php echo $judul1 ?></strong></div>
			<div class="panel-body">
<a class="btn btn-primary" href="<?= site_url() ?>">Beranda</a>
<a class="btn btn-success" href="<?= site_url('mahasiswa/tambah') ?>"> TAMBAH DATA</a>
<br><br>

<table class="table table-striped table-bordered table-hover">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIM</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Program Studi</th>
        <th class="text-center">Angkatan</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Tanggal Lahir</th>
        <th class="text-center">Agama</th>
        <th class="text-center">Telepon</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Aksi</th>
    </tr>
    <?php
     $no = 1;
     foreach($listdata as $data){
	echo '<tr>';
	echo '<td class="text-center">'.$no.'</td>';
	echo '<td class="text-center text-primary">'.$data['nim'].'</td>';
	echo '<td class="text-center"><strong>'.$data['nama_mhs'].'</strong></td>';
	echo '<td class="text-center">'.$data['nama_prodi'].'</td>';
	echo '<td class="text-center">'.$data['angkatan'].'</td>';
	echo '<td class="text-center">'.$data['kelamin_mhs'].'</td>';
	$bulanIndonesia = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
        'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    $birthDate = date_create($data['lahir_mhs']);
    $day = date_format($birthDate, 'd');
    $month = intval(date_format($birthDate, 'm')) - 1;
    $year = date_format($birthDate, 'Y');
    $tanggalLahir = $day . ' ' . $bulanIndonesia[$month] . ' ' . $year;
    echo '<td class="text-center">'.$tanggalLahir.'</td>';
	echo '<td class="text-center">'.$data['agama_mhs'].'</td>';
	echo '<td class="text-center">'.$data['telepon_mhs'].'</td>';
	echo '<td class="text-center">'.$data['alamat_mhs'].'</td>';

	echo '<td class="text-center">
		<a class="btn btn-warning btn-xs" href="'. site_url('mahasiswa/ubah/'.$data['id_mhs']) .'">Ubah</a>
		<a onclick="return confirm(`Anda yakin hapus ?`)" class="btn btn-danger btn-xs" href="'. site_url('mahasiswa/hapus/'.$data['id_mhs']) .'">Hapus</a>
	     </td>';
	echo '</tr>';
	$no++;
     }
    ?>
    <tr>
    	<th class="text-center" colspan="7">Total Data</th>
    	<th class="text-center"colspan="4">
	     <span><?= count($listdata) ?></span>
    	</th>
    </tr>
</table>
</div>
</div>
</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>