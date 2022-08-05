@extends('layouts.master')
@section('title','admin-dashboar')
@push('css-page')
<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
@endpush

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Management Profile</h4>
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
                    <a href="#">Profile</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Data Profile</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form method="post" enctype="multipart/form-data" action="{{ route('save_profile') }}">
                            @csrf
                            <div class="form-group">
                            <div class="row">						
                                <div class="col-md-12">
                                    <div class="form-group @error('judul') has-error has-feedback @enderror">
                                        <label for="squareInput">Judul</label>
                                        <input type="text" name="judul" value="{{ old('judul') }}" class="form-control input-square" id="squareInput" placeholder="Judul" required>
                                        {{-- @error('judul')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror --}}
                                    </div>

                                    <div class="form-group @error('deskripsi') has-error has-feedback @enderror>
                                        <label for="squareInput">Deskripsi</label>
                                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control input-square" required>{{ old('deskripsi') }}</textarea>
                                        {{-- @error('deskripsi')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror --}}
                                    </div>

                                    <div class="form-group @error('gambar') has-error has-feedback @enderror">
                                        <label for="squareInput">Gambar (wajib input gambar ukuran lebar:300px dan tinggi: 300px)</label>
                                        <input type="file" name="gambar" class="form-control input-square" id="squareInput" required>
                                        @error('gambar')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-secondary" type="submit">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
                        </div>
                        </form>

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection