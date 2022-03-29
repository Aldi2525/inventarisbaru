<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Barang;
use Alert;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peminjam = Peminjam::orderBy('id','desc')->get();
        return view('admin.pinjam.index', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        return view('admin.pinjam.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $barang = Barang::findOrFail($request->id_barang);
        alert()->error('Mohon maaf','Stok hanya '.$barang->jumlah_stok.' tidak cukup');
     


        $request->validate([
            'jumlah_pinjam' => 'numeric|min:1|max:'.$barang->jumlah_stok,
            
        ]);
        
        $peminjam = new Peminjam;
        $peminjam->id_barang = $request->id_barang;
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjam->tgl_pinjam = $request->tgl_pinjam;
        $peminjam->status = $request->status;  
        $peminjam->save();

        Alert::success('Mantap', 'Data berhasil ditambah');
        
        $barang->jumlah_stok -= $request->jumlah_pinjam;
        $barang->save();

        return redirect()->route('pinjam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjam $peminjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->delete();
        Alert::success('Mantap', 'Data berhasil dihapus');
        return redirect()->route('pinjam.index');

    }
}
