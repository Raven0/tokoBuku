@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Tambah Pasok
@endsection

@section('create')

@if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif

@if(Session::get('message') == NULL)
    <div class="alert alert-success alert-dismissible fade in" role="alert" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ Session::get('message') }}</strong>
    </div>
@else
    <div class="alert alert-warning" role="alert">
        <strong>{{ Session::get('message') }}</strong>
    </div>
@endif

<form action="/pasok" method="post">
    <div class="form-group">
        <label>Distributor</label>
        <select class="form-control" name="id_distributor">
            <option value="">--SELECT--</option>
            @foreach($distributor as $v)
                <option value="{{$v->id_distributor}}">{{$v->nama_distributor}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Buku</label>
        <select class="form-control" name="id_buku">
            <option value="">--SELECT--</option>
            @foreach($buku as $v)
                <option value="{{$v->id_buku}}">{{$v->judul}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" name="jumlah" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="" class="form-control">
    </div>

    <input type="submit" value="create" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
</form>
@endsection
