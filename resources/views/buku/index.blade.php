@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Buku
@endsection

@if(Auth::user()->role == 'ADMIN')
@section('create')

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

<a href="buku/create" class="btn btn-success">
    Create
</a>
<br><br>

@endsection

@section('search')
<form class="form-inline mt-2 mt-md-0" method="get" action="/buku">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('thead')
<th>Id</th>
<th>ISBN</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Penerbit</th>
<th>Tahun</th>
<th>Stok</th>
<th>Harga Pokok</th>
<th>Harga Jual</th>
<th>PPN</th>
<th>Diskon</th>
<th>Action</th>
@endsection

@section('tbody')
@foreach($var as $vars)
    <tr>
        <td>{{ $vars->id_buku}}</td>
        <td>{{ $vars->noisbn}}</td>
        <td>{{ $vars->judul}}</td>
        <td>{{ $vars->penulis}}</td>
        <td>{{ $vars->penerbit}}</td>
        <td>{{ $vars->tahun}}</td>
        <td>{{ $vars->stok}}</td>
        <td>{{ $vars->harga_pokok}}</td>
        <td>{{ $vars->harga_jual}}</td>
        <td>{{ $vars->ppn}}</td>
        <td>{{ $vars->diskon}}</td>
        <td>
            <a href="/buku/{{$vars->id_buku}}/edit" class="btn btn-warning" style="width:80px">
                Edit
            </a>
            <a href="{{url('buku/delete',$vars->id_buku)}}" class="btn btn-danger" style="width:80px">
                Delete
            </a>
        </td>
    </tr>
@endforeach
@endsection

@section('paginate')
{{ $var->links() }}
@endsection
@else
@section('create')
Welcome USER!
@endsection
@endif
