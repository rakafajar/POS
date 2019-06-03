<!DOCTYPE html>
<html>
<head>
	<title>Produk PDF</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 align="center"> Daftar Produk </h3>
		</div>
		<div class="panel-body" align="center">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Kategori</th>
						<th>Harga Jual</th>
					</tr>
				</thead>
				<tbody>
					@foreach($produk as $data)
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $data->nama_produk }}</td>
						<td>{{ $data->nama_kategori }}</td>
						<td>{{ $data->harga_jual }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>