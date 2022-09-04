
@extends('layouts.master')
@section('title','admin-dashboar')
@push('css-page')
<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
@endpush

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data User</h4>
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
                    <a href="#">User</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data User</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form method="post" enctype="multipart/form-data" action="/user/update/{{ $user->id }}">
                            @csrf
                            <div class="form-group">
                            <div class="row">						
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="squareInput">Nama</label>
                                        <input type="text" name="nama" value="{{ $user->nama }}" class="form-control input-square" id="squareInput" placeholder="Nama" required>
                                    </div>

                                    <div id="formCheked">
                                        <div class="form-group">
                                            <label for="squareInput">Username</label>
                                            <input type="text" name="username" value="{{ $user->username }}" class="form-control input-square" id="username" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label for="squareInput">Password</label>
                                            <input type="password" name="password" class="form-control input-square" id="password" placeholder="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kelamin</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" @if($user->jenis_kelamin=="laki-laki") checked @endif>
                                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan" @if($user->jenis_kelamin=="perempuan") checked @endif>
                                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                          </div>
                                    </div>

                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="squareInput">No Hp</label>
                                        <input type="text" name="no_hp" value="{{ $user->no_hp }}" class="form-control input-square" id="squareInput" placeholder="No Hp" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Alamat</label>
                                        <input type="text" name="alamat" value="{{ $user->alamat }}" class="form-control input-square" id="squareInput" placeholder="Alamat" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Level</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="inlineRadio1" value="admin" @if($user->level=="admin") checked @endif>
                                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="inlineRadio2" value="teknisi" @if($user->level=="teknisi") checked @endif>
                                            <label class="form-check-label" for="inlineRadio2">Teknisi</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="inlineRadio3" value="customer" @if($user->level=="customer") checked @endif>
                                            <label class="form-check-label" for="inlineRadio3">Customer</label>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-secondary" type="submit">Simpan</button>
                        <a href="{{ route('user') }}" class="btn btn-warning">Kembali</a>
                        </form>

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection