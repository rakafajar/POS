<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\KategoriModel;
use Auth;

class KategoriController extends Controller
{
    // Pesan Masukan Data
    protected $pesan = array(
        'nama_kategori.required' => 'Isi Nama Kategori',
    );

    protected $aturan = array(
        'nama_kategori' => 'required',
    );
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriModel::all();
        return view('kategori.index')->with('kategori', $kategori);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriModel::all();
        return view('kategori.create', compact('kategori'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->aturan, $this->pesan);
        $kategori = new KategoriModel;
        $kategori ->nama_kategori = $request['nama_kategori'];
        $kategori->save();

        return redirect(route('kategori.index'))->with('success','Data Berhasil Disimpan!');
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
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', compact('kategori', $kategori));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestx
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->aturan, $this->pesan);
        $kategori = KategoriModel::find($id);
        $kategori->nama_kategori = $request['nama_kategori']; 
        $kategori->update();

         return redirect(route('kategori.index'))->with('success','Data Berhasil Diubah!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }
}