@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Pengeluaran</a>
	</li>
	<li class="breadcrumb-item active">Edit</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
	Edit Pengeluaran</div>
	<div class="card-body">
		<form action="{{ route('pengeluaran.store') }}" method="POST">
			{{ csrf_field() }}
			@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class="form-group">
				<div class="form-label-group">
					<input type="text" id="jenis" class="form-control" name="jenis" autofocus>
					<label for="jenis">Jenis Pengeluaran</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-label-group">
					<input type="number" id="nominal" class="form-control" name="nominal" autofocus>
					<label for="nominal">Nominal</label>
				</div>
			</div>
			<button class="btn btn-primary btn-save">
				<i class="fa fa-save"></i>
				Simpan
			</button>
			<a class="btn btn-danger" href="{{ route('pengeluaran.index') }}">
				<i class="fa fa-arrow-circle-left"></i>
				Kembali
			</a>
		</form>
	</div>
</div>
@endsection
