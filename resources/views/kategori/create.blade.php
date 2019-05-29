@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Kategori</a>
	</li>
	<li class="breadcrumb-item active">Create</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
	Create Kategori</div>
	<div class="card-body">
		<form action="{{ route('kategori.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="nama_kategori" class="form-control" name="nama_kategori" required="required">
					<label for="nama_kategori">Nama Kategori</label>
				</div>
			</div>
			<button class="btn btn-primary btn-save">
				<i class="fa fa-save"></i>
				Simpan
			</button>
			<a class="btn btn-danger" href="{{ route('kategori.index') }}">
				<i class="fa fa-arrow-circle-left"></i>
				Kembali
			</a>
		</form>
	</div>
</div>
@endsection
