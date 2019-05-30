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
        $jml = ProdukModel::where('kode_produk', '=', $request['kode_produk'])->count();
        if ($jml < 1) {
            $produk = new ProdukModel;
            $produk->kode_produk    = $request ['kode_produk'];
            $produk->nama_produk    = $request ['nama_produk'];
            $produk->id_kategori    = $request ['id_kategori'];
            $produk->merk           = $request ['merk'];
            $produk->harga_beli     = $request ['harga_beli'];
            $produk->diskon         = $request ['diskon'];
            $produk->harga_jual     = $request ['harga_jual'];
            $produk->stok           = $request ['stok'];
            $produk->save();

            return redirect('produk');
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
        $kategori = KategoriModel::all();
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
            $produk->kode_produk    = $request ['kode_produk'];
            $produk->nama_produk    = $request ['nama_produk'];
            $produk->id_kategori    = $request ['id_kategori'];
            $produk->merk           = $request ['merk'];
            $produk->harga_beli     = $request ['harga_beli'];
            $produk->diskon         = $request ['diskon'];
            $produk->harga_jual     = $request ['harga_jual'];
            $produk->stok           = $request ['stok'];
            $produk->update();

            return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = ProdukModel::find($id);
        $produk->delete();
    }

    //Delete All dengan CheckBox
    public function deleteAll(Request $Request)
    {
        $ids = $request->ids;
        DB::table("produk")->whereIn('id_produk', explode(",",$ids))->delete();
        return response()->json(['success'=>"Produk Berhasil di Delete"]);
    }

    // Controller Untuk Membuat PDF
    public function makePDF()
    {
        $produk = ProdukModel::join('kategori','kategori.id_kategori', '=', 'produk.id_kategori')
                    ->orderBy('produk.id_produk', 'desc')->get();
        $no = 0;
        $pdf = PDF::loadView('produk.pdf', compact('produk', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream(); 
    }
}