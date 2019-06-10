<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengeluaranModel;

class PengeluaranController extends Controller
{
	public function index()
	{
		$pengeluaran = PengeluaranModel::all();
		return view('pengeluaran.index', compact('pengeluaran'));
	}

	public function create()
	{
		return view('pengeluaran.create');
	}

	public function store(Request $request)
	{
		$pengeluaran = new PengeluaranModel;
		$pengeluaran->jenis_pengeluaran = $request['jenis'];
		$pengeluaran->nominal = $request['nominal'];
		$pengeluaran->save();

		return redirect(route('pengeluaran.index'))->with('success','Data Berhasil Disimpan!');
	}

	public function edit($id)
	{
		$pengeluaran = PengeluaranModel::find($id);
		return view('pengeluaran.edit', compact('pengeluaran'));
	}

	public function update(Request $request, $id)
	{
		$pengeluaran = PengeluaranModel::find($id);
		$pengeluaran->jenis_pengeluaran = $request['jenis'];
		$pengeluaran->nominal = $request['nominal'];
		$pengeluaran->update();

		return redirect(route('pengeluaran.index'))->with('info','Data Berhasil Diubah!');
	}

	public function destroy($id)
	{
		$pengeluaran = PengeluaranModel::find($id);
		$pengeluaran->delete();
		return back()->with('warning','Data Berhasil Dihapus!');
	}

}
