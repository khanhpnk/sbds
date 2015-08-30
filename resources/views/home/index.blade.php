@extends('layout')

@section('style')
	@parent
	<link href="/css/home.css" rel="stylesheet">
@stop

@section('content')
	@include('home._featured')
	@include('home._new')
	@include('home._featured_project')
	@include('home._house_sell')
	@include('home._house_rent')
	@include('home._construction_design')
@stop