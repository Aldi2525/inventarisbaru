<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use App\Models\Barang;
use Alert;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bmasuk = Barangmasuk::orderBy('id','desc')->get();
        return view('admin.bmasuk.index', compact('bmasuk'));
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
        return view('admin.bmasuk.create', compact('barang'));
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
     
        $bmasuk = new Barangmasuk;
        $bmasuk->id_barang = $request->id_barang;
        $bmasuk->tgl_msk = $request->tgl_msk;
        $bmasuk->jumlah_msk = $request->jumlah_msk;
        $bmasuk->save();
        Alert::success('Mantap', 'Data berhasil ditambah');

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok += $request->jumlah_msk;
        $barang->save();

        return redirect()->route('bmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barangmasuk $barangmasuk)
    {
        $bmasuk = Barangmasuk::all();
        return view('admin.bmasuk.show', compact('bmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $barangmasuk = Barangmasuk::findOrFail($id);
        // return view('admin.bmasuk.edit', compact('bmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $validated = $request->validate([
        //     'nama_barang' => 'required',
        //     'tanggal_msk' => 'required',
        //     'jumlah_msk' => 'required',

        // ]);

        // $barangmasuk= Barangmasuk::findOrFail($id);
        // $barangmasuk->id_barang = $request->id_barang;
        // $barangmasukr->tanggal_msk = $request->tanggal_msk;
        // $barangmasuk->jumlah_msk = $request->jumlah_msk;
        // $barangmsk->save();
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Data edited successfully",
        // ]);
        // return redirect()->route('bmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $barangmasuk = Barangmasuk::findOrFail($id);
    $barangmasuk->delete();
    Alert::success('Mantap', 'Data berhasil dihapus');
       return redirect()->route('bmasuk.index');
    }
}
