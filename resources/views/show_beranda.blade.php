@extends('layouts.master')
@section('title','admin-dashboar')
@push('css-page')
<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
@endpush

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Beranda</h4>
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
                    <a href="#">Beranda</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Beranda</h4>
                            <a href="{{ route('add_beranda') }}" class="btn btn-primary btn-round ml-auto" style="color: white;">
                                <i class="fa fa-plus"></i>
                                Add Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width:7%;">No</th>
                                        <th style="text-align: center; width:30%;">Judul</th>
                                        <th style="text-align: center; width:30%;">Deskripsi</th>
                                        <th style="text-align: center; width:10%;">Gambar</th>
                                        <th style="width: 13%; text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                        @foreach ($data as $row)
                                    <tr>
                                        
                                            <td style="text-align: center;">{{ $no++ }}</td>
                                            <td>{{ $row->judul }}</td>
                                            <td style="text-align: center;">{{ $row->deskripsi }}</td>
                                            <td style="text-align: center;">
                                                <img src="{{ asset('storage/'.$row->gambar) }}" alt="" class="img-tumbnail" width="120px;" height="70px;">
                                            </td>
                                            <td>
                                                <a href="/beranda/edit/{{ $row->id_beranda }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#modalHapusBeranda{{ $row->id_beranda }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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
@foreach ($data as $u)
<div class="modal fade" id="modalHapusBeranda{{ $u->id_beranda }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Beranda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" enctype="multipart/form-data" action="/beranda/destroy/{{ $u->id_beranda }}">
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