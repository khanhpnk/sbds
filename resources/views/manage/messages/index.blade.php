@extends('manage.layout')

@section('meta_title')
	Hộp tin
@stop

@section('title')
	Hộp tin
@stop

@section('content')
	<!-- Show the form for creating a new MESSAGE -->
	@include('manage.messages._modal_create')

	<!-- Show the table for list MESSAGE -->
	@if (0 < count($messages))
		<div class="message-toolbar">
			<a role="button" href="{{ route('message.index', ['inbox' => 'inbox']) }}" class="btn btn-primary">Hộp tin đến</a>
			<a role="button" href="{{ route('message.index', ['inbox' => 'sent']) }}" class="btn btn-primary">Hộp tin đi</a>

			<div class="btn-group" role="toolbar" aria-label="Thanh công cụ">
				<a href="{{ URL::current() }}" role="button" class="btn btn-info"><i class="fa fa-refresh"></i></a>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#createMessageModal"><i class="fa fa-pencil-square-o"></i> Soạn tin</button>
				<button type="button" class="btn btn-info" id="deleteMessageBtn" autocomplete="off"><i class="fa fa-trash-o"></i></button>
			</div>

			<nav class="simple-pagination">{!! $messages->render() !!}</nav>
		</div>

		<p class="text-success">{{-- Placehouse success message --}}</p>

		@include('manage.messages._list')
	@else
		<div class="notice notice-info">
			<strong>Thông báo: </strong> Hiện bạn chưa có tin nhắn nào trong hộp tin!
			<a href="#" data-toggle="modal" data-target="#createMessageModal"><i class="fa fa-pencil-square-o"></i> Soạn tin ngay</a>
		</div>
		@endif
@stop
