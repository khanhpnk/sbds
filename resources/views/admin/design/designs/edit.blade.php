@extends('manage.layout')

@section('meta_title'){{ 'Tạo thiết kế thi công mới' }}@stop
@section('meta_description'){{ 'Tạo thiết kế thi công mới' }}@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('admin.design.update', ['slug' => $design->slug]) }}" method="POST" role="form" id="designForm">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="PUT">
    @include('admin.design.designs._form_fieldset1')
    @include('admin.design.designs._form_fieldset2')
    @include('admin.design.designs._form_fieldset3')
  </form>
@stop
