<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">

<div class="container-fluid">

<h1 class="text text-primary"><?php echo $judul ?></h1>
<?php echo $this->session->flashdata('notif'); ?>
<div class="row">
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><strong><?php echo $judul1 ?></strong></div>
			<div class="panel-body">
<a class="btn btn-primary" href="<?= site_url() ?>">Beranda</a>
<a class="btn btn-success" href="<?= site_url('matkul/tambah') ?>"> TAMBAH DATA</a>
<br><br>

<table class="table table-striped table-bordered table-hover">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Kode Matkul</th>
        <th class="text-center">Nama Matkul</th>
        <th class="text-center">SKS</th>
        <th class="text-center">Jenis</th>
        <th class="text-center">Semester</th>
        <th class="text-center">Aksi</th>
    </tr>
    <?php
     $no = 1;
     foreach($listdata as $data){
	echo '<tr>';
	echo '<td class="text-center">'.$no.'</td>';
	echo '<td class="text-center text-primary">'.$data['kode_mk'].'</td>';
	echo '<td class="text-center"><strong>'.$data['nama_mk'].'</strong></td>';
	echo '<td class="text-center">'.$data['sks_mk'].'</td>';
	echo '<td class="text-center">'.$data['jenis_mk'].'</td>';
	echo '<td class="text-center">'.$data['semester_mk'].'</td>';

	echo '<td class="text-center">
		<a class="btn btn-warning btn-xs" href="'. site_url('matkul/ubah/'.$data['id_mk']) .'">Ubah</a>
		<a onclick="return confirm(`Anda yakin hapus ?`)" class="btn btn-danger btn-xs" href="'. site_url('matkul/hapus/'.$data['id_mk']) .'">Hapus</a>
	     </td>';
	echo '</tr>';
	$no++;
     }
    ?>
    <tr>
    	<th class="text-center" colspan="5">TOTAL</th>
    	<th class="text-center"colspan="2">
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