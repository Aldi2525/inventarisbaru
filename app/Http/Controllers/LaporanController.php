<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function form()
    {
        return view('admin.laporan.form');
    }

    //tampilan print
    public function view(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $pilih = $request->cetak;
        if ($end >= $start) {
            if ($pilih == "masuk") {
                $jumlah_msk = 0;
                $bmasuk = Barangmasuk::whereBetween('tgl_msk', [$start, $end])
                    ->get();
                foreach ($bmasuk as $value) {
                    $jumlah_msk += $value->jumlah_msk;
                }

                return view('admin.laporan.tampilan_bmasuk', compact('bmasuk', 'start', 'end', 'jumlah_msk'));
            } else if ($pilih == "keluar") {
                $jumlah_klr = 0;
                $bkeluar = Barangkeluar::whereBetween('tgl_klr', [$start, $end])
                    ->get();
                foreach ($bkeluar as $value) {
                    $jumlah_klr += $value->jumlah_klr;
                }
                return view('admin.laporan.tampilan_bkeluar', compact('bkeluar', 'start', 'end', 'jumlah_klr'));
            }
        } elseif ($end < $start) {
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Tanggal Yang Dimasukkan Tidak Valid",
            ]);
            return redirect()->back();
        }
    }

//download pdf
    public function laporan(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $pilih = $request->cetak;

        if ($end >= $start) {
            if ($pilih == "masuk") {
                $jumlah_msk = 0;
                $bmasuk = Barangmasuk::whereBetween('tgl_msk', [$start, $end, $jumlah_msk])
                    ->get();
                foreach ($bmasuk as $value) {
                    $jumlah_msk += $value->jumlah_msk;
                }
                $pdf = \PDF::loadview('admin.laporan.cetak_bmasuk', compact('bmasuk', 'start', 'end', 'jumlah_msk'));
                return $pdf->download('laporan-barang-masuk.pdf');
            } elseif ($pilih == "keluar") {
                $jumlah_klr = 0;
                $bkeluar = BarangKeluar::whereBetween('tgl_klr', [$start, $end, $jumlah_klr])
                    ->get();
                foreach ($bkeluar as $value) {
                    $jumlah_klr += $value->jumlah_klr;
                }
                $pdf = \PDF::loadview('admin.laporan.cetak_bkeluar', compact('bkeluar', 'start', 'end', 'jumlah_klr'));
                return $pdf->download('laporan-barang-keluar.pdf');
            }
        } elseif ($end < $start) {
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Tanggal Yang Dimasukkan Tidak Valid",
            ]);
            return redirect()->back();
        }
    }
}
