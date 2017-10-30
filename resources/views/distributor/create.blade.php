@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Tambah Distributor
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

<form action="/distributor" method="post">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama_distributor" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telepon" value="" class="form-control">
    </div>

    <input type="submit" value="create" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
</form>
@endsection
