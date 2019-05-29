@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kategori</li>
</ol>


<div class="box">
	<div class="box-header">
		<a class="btn btn-success" href="{{ route('kategori.create') }}">
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
	Data Kategori
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Kategori</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Nama Kategori</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($kategori as $hasil)
					<tr>
						<td>{{ $hasil->id_kategori}}</td>
						<td>{{ $hasil->nama_kategori}}</td>
						<td>
							<div class="btn-group">
								<a href="{!! route('kategori.edit', [$hasil->id_kategori]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-edit" style=""></i></a>
								<form method="post" action="{!! route('kategori.destroy', [$hasil->id_kategori]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Kategori?')"><i class="fa fa-trash"></i></button>
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
