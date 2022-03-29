@extends('adminlte::page')

@section('title','Tambah Barang')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Barang</div>
                <div class="card-body">
                   <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select name="nama_barang" class="form-control @error('id_supplier') is-invalid @enderror" >
                                @foreach($supplier as $data)
                                    <option value="{{$data->nama_barang}}">{{$data->nama_barang}}</option>
                                @endforeach
                            </select>
                            @error('id_supplier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Supplier</label>
                            <select name="id_supplier" class="form-control @error('id_supplier') is-invalid @enderror" >
                                @foreach($supplier as $data)
                                    <option value="{{$data->id}}">{{$data->nama_supplier}}</option>
                                @endforeach
                            </select>
                            @error('id_supplier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
