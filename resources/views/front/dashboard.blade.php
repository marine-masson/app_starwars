@extends('layouts.master')
@section('sidebar')
    <h1>Dashboard</h1>


@stop
@section('content')
@if(Session::has('msg'))
    <span class="warning">{{Session::get('msg')}}</span>
@else
@stop