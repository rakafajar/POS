<!DOCTYPE html>
<html>
<head>
	<title>Produk PDF</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 align="center">Daftar Produk</h3>
		</div>
		<div class="panel-body">
			<div class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Kategori</th>
						<th>Harga Jual</th>
					</tr>
					<tbody>
						<?php $no = 0; ?>
						@foreach($produk as $hasil)
						<?php $no++ ; ?>
						<tr>
							<td>{{ $no }}</td>
							<td>{{ $hasil->nama_produk }}</td>
							<td>{{ $hasil->nama_kategori }}</td>
							<td>{{ $hasil->harga_jual }}</td>
						</tr>
						@endforeach
					</tbody>
				</thead>
			</div>
		</div>
	</div>
</body>
</html>