@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Manage User
@endsection

@if(Auth::user()->role == 'ADMIN')
@section('search')
<form class="form-inline mt-2 mt-md-0" method="get" action="/usermanage">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('thead')
<th>Id</th>
<th>Nama</th>
<th>Role</th>
<th>Action</th>
@endsection

@section('tbody')
@foreach($var as $vars)
    <tr>
        <td>{{ $vars->id}}</td>
        <td>{{ $vars->name}}</td>
        <td>{{ $vars->role}}</td>
        <td>
            <a href="/usermanage/{{$vars->id}}/edit" class="btn btn-warning">
                Edit
            </a>
            <!-- <a href="{{url('usermanage/delete',$vars->id)}}" class="btn btn-danger">
                Delete
            </a> -->
        </td>
    </tr>
@endforeach
@endsection

@section('paginate')
{{ $var->links() }}
@endsection
@else
Welcome User
@endif
