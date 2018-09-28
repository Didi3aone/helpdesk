<!DOCTYPE html>
<html>
<head>
	<title>Reporting</title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>
	<table border="1">
		<caption>Report Complain Bagian Keuangan</caption>
		<p> START DATE = <?= $_REQUEST['start_date']; ?></p>
		<p> END DATE = <?= $_REQUEST['end_date']; ?></p>
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
                foreach($keuangan->result_array() as $key => $val ) :
                	// var_dump($keuangan);exit;
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $val['ComplainCreatedDate']; ?></td>
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