var articleModule = (function() {
  var init = function(elm) {
    formValidate(elm);
  };

  var formValidate = function(elm) {
    validateFrom = $(elm).validate({
      rules: {
        title: {rangelength: [8, 64], required: true},
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