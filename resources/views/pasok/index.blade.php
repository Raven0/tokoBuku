@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Pasok
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

<a href="pasok/create" class="btn btn-success">
    Create
</a>
<br><br>

@endsection

@section('search')
<form class="form-inline mt-2 mt-md-0" method="get" action="/pasok">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('thead')
<th>Id</th>
<th>Distributor</th>
<th>Buku</th>
<th>Jumlah</th>
<th>Tanggal</th>
@endsection

@section('tbody')
@foreach($var as $vars)
    <tr>
        <td>{{ $vars->id_pasok}}</td>
        <td>{{ $vars->Distributor->nama_distributor}}</td>
        <td>{{ $vars->Buku->judul}}</td>
        <td>{{ $vars->jumlah}}</td>
        <td>{{ $vars->tanggal}}</td>
        <td>
            <a href="/pasok/{{$vars->id_pasok}}/edit" class="btn btn-warning" style="width:80px">
                Edit
            </a>
            <a href="{{url('pasok/delete',$vars->id_pasok)}}" class="btn btn-danger" style="width:80px">
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
