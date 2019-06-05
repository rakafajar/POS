@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Supplier</a>
	</li>
	<li class="breadcrumb-item active">Edit</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i Supplier="fas fa-table"></i>
	Edit Supplier</div>
	<div class="card-body">
		<form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
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
			<div class="form-group">
				<div class="form-label-group">
                <input type="text" id="nama" class="form-control" name="nama" value="{{ $supplier->nama}}">
					<label for="nama">Nama Supplier</label>
				</div>
            </div>
            <div class="form-group">
				<div class="form-label-group">
                <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $supplier->alamat}}">
					<label for="alamat">Alamat Supplier</label>
				</div>
            </div>
            <div class="form-group">
				<div class="form-label-group">
                <input type="text" id="telpon" class="form-control" name="telpon" value="{{ $supplier->telpon}}">
					<label for="telpon">No Telpon</label>
				</div>
			</div>
			<button class="btn btn-primary btn-save">
				<i class="fa fa-save"></i>
				Update
			</button>
			<a class="btn btn-danger" href="{{ route('supplier.index') }}">
				<i class="fa fa-arrow-circle-left"></i>
				Kembali
			</a>
		</form>
	</div>
</div>
@endsection
