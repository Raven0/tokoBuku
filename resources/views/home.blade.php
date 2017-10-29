@extends('layouts.app')

@section('content')

@section('panelhead')
Dashboard
@endsection

@section('create')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

You are logged in! Hello <b>{{Auth::user()->name}}</b><br>

@if(Auth::user()->role == 'ADMIN')
Welcome ADMIN!
@else
Welcome USER!
@endif
@endsection
@endsection
