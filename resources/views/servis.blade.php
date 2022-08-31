@extends('layouts.master')
@section('title','Teknisi-service')
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
                            {{-- <a href="/cetak_lap_servis" target="_blank" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Cetak
                            </a> --}}
                            <a href="{{ route('add_servis') }}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Data Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 7%;">No</th>
                                        <th style="text-align: center;">Nama Teknisi</th>
                                        <th style="text-align: center;">Tanggal BM</th>
                                        <th style="text-align: center;">Jenis</th>
                                        <th style="text-align: center;">Merk</th>
                                        <th style="text-align: center;">Biaya</th>
                                        <th style="text-align: center;">Tipe</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="width: 14%; text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                        @foreach ($servis as $row)
                                    <tr>
                                        
                                            <td style="text-align: center;">{{ $no++ }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td style="text-align: center;">{{ $row->tgl_masuk_barang }}</td>
                                            <td style="text-align: center;">{{ $row->jenis_barang }}</td>
                                            <td style="text-align: center;">{{ $row->merk_barang }}</td>
                                            <td style="text-align: center;">{{ $row->biaya_servis }}</td>
                                            <td style="text-align: center;">{{ $row->tipe_barang }}</td>
                                            <td style="text-align: center;">{{ $row->status }}</td>
                                            <td>
                                                <a href="/servis/edit/{{ $row->id_servis }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#modalHapusServis{{ $row->id_servis }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($servis as $u)
<div class="modal fade" id="modalHapusServis{{ $u->id_servis }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Servis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" enctype="multipart/form-data" action="/servis/destroy/{{ $u->id_servis }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"> Batal</i></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash"> Hapus</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection