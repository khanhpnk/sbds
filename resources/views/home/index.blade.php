@extends('layout')

@section('style')
	@parent
	<link href="/css/home.css" rel="stylesheet">
@stop

@section('content')
	@include('home._house_featured')
	@include('home._house_new')
	@include('home._house_project_featured')
	@include('home._house_sell')
	@include('home._house_rent')
	@include('home._house_project')
	@include('home._construction_design')
@stop