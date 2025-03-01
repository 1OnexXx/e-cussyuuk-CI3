<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Export Data Pemesanan</title>
	<style>
		@media print {
			@page {
				size: auto;
				/* Ukuran halaman otomatis */
				margin: 0;
				/* Hilangkan margin bawaan */
			}

			body {
				margin: 0;
				/* Hilangkan margin body */
				padding: 10;
				/* Hilangkan padding body */
			}

			/* Hilangkan header dan footer bawaan browser */
			@page :first {
				margin-top: 0;
			}

			@page :left {
				margin-left: 0;
			}

			@page :right {
				margin-right: 0;
			}
		}

		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.table {
			width: 100%;
			border-collapse: collapse;
		}

		.table th,
		.table td {
			border: 1px solid #000;
			padding: 8px;
			text-align: center;
		}

		.table th {
			background-color: #f2f2f2;
			font-weight: bold;
		}

		.table-striped tbody tr:nth-of-type(odd) {
			background-color: rgba(0, 0, 0, 0.05);
		}

		h1 {
			text-align: center;
			margin-bottom: 20px;
			font-size: 24px;
		}
	</style>
</head>

<body>
	<h1>Data Pemesanan</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Kode</th>
				<th>Tgl Pemesanan</th>
				<th>Nama Pelanggan</th>
				<th>Tujuan</th>
				<th>Transportasi</th>
				<th>Kode Kursi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($pemesanan as $row): ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $row['kode_pemesanan'] ?></td>
					<td><?= $row['tanggal_pemesanan'] ?></td>
					<td><?= $row['nama_penumpang'] ?></td>
					<td><?= $row['tujuan'] ?></td>
					<td><?= $row['nama_transportasi'] ?></td>
					<td><?= $row['kode_kursi'] ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<script>
		window.print()
	</script>
</body>

</html>
