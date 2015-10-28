/**
 * Module companyModule implement Revealing Module Pattern
 */
var companyModule = (function() {
  var companyForm = $('#companyForm');
  var checkUniqueUrl = "";

  var init = function() {
    formEventListener();
    imageModule.init();
  };

  var setCheckUniqueUrl = function(url) {
    checkUniqueUrl = url;
  };

  var setFileImage = function(val) {
    console.log(val);
    fileImage = val;
  };

  var formEventListener = function() {
    companyForm.validate({
      rules: {
        title: {rangelength: [8, 60], required: true, remote: checkUniqueUrl},
        short_description: {rangelength: [8, 2000], required: true},
        description: {rangelength: [8, 6000], required: true},
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
  };

  return {
    init: init,
    setCheckUniqueUrl: setCheckUniqueUrl
  };
})();

