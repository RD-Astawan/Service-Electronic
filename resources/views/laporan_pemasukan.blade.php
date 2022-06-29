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
                            <h4 class="card-title">Data Pemasukan Bulanan</h4>
                            <a class="btn btn-primary ml-auto" target="_blank" href="{{ url('downloadpdf') }}">Export to PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
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
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                        @foreach ($servis as $row)
                                    <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->id_servis }}</td>
                                            <td>{{ $row->tgl_masuk_barang }}</td>
                                            <td>{{ $row->jenis_barang }}</td>
                                            <td>{{ $row->merk_barang }}</td>
                                            <td>{{ $row->tipe_barang }}</td>
                                            <td>{{ $row->tgl_barang_diambil }}</td>
                                            <td>{{ $row->garansi }}</td>
                                            <td>{{ $row->biaya_servis }}</td>
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