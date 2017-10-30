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

<form action="/distributor/{{$var->id_distributor}}" method="post">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama_distributor" value="{{$var->nama_distributor}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{$var->alamat}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telepon" value="{{$var->telepon}}" class="form-control">
    </div>

    <input type="submit" value="edit" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>
@endsection
