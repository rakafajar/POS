@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Supplier</li>
</ol>


<div class="box">
	<div class="box-header">
		<a class="btn btn-success" href="{{ route('supplier.create') }}">
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
	Data Supplier
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="10">ID</th>
						<th>Nama Supplier</th>
						<th>Alamat</th>
						<th>Nomor Telpon</th>
						<th width="50">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($supplier as $hasil)
					<tr>
						<td>{{ $hasil->id_supplier}}</td>
						<td>{{ $hasil->nama}}</td>
						<td>{{ $hasil->alamat }}</td>
						<td>{{ $hasil->telpon }}</td>
						<td>
							<div class="btn-group">
								<a href="{!! route('supplier.edit', [$hasil->id_supplier]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-edit" style=""></i></a>
								<form method="post" action="{!! route('supplier.destroy', [$hasil->id_supplier]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Supplier?')"><i class="fa fa-trash"></i></button>
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
