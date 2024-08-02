<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">

<div class="container-fluid">
    <h1 class="text-primary"><?php echo $judul ?></h1>
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('notif'); ?>
         <div class="panel panel-primary">
            <div class="panel-heading text-center"><strong><?php echo $judul1 ?></strong></div>
            <div class="panel-body">
<a class="btn btn-primary" href="<?= site_url() ?>">Beranda</a>
<a class="btn btn-success" href="<?= site_url('dosen/tambah') ?>"> Tambah Data</a>
<br><br>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIDN</th>
        <th class="text-center">Nama</th>
        <th class="text-center">PROGRAM STUDI</th>
        <th class="text-center">ALAMAT</th>
        <th class="text-center">TELEPON</th>
        <th class="text-center">Aksi</th>
    </tr>
    <?php
     $no = 1;
     foreach($listdata as $data){
	echo '<tr>';
	echo '<td class="text-center">'.$no.'</td>';
	echo '<td class="text-center text-primary">'.$data['nidn'].'</td>';
	echo '<td class="text-center">'.$data['nama_dosen'].'</td>';
	echo '<td class="text-center">'.$data['nama_prodi'].'</td>';
	echo '<td class="text-center">'.$data['alamat_dosen'].'</td>';
	echo '<td class="text-center">'.$data['telepon_dosen'].'</td>';

	echo '<td class="text-center">
		<a class="btn btn-warning btn-xs" href="'. site_url('dosen/ubah/'.$data['id_dosen']) .'">Ubah</a>
		<a onclick="return confirm(`Anda yakin hapus ?`)" class="btn btn-danger btn-xs" href="'. site_url('dosen/hapus/'.$data['id_dosen']) .'">Hapus</a>
	     </td>';
	echo '</tr>';
	$no++;
     }
    ?>
</table>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>