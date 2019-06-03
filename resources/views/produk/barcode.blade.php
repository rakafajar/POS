<!DOCTYPE html>
<html>
<head>
	<title>Cetak Barcode</title>
</head>
<body>
	<table width="100%">
		<tr>
			@foreach($produk as $data)
			<td align="center" style="border: 1px solid #ccc">
				{{ $data->nama_produk }}<br>
				<img src="data:image/png;base64,{{ DNS1D::gerBarcodePNG($data->kode_produk, 'C39') }}" height="60" width="180">
				<br>{{ $data->kode_produk }}
			</td>
			@if ( $no++ % 3 == 0)
				<tr></tr>
			@endif
			@endforeach
		</tr>
	</table>
</body>
</html>