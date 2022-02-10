@extends('base')

@section('content')

<h1>Hello Admin {{Auth::user()->username}}</h1>

<a href="{{route('admin.logout')}}">Logout</a>

@endsection