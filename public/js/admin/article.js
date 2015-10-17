var articleModule = (function() {
  var init = function(elm) {
    formValidate(elm);
  };

  var formValidate = function(elm) {
    validateFrom = $(elm).validate({
      rules: {
        category_id: {required: true, digits: true},
        title: {rangelength: [8, 62], required: true},
        description: {rangelength: [8, 6000], required: true},
      },
      highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function (error, element) {
        error.insertAfter(element);
      }
    });
  }

  return {
    init: init,
  };
})();