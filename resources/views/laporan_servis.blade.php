@extends('layouts.master')
@section('title','admin-dashboar')
@push('css-page')
<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
@endpush

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Servis</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Servis</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Laporan Data Servis</h4>
                            <button onclick="switch_btn()" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-print"></i>
                                Cetak
                            </button>
                        </div>
                        <div id="panel-pemasukan">
                            <br>
                            <form action="/cetak_lap_servis" method="get" target="_blank">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" class="form-control" name="tgl_mulai">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="tgl_selesai">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm" style="margin-top:27px;">Print PDF</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width:7%;"> No </th>
                                        <th style="text-align: center">ID Servis</th>
                                        <th style="text-align: center">Nama Cust</th>
                                        <th style="text-align: center">Tanggal BM</th>
                                        <th style="text-align: center">Jenis</th>
                                        <th style="text-align: center">Merk</th>
                                        <th style="text-align: center">Tipe</th>
                                        <th style="text-align: center">Garansi</th>
                                        <th style="text-align: center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                        @foreach ($servis as $row)
                                    <tr>
                                        
                                            <td style="text-align: center">{{ $no++ }}</td>
                                            <td style="text-align: center">{{ $row->id_servis }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td style="text-align: center">{{ $row->tgl_masuk_barang }}</td>
                                            <td style="text-align: center">{{ $row->jenis_barang }}</td>
                                            <td style="text-align: center">{{ $row->merk_barang }}</td>
                                            <td style="text-align: center">{{ $row->tipe_barang }}</td>
                                            <td style="text-align: center">{{ $row->garansi }}</td>
                                            <td style="text-align: center">{{ $row->status }}</td>
                                        @endforeach
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection