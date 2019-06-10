<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdukModel;
use App\KategoriModel;
use Datatables;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = ProdukModel::leftJoin('kategori','kategori.id_kategori', '=', 'produk.id_kategori')
                    ->orderBy('produk.id_produk', 'desc')->get();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriModel::all();
        return view('produk.create', compact( 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jml = ProdukModel::where('kode_produk', '=', $request['kode'])->count();
        if ($jml < 1) {
            $produk = new ProdukModel;
            $produk->kode_produk    = $request ['kode'];
            $produk->nama_produk    = $request ['nama'];
            $produk->id_kategori    = $request ['kategori'];
            $produk->merk           = $request ['merk'];
            $produk->harga_beli     = $request ['harga_beli'];
            $produk->diskon         = $request ['diskon'];
            $produk->harga_jual     = $request ['harga_jual'];
            $produk->stok           = $request ['stok'];
            $produk->save();

            return redirect(route('produk.index'))->with('success','Data Berhasil Disimpan!');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = ProdukModel::find($id);
        $kategori= KategoriModel::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = ProdukModel::find($id);
            $produk->nama_produk    = $request ['nama_produk'];
            $produk->id_kategori    = $request ['kategori'];
            $produk->merk           = $request ['merk'];
            $produk->harga_beli     = $request ['harga_beli'];
            $produk->diskon         = $request ['diskon'];
            $produk->harga_jual     = $request ['harga_jual'];
            $produk->stok           = $request ['stok'];
            $produk->update();

            return redirect(route('produk.index'))->with('success','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = ProdukModel::where('id', $id);
        $produk->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }

    //Delete All dengan CheckBox
    public function deleteSelected(Request $request)
    {
        foreach($request['id'] as $id){
            $produk = ProdukModel::find($id);
            $produk->delete();
        }
    }

    // Controller untuk print Barcode
    public function printBarcode(Request $request)
    {
        // dd($request->id);
        $dataproduk = array();
        foreach($request['id'] as $id) {
            $produk = ProdukModel::find($id);
            $dataproduk[] = $produk;
        }
        $no = 1;
        $pdf = PDF::loadView('produk.barcode', compact('dataproduk', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
