<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
    .line-title{
        border:0;
        border-style:inset;
        border-top:1px solid #000;
    }
    body{
        background-color: white;

    }
</style>
</head>
<body onload="window.print()">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <span style="line-height:1.6; font-weight: bold;">
                                    WAHYU SERVICE ELEKTRONIK
                                </span>
                            </td>
                        </tr>
                    </table>
                    <hr class="line-title">
                    <p align="center">
                        Laporan Data Pemasukan Bulanan
                    </p>
                    <p align="center">
                        Periode Tanggal {{ $tgl_mulai }} s/d {{ $tgl_selesai }} 
                    </p>
                    <hr>

                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">ID Servis</th>
                            <th style="text-align: center">Tanggal BM</th>
                            <th style="text-align: center">Jenis</th>
                            <th style="text-align: center">Merk</th>
                            <th style="text-align: center">Tipe</th>
                            <th style="text-align: center">Tanggal BD</th>
                            <th style="text-align: center">Garansi</th>
                            <th style="text-align: center">Biaya</th>
                        </tr>
                        @php $no=1 @endphp
                        @foreach ($data_akhir as $row)
                            <tr>
                                <td style="text-align: center">{{ $no++ }}</td>
                                <td style="text-align: center">{{ $row->id_servis }}</td>
                                <td style="text-align: center">{{ $row->tgl_masuk_barang }}</td>
                                <td style="text-align: center">{{ $row->jenis_barang }}</td>
                                <td style="text-align: center">{{ $row->merk_barang }}</td>
                                <td style="text-align: center">{{ $row->tipe_barang }}</td>
                                <td style="text-align: center">{{ $row->tgl_barang_diambil }}</td>
                                <td style="text-align: center">{{ $row->garansi }}</td>
                                <td style="text-align: center">{{ $row->biaya_servis }}</td>
                            </tr>
                    @endforeach
                            <tr>
                                <td colspan="8"><b>Total Biaya</b></td>
                                <td>Rp. {{ number_format($sum_biaya) }}</td>
                            </tr>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>