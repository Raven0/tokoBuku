@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Edit Buku
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

<form action="/pasok/{{$var->id_pasok}}" method="post">
    <div class="form-group">
        <label>Distributor</label>
        <select class="form-control" name="id_distributor">
            <option value="">--SELECT--</option>
            @foreach($distributor as $v)
                <option value="{{$v->id_distributor}}"  @if($v->id_distributor == $var->id_distributor) selected @endif >{{$v->nama_distributor}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Buku</label>
        <select class="form-control" name="id_buku">
            <option value="">--SELECT--</option>
            @foreach($buku as $v)
                <option value="{{$v->id_buku}}" @if($v->id_buku == $var->id_buku) selected @endif >{{$v->judul}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" name="jumlah" value="{{$var->jumlah}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{$var->tanggal}}" class="form-control">
    </div>

    <input type="submit" value="edit" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>
@endsection
