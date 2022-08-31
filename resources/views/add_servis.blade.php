@extends('layouts.master')
@section('title','Teknisi-Service')
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
                            <h4 class="card-title">Tambah Data Servis</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form method="post" enctype="multipart/form-data" action="{{ route('servis_store') }}">
                            @csrf
                            <div class="form-group">
                            <div class="row">						
                                <div class="col-md-6">
                                    <input type="hidden" name="id_servis" value="{{ 'DTS'.$kd }}" class="form-control input-square" id="squareInput">
                                    <div class="form-group">
                                        <label for="squareInput">Nama Customer</label>
                                        <select class="form-control input-square" id="selectInput" name="id_user" onchange="selectFunction()" style="padding: .25rem .5rem !important; height:36px;" required>
                                            <option value="">-- Pilih Nama Customer --</option>
                                            @foreach ($users as $row)
                                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="hidden" name="no_hp" class="form-control input-square" id="no_hp" required>
                                    <input type="hidden" value="{{ 'SMS'.$kd_2 }}" name="id_sms" class="form-control">
                                    <input type="hidden" value="{{ date('Y-m-d H:i:s'); }}" name="tgl_terkirim" class="form-control">

                                    <div class="form-group">
                                        <label for="squareInput">Tgl Barang Masuk</label>
                                        <input type="date" name="tgl_masuk_barang" class="form-control input-square" id="squareInput" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Jenis Barang</label>
                                        <input type="text" name="jenis_barang" class="form-control input-square" id="squareInput" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Merk Barang</label>
                                        <input type="text" name="merk_barang" class="form-control input-square" id="squareInput" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Tipe Barang</label>
                                        <input type="text" name="tipe_barang" class="form-control input-square" id="squareInput" placeholder="Tipe barang" required>
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="squareInput">Biaya Servis</label>
                                        <input type="text" name="biaya_servis" class="form-control input-square" id="squareInput" placeholder="Biaya servis">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Tgl Barang Diambil</label>
                                        <input type="date" name="tgl_barang_diambil" class="form-control input-square" id="squareInput" placeholder="Alamat">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Garansi</label>
                                        <input type="text" name="garansi" class="form-control input-square" id="squareInput" placeholder="Garansi">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="identifikasi-kerusakan" required>
                                                    <label class="form-check-label" for="inlineRadio1">Identifikasi Kerusakan</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="proses-perbaikan" required>
                                                        <label class="form-check-label" for="inlineRadio2">Proses Perbaikan</label>
                                                      </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="testing" required>
                                                    <label class="form-check-label" for="inlineRadio2">Testing</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="selesai" required>
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
                        <button type="submit" class="btn btn-secondary">Simpan</button>
                        <button class="btn btn-warning">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection