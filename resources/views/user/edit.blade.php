@extends('layouts.app')
<style>
    button{
        width: 100px;
    }
</style>

@section('panelhead')
Edit User Role
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
<form action="/usermanage/{{$var->id}}" method="post">
    <div class="form-group">
        <label> Role </label>
        <select class="form-control" name="role">
            <option value="ADMIN" @if($var->role == 'ADMIN') selected @endif>ADMIN</option>
            <option value="USER" @if($var->role == 'USER') selected @endif>USER</option>
        </select>
    </div>

    <input type="submit" value="edit" class="btn btn-success">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>
@endsection
