@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Pengeluaran</li>
</ol>


<div class="box">
	<div class="box-header">
		<a class="btn btn-success" href="{{ route('pengeluaran.create') }}">
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
						<th width="30">No</th>
						<th>Tanggal</th>
						<th>Jenis Pengeluaran</th>
						<th>Nominal</th>
						<th width="100">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 0; ?>
					@foreach($pengeluaran as $list)
					<?php $no++ ; ?>
					<tr>
						<td>{{ $no}}</td>
						<td>
							<?php echo tanggal_indonesia($list->created_at); ?>
						</td>
						<td>{{ $list->jenis_pengeluaran}}</td>
						<td>
							<?php echo "Rp. ".format_uang($list->nominal) ?>
						</td>
						<td>
							<div class="btn-group">
								<a href="{!! route('pengeluaran.edit', [$list->id_pengeluaran]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-edit" style=""></i></a>
								<form method="post" action="{!! route('pengeluaran.destroy', [$list->id_pengeluaran]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Pengeluaran?')"><i class="fa fa-trash"></i></button>
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
