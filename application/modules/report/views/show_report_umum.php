<!DOCTYPE html>
<html>
<head>
	<title>Reporting</title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>
	<table class="table table-striped">
		<caption>Report Complain Bagian Kemahasiswaan</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Complain Date</th>
				<th>Nama Mahasiswa</th>
				<th>NIM Mahasiswa</th>
				<th>Fakultas</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			    $no = 1;
                foreach($umum->result_array() as $key => $val ) :
                	// var_dump($keuangan);exit;
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $val['ComplainUpdatedDate']; ?></td>
				<td><?= $val['MahasiswaName']; ?></td>
				<td><?= $val['MahasiswaNim']; ?></td>
				<td><?= $val['FakultasDesc']; ?></td>
			</tr>
			<?php 
               endforeach;
			?>
		</tbody>
	</table>
	<script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>