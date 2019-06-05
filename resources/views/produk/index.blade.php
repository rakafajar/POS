@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Produk</li>
</ol>

<div class="box">
	<div class="box-header">
		<a class="btn btn-success" href="{{ route('produk.create') }}">
			<i class="fa fa-plus-circle"></i>
			Tambah
		</a>
		<a onclick="deleteAll()" class="btn btn-danger">
			<i class="fa fa-trash"></i>
			Hapus
		</a>
		<a onclick="printBarcode()" class="btn btn-info">
			<i class="fa fa-barcode"></i>
			Cetak Barcode
		</a>
	</div>
</div>
<br>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Data Produk
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<form method="post" id="form-produk">
				{!! csrf_field() !!}
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20"><input type="checkbox" value="1" id="select-all"></th>
							<th width="20">No</th>
							<th>ID Produk</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Kategori</th>
							<th>Merk</th>
							<th width="100">Harga Beli</th>
							<th width="100">Harga Jual</th>
							<th>Diskon</th>
							<th>Stok</th>
							<th width="100">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; ?>
						@foreach($produk as $hasil)
						<?php $no++ ; ?>
						<tr>
							<td><input type="checkbox" name="id[]" value="{{ $hasil->id_produk }}"></td>
							<td>{{ $no }}</td>
							<td>{{ $hasil->id_produk }}</td>
							<td>{{ $hasil->kode_produk }}</td>
							<td>{{ $hasil->nama_produk }}</td>
							<td>{{ $hasil->nama_kategori}}</td>
							<td>{{ $hasil->merk}}</td>
							<td>
								<?php echo "Rp. ".format_uang($hasil->harga_beli) ?>
							</td>
							<td>
								<?php echo "Rp. ".format_uang($hasil->harga_jual) ?>
							</td>
							<td>{{ $hasil->diskon }}%</td>
							<td>{{ $hasil->stok}} </td>
							<td>
								<div class="btn-group">
									<a href="{!! route('produk.edit', [$hasil->id_produk]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-edit" style=""></i></a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</form>
		</div>
	</div>
</form>
<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection

@section('script')
<!-- Script Untuk Ceklis Semua -->
<script type="text/javascript">
	$('#select-all').click(function(){
		$('input[type="checkbox"]').prop('checked', this.checked);
	});

	//Menghapus Semua Data yang dicentang
	function deleteAll(){
		if ($('input:checked').length<1) {
			alert('Pilih data yang akan di hapus!')
		} else if (confirm("Apakah yakin akan menghapus semua data terpilih?")){
			$.ajax({
				url: "produk/hapus",
				type: "POST",
				data: $('#form-produk').serialize(),
				success: function(data){
					table.ajax.reload();
				},

			});
		}
	}

	// Script Untuk Cetak Barcode
	function printBarcode(){
		if ($('input:checked').length<1) {
			alert('Pilih data yang akan di cetak!')
		} else{
			$('#form-produk').attr('target', '_blank').attr('action', "produk/cetak").submit();
		}
	}
</script>
@endsection

