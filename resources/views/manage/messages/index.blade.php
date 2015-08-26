@extends('manage')

@section('content')
	<div class="main-head">
		<h3>HỘP TIN</h3>
		{{--<form action="#" class="pull-right">--}}
			{{--<input type="text" class="main-head-input" placeholder="Tìm kiếm tin nhắn">--}}
			{{--<button class="btn main-head-btn" type="button"><i class="fa fa-search-plus"></i></button>--}}
		{{--</form>--}}
	</div>

	<div class="main-body">
		<!-- Show the form for creating a new MESSAGE -->
		@include('manage.messages._modal_create')

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
		<!-- Show the table for list MESSAGE -->
		@include('manage.messages._list')
	</div>
@stop
