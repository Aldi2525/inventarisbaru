<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barang;
use Alert;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bkeluar = Barangkeluar::orderBy('id','desc')->get();
        return view('admin.bkeluar.index', compact('bkeluar'));
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
        return view('admin.bkeluar.create', compact('barang'));
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
            'jumlah_klr' => 'numeric|min:1|max:'.$barang->jumlah_stok,
            
        ]);

        $barangkeluar = new Barangkeluar;
        $barangkeluar->id_barang = $request->id_barang;
        $barangkeluar->tgl_klr = $request->tgl_klr;
        $barangkeluar->jumlah_klr = $request->jumlah_klr;
        $barangkeluar->catatan = $request->catatan;
        $barangkeluar->save();
        Alert::success('Mantap', 'Data berhasil ditambah');

       
        $barang->jumlah_stok -= $request->jumlah_klr;
        $barang->save();

        return redirect()->route('bkeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       //
       $barangkeluar = Barangkeluar::findOrFail($id);
       $barangkeluar->delete();
       Alert::success('Mantap', 'Data berhasil dihapus');
       return redirect()->route('bkeluar.index');
    }
}
