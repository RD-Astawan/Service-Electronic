@extends('layouts.master')
@section('title','Teknisi-sms')
@push('css-page')
<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
@endpush

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data SMS</h4>
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
                            <h4 class="card-title">Data SMS Gateway</h4>
                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form method="POST" action="/custom">
                                @csrf
                                <input type="hidden" value="{{ 'SMS'.$kd }}" name="id_sms" class="form-control">
                                <div class="form-group">
                                    <input type="hidden" value="{{ date('Y-m-d H:i:s'); }}" name="tgl_terkirim" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Select contact</label>
                                    <select name="no_hp[]" multiple class="form-control contact">
                                        @foreach ($no_hp as $user)
                                        <option value="{{$user->no_hp}}">{{$user->no_hp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="body" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Send</button>
                            </form>
                        </div>
                                          
@endsection