<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier = Supplier::orderBy('id', 'desc')->get();
        return view('admin.supplier.index', compact('supplier'));

        // return response()->json([
        //     'success' => true,
        //     'message' => 'List Data Supplier',
        //     'date' => $supplier
        // ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.supplier.create');
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
        alert()->error('Mohon maaf', 'Nomor Minimal 11 Digit dan maksimal 12');

        $validated = $request->validate([
            'nama_supplier' => 'required|unique:suppliers',
            'nama_barang' => 'required',
            'alamat' => 'required',
            'no_wa' => 'required|min:11|max:12',
        ]);
        $message = [
            'nama_supplier.unique' => 'Merek sudah digunakan',
        ];

        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->nama_barang = $request->nama_barang;
        $supplier->alamat = $request->alamat;
        $supplier->no_wa = $request->no_wa;
        $supplier->save();
        Alert::success('Mantap', 'Data berhasil ditambah');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_supplier' => 'required',
            'nama_barang' => 'required',
            'alamat' => 'required',
            'no_wa' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->nama_barang = $request->nama_barang;
        $supplier->alamat = $request->alamat;
        $supplier->no_wa = $request->no_wa;
        $supplier->save();
        Alert::success('Mantap', 'Data berhasil update');
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (!Supplier::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Mantap', 'Data berhasil dihapus');
        return redirect()->route('supplier.index');
    }
}
