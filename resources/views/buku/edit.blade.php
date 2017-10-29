@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Edit Pinjaman
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
<form action="/anggota/{{$var->id_anggota}}" method="post">
    <div class="form-group">
        <label>Nama Anggota</label>
        <input type="text" name="nama" value="{{$var->nama}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{$var->alamat}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Tgl Lahir</label>
        <input type="date" name="tgl_lhr" value="{{$var->tgl_lhr}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tmp_lhr" value="{{$var->tmp_lhr}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control" name="j_kel">
            <option value="PRIA" @if($var->j_kel == 'PRIA') selected @endif>PRIA</option>
            <option value="WANITA" @if($var->j_kel == 'WANITA') selected @endif>WANTIA</option>
        </select>
    </div>
    <div class="form-group">
        <label>Status</label>
        <input type="text" name="status" value="{{$var->status}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="no_tlp" value="{{$var->no_tlp}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="ket" value="{{$var->ket}}" class="form-control">
    </div>

    <input type="submit" value="edit" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>
@endsection
