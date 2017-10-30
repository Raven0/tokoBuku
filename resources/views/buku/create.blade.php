@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Tambah Buku
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

<form action="/buku" method="post">
    <div class="form-group">
        <label>ISBN</label>
        <input type="text" name="noisbn" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Pengarang</label>
        <input type="text" name="penulis" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Tahun</label>
        <input type="text" name="tahun" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="stok" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Harga Pokok</label>
        <input type="text" name="harga_pokok" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>PPN</label>
        <input type="text" name="ppn" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Diskon</label>
        <input type="text" name="diskon" value="" class="form-control">
    </div>

    <input type="submit" value="create" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
</form>
@endsection
