@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Kasir
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

<a href="kasir/create" class="btn btn-success">
    Create
</a>
<br><br>

@endsection

@section('search')
<form class="form-inline mt-2 mt-md-0" method="get" action="/kasir">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('thead')
<th>Id</th>
<th>Nama</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Status</th>
<th>Username</th>
<th>Password</th>
<th>Akses</th>
<th>Action</th>
@endsection

@section('tbody')
@foreach($var as $vars)
    <tr>
        <td>{{ $vars->id_kasir}}</td>
        <td>{{ $vars->nama}}</td>
        <td>{{ $vars->alamat}}</td>
        <td>{{ $vars->telepon}}</td>
        <td>{{ $vars->status}}</td>
        <td>{{ $vars->username}}</td>
        <td>{{ $vars->password}}</td>
        <td>{{ $vars->akses}}</td>
        <td>
            <a href="/kasir/{{$vars->id_kasir}}/edit" class="btn btn-warning" style="width:80px">
                Edit
            </a>
            <a href="{{url('kasir/delete',$vars->id_kasir)}}" class="btn btn-danger" style="width:80px">
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
