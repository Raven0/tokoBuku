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
<form action="/buku/{{$var->id_buku}}" method="post">
    <div class="form-group">
        <label>ISBN</label>
        <input type="text" name="noisbn" value="{{$var->noisbn}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" value="{{$var->judul}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Pengarang</label>
        <input type="text" name="penulis" value="{{$var->penulis}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="{{$var->penerbit}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Tahun</label>
        <input type="text" name="tahun" value="{{$var->tahun}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="stok" value="{{$var->stok}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Harga Pokok</label>
        <input type="text" name="harga_pokok" value="{{$var->harga_pokok}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" value="{{$var->harga_jual}}" class="form-control">
    </div>
    <div class="form-group">
        <label>PPN</label>
        <input type="text" name="ppn" value="{{$var->ppn}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Diskon</label>
        <input type="text" name="diskon" value="{{$var->diskon}}" class="form-control">
    </div>

    <input type="submit" value="edit" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>
@endsection
