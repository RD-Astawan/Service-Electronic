@extends('layouts.master')
@section('title','admin-dashboar')
@push('css-page')
<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
@endpush
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Pesan Whatsapp</h4>
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
                    <a href="#">SMS</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Pesan Whatsapp</h4>
                            <button onclick="switch_btn()" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-print"></i>
                                Cetak
                            </button>
                        </div>
                        <div id="panel-pemasukan">
                            <br>
                            <form action="/cetak_lap_sms" method="get" target="_blank">
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
                                        <th style="text-align: center; width:7%;">No</th>
                                        <th style="text-align: center">ID SMS</th>
                                        <th style="text-align: center">Tanggal Terkirim</th>
                                        <th style="text-align: center">No Handphone</th>
                                        <th style="text-align: center">Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                        @foreach ($data as $row)
                                    <tr>
                                            <td style="text-align: center; width:7%;">{{ $no++ }}</td>
                                            <td style="text-align: center; width:10%;">{{ $row->id_sms }}</td>
                                            <td style="text-align: center; width:20%;">{{ $row->tgl_terkirim }}</td>
                                            <td style="text-align: center; width:30%;">{{ $row->no_hp }}</td>
                                            <td>{{ $row->isi_pesan }}</td>
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