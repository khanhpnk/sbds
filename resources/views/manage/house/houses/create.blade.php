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
      address: "",
      ward: "",
      district: "",
      city: ""
    };
  </script>
@stop

@section('javascript')
  @parent
  <script>
    $(function() {
      // just for the demos, avoids form submit
      jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
      });
      $('form').validate({
        rules: {
          title: {rangelength: [8, 64], required: true}, // thingking
          price: {maxlength: 16, digits: true, required: true},　// thingking
          money_unit: {required: true},
          category: {required: true},
          city: {required: true},
          district: {required: true},
          ward: {required: true},
          youtube: {url: true},
          description: {rangelength: [8, 2000], required: true},
          m2: {digits: true},
        },
        highlight: function(element) {
          $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
          $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
          error.insertAfter(element);
        }
      });
    });
  </script>
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.house.store') }}" method="POST" role="form" id="houseForm">
    @include('manage.house.houses._form', ['submitBtnText' => 'Đăng tin'])
  </form>
@stop