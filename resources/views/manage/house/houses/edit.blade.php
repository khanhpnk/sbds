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

    var locationDbJSON = {
      address: "{!! $house->address !!}",
      ward: "{{ $house->ward }}",
      district: "{{ $house->district }}",
      city: "{{ $house->city }}"
    };
  </script>
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.house.update', ['id' => $house->id]) }}" method="POST" role="form" id="houseForm">
    <input type="hidden" name="_method" value="PUT">
    @include('manage.house.houses._form', ['submitBtnText' => 'Đăng tin'])
  </form>
@stop