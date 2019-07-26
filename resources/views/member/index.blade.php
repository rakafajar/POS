@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Member</li>
</ol>


<div class="box">
	<div class="box-header">
		<a class="btn btn-success" href="{{ route('member.create') }}">
			<i class="fa fa-plus-circle"></i>
			Tambah
		</a>
		<a onclick="printCard()" class="btn btn-info">
				<i class="fa fa-print"></i>
				Kartu Member
		</a>
	</div>
</div>
<br>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
	Data Member
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<form method="post" id="form-member">
			{{ csrf_field() }}
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="20"><input type="checkbox" value="1" id="select-all"></th>
						<th width="10">Kode Member</th>
						<th>Nama Member</th>
						<th>Alamat</th>
						<th>Nomor Telpon</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($member as $hasil)
					<tr>
						<td><input type="checkbox" name="id[]" value="{{ $hasil->id_member }}"></td>
						<td>{{ $hasil->kode_member}}</td>
						<td>{{ $hasil->nama}}</td>
						<td>{{ $hasil->alamat }}</td>
						<td>{{ $hasil->telpon }}</td>
						<th>
								<a href="{!! route('member.edit', [$hasil->id_member]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-edit" style=""></i></a>
								{{-- <form method="post" action="{!! route('member.destroy', [$hasil->id_member]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Member?')"><i class="fa fa-trash"></i></button>
							 </form> --}}
							 <a href="{{ URL::to('member/destroy/'.$hasil->id_member) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
		</div>
	</div>
	<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
@section('script')
<!-- Script Untuk Ceklis Semua -->
<script type="text/javascript">
	$('#select-all').click(function(){
		$('input[type="checkbox"]').prop('checked', this.checked);
	});

	// //Menghapus Semua Data yang dicentang
	// function deleteAll(){
	// 	if ($('input:checked').length<1) {
	// 		alert('Pilih data yang akan di hapus!')
	// 	} else if (confirm("Apakah yakin akan menghapus semua data terpilih?")){
	// 		$.ajax({
	// 			url: "member/hapus",
	// 			type: "POST",
	// 			data: $('#form-member').serialize(),
	// 			success: function(data){
	// 				location.reload();
	// 			},

	// 		});
	// 	}
	// }

	// Script Untuk Cetak Barcode
	function printCard(){
		if ($('input:checked').length<1) {
			alert('Pilih data yang akan di cetak!')
		} else{
			$('#form-member').attr('target', '_blank').attr('action', "member/cetak").submit();
		}
	}
</script>
@endsection
