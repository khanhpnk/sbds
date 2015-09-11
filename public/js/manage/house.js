$(function() {
  $('#houseForm').validate({
    rules: {
      title: {rangelength: [8, 64], required: true}, // thingking
      price: {maxlength: 16, digits: true, required: true},　// thingking
      money_unit: {required: true},
      category: {required: true},
      city: {required: true},
      district: {required: true},
      ward: {required: true},
      address: {required: true},
      youtube: {url: true},
      description: {rangelength: [8, 2000], required: true},
      m2: {digits: true, maxlength: 16},
      road: {maxlength: 64},
      "feature[]": {required: true},
    },
    messages: {
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