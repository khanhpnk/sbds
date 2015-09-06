@extends('manage.layout')

@section('title')
  Chính chủ đăng tin
@stop

@section('jshead')
  @parent
  <script>
    var moneyUnitSale     = {!! MoneyUnitSaleOption::getJsonOptions() !!};
    var moneyUnitRent     = {!! MoneyUnitRentOption::getJsonOptions() !!};
    var houseCategorySale = {!! HouseCategorySaleOption::getJsonOptions() !!};
    var houseCategoryRent = {!! HouseCategoryRentOption::getJsonOptions() !!};
  </script>
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.house.store') }}" method="POST" role="form" id="houseForm">
    @include('manage.house.houses._form', ['submitBtnText' => 'Đăng tin'])
  </form>
@stop