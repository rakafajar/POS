<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\MemberModel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = MemberModel::orderBy('id_member', 'desc')->get();
        return view ('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jml = MemberModel::where('kode_member', '=', $request['kode'])->count();
        if ($jml < 1) {
            $produk = new MemberModel;
            $produk->kode_member    = $request ['kode'];
            $produk->nama           = $request ['nama'];
            $produk->alamat         = $request ['alamat'];
            $produk->telpon         = $request ['telpon'];
            $produk->save();

            return redirect(route('member.index'))->with('success','Data Berhasil Disimpan!');
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
        $member = MemberModel::find($id);
        return view('member.edit', compact('member'));
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
        $produk = MemberModel::find($id);
        $produk->nama           = $request ['nama'];
        $produk->alamat         = $request ['alamat'];
        $produk->telpon         = $request ['telpon'];
        $produk->save();

        return redirect(route('member.index'))->with('success','Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = MemberModel::find($id);
        $member->delete();
    }

    public function printCard(Request $request)
    {
        $datamember = array();
        foreach($request['id'] as $id){
            $member = MemberModel::find($id);
            $datamember[] = $member;
        }
        $pdf = PDF::loadView('member.card', compact('datamember'));
        $pdf->setPaper(array(0, 0, 566.93, 850.39), 'potrait');
        return $pdf->stream();
    }
}
