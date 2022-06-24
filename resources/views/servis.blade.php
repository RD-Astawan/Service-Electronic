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
                            <h4 class="card-title">Data Servis</h4>
                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Teknisi</th>
                                        <th>Tanggal BM</th>
                                        <th>Jenis</th>
                                        <th>Merk</th>
                                        <th>Biaya</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th style="width: 14%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                        @foreach ($servis as $row)
                                    <tr>
                                        
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->tgl_masuk_barang }}</td>
                                            <td>{{ $row->jenis_barang }}</td>
                                            <td>{{ $row->merk_barang }}</td>
                                            <td>{{ $row->biaya_servis }}</td>
                                            <td>{{ $row->tipe_barang }}</td>
                                            <td>{{ $row->status }}</td>
                                            <td>
                                                <a href="/user/edit/{{ $row->id }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#modalHapusUser{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
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