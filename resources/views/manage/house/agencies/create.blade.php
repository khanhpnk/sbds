@extends('manage.layout')

@section('meta_title')
  Môi giới đăng tin
@stop

@section('title')
  Môi giới đăng tin
@stop

@section('javascript')
  @parent
  <script>
    $(function() {
      //('#collapseOne').collapse('show');

      $('#companyForm').submit(function (event) {
        createCompanyAction($(this));
        event.preventDefault();
      });

      function createCompanyAction(form) {
        var submitBtn = form.find(':submit');
        submitBtn.button('loading');

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          dataType: 'json',
          data: form.serialize()
        }).done(function (data) {
          submitBtn.button('reset');
        });
      }

      $.mockjax({
        url: "company.action",
        response: function(settings) {
          var house = settings.data.title,
              houses = ["12345678", "aaaaaaaa"];
          this.responseText = "true";
          if ($.inArray(house, houses) !== -1) {
            this.responseText = "false";
          }
        },
        responseTime: 500
      });

      // just for the demos, avoids form submit
      //jQuery.validator.setDefaults({debug: true, success: "valid"});


      $('#companyForm').validate({
        rules: {
          title: {rangelength: [8, 64], required: true, remote: "company.action"},
          description: {rangelength: [8, 2000], required: true},
        },
        messages: {
          title: {
            required: "Bạn cần nhập tiêu đề.",
            minlength: jQuery.validator.format("Bạn cần nhập ít nhất {0} ký tự"),
            remote: jQuery.validator.format("Tiêu đề với nội dung {0} là đã được sử dụng")
          },
          price: "Bạn cần nhập giá tiền.",
          "feature[]": "Bạn cần chọn ít nhất một giá trị.",
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
          if (element.is("select") || element.is(":checkbox")) {
            error.appendTo(element.closest('.form-group'));
          } else {
            error.insertAfter(element);
          }
        }
      });

    });
  </script>
@stop

@section('content')
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          Giới thiệu về công ty môi giới
        </a></h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <form accept-charset="UTF-8" action="{{ route('m.agency.store') }}" method="POST" role="form" id="companyForm">
            @include('partial.form._text', ['name' => 'title', 'label' => 'Tên công ty'])
            @include('partial.form._textarea', ['name' => 'short_description', 'label' => 'Giới thiệu ngắn gọn', 'rows' => 4])
            @include('partial.form._textarea', ['name' => 'description', 'label' => 'Giới thiệu chi tiết', 'rows' => 8])
            <button type="submit" class="btn btn-primary btn-block" autocomplete="off">Tạo mới công ty ngay để đăng tin </button>
          </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Môi giới đăng tin
        </a></h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.agency.store') }}" method="POST" role="form" id="houseForm">
            <input type="hidden" id="is_owner" name="is_owner" value="2">
            @include('manage.house.partial._form', ['submitBtnText' => 'Đăng tin ngay'])
          </form>
        </div>
      </div>
    </div>
  </div>
@stop