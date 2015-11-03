@extends('manage.layout')

@section('meta_title'){{ 'Hộp tin' }}@stop
@section('meta_description'){{ 'Hộp tin' }}@stop

@section('style')
	@parent
	<style>
		.modal-dialog {
			margin: 60px auto;
		}
	</style>
@endsection

@section('content')
	<!-- Show the form for creating a new MESSAGE -->
	@include('manage.messages._modal_create')

	<div class="message-toolbar">
		<a role="button" href="{{ route('message.index', 'inbox') }}" class="btn btn-primary">Hộp tin nhận</a>
		<a role="button" href="{{ route('message.index', 'sent') }}" class="btn btn-primary">Hộp tin gửi</a>

		<div class="btn-group" role="toolbar" aria-label="Thanh công cụ">
			<a href="{{ URL::current() }}" role="button" class="btn btn-info"><i class="fa fa-refresh"></i></a>
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#createMessageModal"><i class="fa fa-pencil-square-o"></i> Soạn tin</button>
			<button type="button" class="btn btn-info" id="deleteMessageBtn" autocomplete="off"><i class="fa fa-trash-o"></i></button>
		</div>

		<nav class="simple-pagination">{!! $messages->render() !!}</nav>
	</div>

	<p class="text-success">{{-- Placehouse success message --}}</p>

	<!-- Show the table for list MESSAGE -->
	@if (0 < count($messages))
		@include('manage.messages._list')
	@else
		<div class="notice notice-info">
			<strong>Thông báo: </strong> Hiện bạn chưa có tin nhắn nào trong hộp tin!
		</div>
	@endif
@stop
