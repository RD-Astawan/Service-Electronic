
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
                            <h4 class="card-title">Edit Data Servis</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form method="post" enctype="multipart/form-data" action="/servis/update/{{ $servis->id_servis }}">
                            @csrf
                            <div class="form-group">
                            <div class="row">						
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="squareInput">Nama Customer</label>
                                        <select class="form-control input-square" id="squareInput" name="id_user" style="padding: .25rem .5rem !important; height:36px;" required>
                                            <option value="">-- Pilih Nama Customer --</option>
                                            @foreach ($users as $row)
                                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Tgl Barang Masuk</label>
                                        <input type="date" name="tgl_masuk_barang" value="{{ $servis->tgl_masuk_barang }}" class="form-control input-square" id="squareInput" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Barang</label>
                                        <select class="form-control input-square" name="jenis_barang" style="padding: .25rem .5rem !important; height:36px;" required>
                                            <option>LCD</option>
                                            <option value="hp" @if($servis->jenis_barang=="hp") selected @endif>Hp</option>
                                            <option>TV</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Merk Barang</label>
                                        <select class="form-control input-square" id="squareInput" name="merk_barang" style="padding: .25rem .5rem !important; height:36px;" required>
                                            <option>Iphone</option>
                                            <option>Oppo</option>
                                            <option value="samsung" @if($servis->merk_barang=="samsung") selected @endif>Samsung</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">Tipe Barang</label>
                                        <input type="text" name="tipe_barang" value="{{ $servis->tipe_barang }}" class="form-control input-square" id="squareInput" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="squareInput">Biaya Servis</label>
                                        <input type="text" name="biaya_servis" value="{{ $servis->biaya_servis }}" class="form-control input-square" id="squareInput" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">Tgl Barang Diambil</label>
                                        <input type="date" name="tgl_barang_diambil" value="{{ $servis->tgl_barang_diambil }}" class="form-control input-square" id="squareInput" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">Garansi</label>
                                        <input type="text" name="garansi" value="{{ $servis->garansi }}" class="form-control input-square" id="squareInput" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="identifikasi-kerusakan" @if($servis->status=="identifikasi-kerusakan") checked @endif>
                                                    <label class="form-check-label" for="inlineRadio1">Identifikasi Kerusakan</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="proses-perbaikan" @if($servis->status=="proses-perbaikan") checked @endif>
                                                        <label class="form-check-label" for="inlineRadio2">Proses Perbaikan</label>
                                                      </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="testing" @if($servis->status=="testing") checked @endif>
                                                    <label class="form-check-label" for="inlineRadio2">Testing</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="selesai" @if($servis->status=="selesai") checked @endif>
                                                        <label class="form-check-label" for="inlineRadio2">Selesai</label>
                                                      </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-secondary" type="submit">Simpan</button>
                        <a href="{{ route('teknisi') }}" class="btn btn-warning">Kembali</a>
                        </form>

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection