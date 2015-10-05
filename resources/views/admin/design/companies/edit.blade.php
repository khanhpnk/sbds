@extends('manage.layout')

@section('meta_title'){{ 'Cập nhật công ty' }}@stop
@section('meta_description'){{ 'Cập nhật công ty' }}@stop

@section('content')
  <form accept-charset="UTF-8" action="{{ route('admin.company.update', ['slug' => $company->slug]) }}" method="POST" role="form">
    <input type="hidden" name="_method" value="PUT">
    @include('admin.design.companies._form', [
      'submitBtnText' => 'Cập nhật',
    ])
  </form>
@stop
