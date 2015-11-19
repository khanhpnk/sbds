@extends('layout')

@section('breadcrumb')
  <li class="active">{{ $label }}</li>
@stop
@section('meta_title') {{ $label }} @stop
@section('meta_description') {{ $label }} @stop

@section('content')

  <header><h1 class="thumb-title">{{ $label }}</h1></header>
  @if (0 < count($houses))
    <section>
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($houses as $house)
            @include('partial.resource.house._item', ['model' => $house])
          @endforeach
        </div>
      </div>
    </section>
    <nav class="simple-pagination">{!! $houses->render() !!}</nav>
  @else
    Không có dữ liệu!
  @endif

@stop

