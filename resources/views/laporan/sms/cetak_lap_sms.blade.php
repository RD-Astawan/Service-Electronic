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
                        Laporan Data Pesan Whatsapp
                    </p>
                    <p align="center">
                        Periode Tanggal {{ $tgl_mulai }} s/d {{ $tgl_selesai }} 
                    </p>
                    <hr>

                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align: center; width:7%;">No</th>
                            <th style="text-align: center">ID SMS</th>
                            <th style="text-align: center">Tanggal Terkirim</th>
                            <th style="text-align: center">No Handphone</th>
                            <th style="text-align: center">Pesan</th>
                        </tr>
                        @php $no=1 @endphp
                        @foreach ($data_akhir as $row)
                        <tr>
                            <td style="text-align: center; width:7%;">{{ $no++ }}</td>
                            <td style="text-align: center; width:10%;">{{ $row->id_sms }}</td>
                            <td style="text-align: center; width:20%;">{{ $row->tgl_terkirim }}</td>
                            <td style="text-align: center; width:30%;">{{ $row->no_hp }}</td>
                            <td>{{ $row->isi_pesan }}</td>
                        </tr>
                        @endforeach
                    </table> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>