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
        <h2>Laporan Barang Keluar</h2>
        <br>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Keluar</th>
                    <th>Jumlah Keluar</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1 @endphp
                <!-- data -->
                @foreach ($bkeluar as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->barang->nama_barang }}</td>
                        <td>{{ $data->tgl_klr }}</td>
                        <td>{{ $data->jumlah_klr }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="float: right;">Jumlah : <b>{{ $jumlah_klr }}</b></p>
    </center>

    <form action="{{ route('cetak.laporan') }}" method="post">
        <input type="hidden" name="tanggalAwal" value="{{ $start }}">
        <input type="hidden" name="tanggalAkhir" value="{{ $end }}">
        <input type="hidden" name="cetak" value="keluar">
        @csrf
        <br>
        <center>
            <button name="submit" type="submit" class="btn btn-primary btn-block btn-lg">
                <em class="fa fa-print">&nbsp;</em> Cetak</button>
        </center>
    </form>

</body>

</html>
