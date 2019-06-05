@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Produk</a>
	</li>
	<li class="breadcrumb-item active">Edit</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
	Edit Produk</div>
	<div class="card-body">
		<form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
			{{ csrf_field() }} {{ method_field('PATCH')}}
			@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<input type="hidden" id="id" name="id">
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="nama_produk" class="form-control" name="nama_produk" autofocus required value="{{ $produk->nama_produk}}">
					<label for="nama_produk">Nama Produk</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-label-group">
					<select type="text" id="id_kategori" class="form-control" required name="id_kategori">
						<option value="">-- Pilih Kategori --</option>
						@foreach($kategori as $hasil)
						<option value="{{ $hasil->id_kategori }}">{{ $hasil->nama_kategori}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="merk" class="form-control" name="merk" autofocus required value="{{ $produk->merk}}">
					<label for="merk">Merk</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="harga_beli" class="form-control" name="harga_beli" autofocus required value="{{$produk->harga_beli}}">
					<label for="harga_beli">Harga Beli</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="diskon" class="form-control" name="diskon" autofocus required value="{{ $produk->diskon }}">
					<label for="diskon">Diskon</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="harga_jual" class="form-control" name="harga_jual" autofocus required value="{{ $produk->harga_jual}}">
					<label for="harga_jual">Harga Jual</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="stok" class="form-control" name="stok" autofocus required value="{{ $produk->stok}}">
					<label for="stok">Stok</label>
				</div>
			</div>
			<button class="btn btn-primary btn-save">
				<i class="fa fa-save"></i>
				Simpan
			</button>
			<a class="btn btn-danger" href="{{ route('produk.index') }}">
				<i class="fa fa-arrow-circle-left"></i>
				Kembali
			</a>
		</form>
	</div>
</div>
@endsection
