@extends('one_col_layout')

@section('meta_title') Tin mới @stop
@section('meta_description') Tin mới @stop

@section('breadcrumb')
  <li class="active">Tin mới</li>
@stop

@section('content')

  <header><h1 class="thumb-title">Tin mới</h1></header>
  {{-- */ $i = 1; /* --}}
  @if (0 < count($houses))
    <section>
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($houses as $house)
            @if (in_array($i++, [1, 2, 11, 12]))
              @include('partial.resource.house._item_large', ['model' => $house])
            @else
              @include('partial.resource.house._item', ['model' => $house, 'col' => 3])
            @endif
          @endforeach
        </div>
      </div>
    </section>
    <nav class="simple-pagination">{!! $houses->appends(Input::except('page'))->render() !!}</nav>
  @else
    Không có dữ liệu!
  @endif

@stop

