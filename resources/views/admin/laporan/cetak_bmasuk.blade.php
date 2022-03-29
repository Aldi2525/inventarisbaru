<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px;
        }

        th {
            padding: 5px;
            background: whitesmoke;
        }

    </style>

    <center><br>
        <h2>Laporan Barang Masuk</h2>
        <br>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Masuk</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1 @endphp
                <!-- data -->
                @foreach ($bmasuk as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->barang->nama_barang}}</td>
                        <td>{{ $data->tgl_msk }}</td>
                        <td>{{ $data->jumlah_msk }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="float: right;">Jumlah : <b>{{ $jumlah_msk }}</b></p>
    </center>

</body>

</html>
{{--  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ce>
        <div class="card-body">
            <div class="table-responsive">
                <center>
                    <h2>LAPORAN BARANG MASUK</h2>
                </center>
                <center>
                <table class="table" border="1">
                    <thead>
                        <center>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Masuk</th>
                            </tr>
                        </center>
                    </thead>

                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($bmasuk as $data)
                            <center>
                                <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $data->barang->nama_barang}}</td>
                           <td>{{ $data->tgl_msk }}</td>
                           <td>{{ $data->jumlah_msk }}</td>

                                </tr>
                            </center>
                            @endforeach


                </table>
                <p>TOTAL BARANG MASUK : {{($jumlah_msk)}}</p>
</center>
            </div>
        </div>
    </body>
    </html>   --}}
{{--  <br><br>
             <center>
                    <h2>LAPORAN BARANG KELUAR</h2>
                </center>
        <center>
                <table class="table" border="1">
                    <thead>
                        <center>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Keluar</th>
                            <th>Jumlah Keluar</th>
                            </tr>
                        </center>
                    </thead>

                        <tbody>
                        @php $no= 1; @endphp
                        @foreach ($bkeluar as $data)
                            <center>
                                <tr>
                           <td>{{  $no++ }}</td>
                           <td>{{ $data->barang->nama_barang}}</td>
                           <td>{{ $data->tgl_klr }}</td>
                           <td>{{ $data->jumlah_klr }}</td>

                                </tr>
                            </center>
                            @endforeach


                </table>
                <p>TOTAL BARANG KELUAR : {{($jumlah_klr)}}</p>
</center>
<br><br>
           <center>
                    <h2>LAPORAN PEMINJAMAN</h2>
                </center>
        <center>
                <table class="table" border="1">
                    <thead>
                        <center>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Nama Peminjam</th>
                            <th>Jumlah Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            </tr>
                        </center>
                    </thead>

                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($peminjam as $data)
                            <center>
                            <tr>
                             <td>{{ $no++ }}</td>
                             <td>{{ $data->barang->nama_barang}}</td>
                             <td>{{ $data->nama_peminjam}}</td>
                             <td>{{ $data->jumlah_pinjam }}</td>
                             <td>{{ $data->tgl_pinjam }}</td>
                                </tr>
                            </center>
                            @endforeach


                </table>

</center>
<br><br>
      <center>
                    <h2>LAPORAN PENGEMBALIAN</h2>
                </center>
        <center>
                <table class="table" border="1">
                    <thead>
                        <center>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Kembali</th>
                            <th>Tanggal Kembali</th>
                            </tr>
                        </center>
                    </thead>

                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($pengembalian as $data)
                            <center>
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $data->pinjam->nama_peminjam }}</td>
                              <td>{{ $data->barang->nama_barang }}</td>
                              <td>{{ $data->jumlah_kembali }}</td>
                              <td>{{ $data->tgl_kembali }}</td>
                                </tr>
                            </center>
                            @endforeach


                </table>

</center>
        <center>
            <script>
                window.print();
            </script>
            </center>


 --}}
