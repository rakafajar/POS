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
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="50px"><input type="checkbox" value="1" id="master"></th>
						<th width="20">No</th>
						<th>Kode Produk</th>
						<th>Nama Produk</th>
						<th>Kategori</th>
						<th>Merk</th>
						<th width="100">Harga Beli</th>
						<th width="100">Harga Jual</th>
						<th>Diskon</th>
						<th>Stok</th>
						<th width="20">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $no = 0; ?>
				@foreach($produk as $hasil)
				<?php $no++ ; ?>
				<tr>
					<td><input type="checkbox" class="sub_chk" data-id="{{ $hasil->id_produk }}"></td>
					<td>{{ $no }}</td>
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
							<form method="post" action="{!! route('produk.destroy', [$hasil->id_produk]) !!}">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Produk?')"><i class="fa fa-trash"></i></button>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
