@extends('adminlte::page')

@section('content_header')
   <br>
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('LAPORAN') }}</div>
                    <div class="card-body">
                        <form action="/admin/view" method="post">
                            @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cetak" id="cetak1" value="masuk" checked>
                                <label class="form-check-label" for="cetak1">
                                    <h4> Barang Masuk</h4>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cetak" id="cetak2" value="keluar">
                                <label class="form-check-label" for="cetak2">
                                    <h4> Barang Keluar</h4>
                                </label>
                            </div><br>
                            
                            <div class="form-group">
                                <label for="">Tanggal Awal :</label>
                                <input type="date" name="tanggalAwal" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Akhir :</label>
                                <input type="date" name="tanggalAkhir" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Cari Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection