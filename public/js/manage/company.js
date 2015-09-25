/**
 * Module companyModule implement Revealing Module Pattern
 */
var companyModule = (function() {
  var companyForm = $('#companyForm');
  var companyColapse = $('#collapseOne');
  var houseColapse = $('#collapseTwo');
  var checkUniqueUrl = "";
  var isEdit = false; // new resource is false, else true

  var init = function() {
    // by default in css config display house form, change to display company form
    // is new company
    if (false == isEdit) {
      companyColapse.collapse('show');
      houseColapse.collapse('hide');
    }

    accordionEventListener();
    formEventListener();
  };

  var setCheckUniqueUrl = function(url) {
    checkUniqueUrl = url;
  };

  var setIsEdit = function(val) {
    isEdit = val;
  };

  var accordionEventListener = function(val) {
    $('#accordion').on('show.bs.collapse', function () {
      $('#accordion .in').collapse('hide');
    });
  };

  var formEventListener = function() {
    companyForm.validate({
      rules: {
        title: {rangelength: [8, 50], required: true, remote: checkUniqueUrl},
        short_description: {rangelength: [8, 1000], required: true},
        description: {rangelength: [8, 2000], required: true},
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
      },
      submitHandler: function(form) {
        var submitBtn = $(form).find(":submit");
        submitBtn.button("loading");

        $.ajax({
          url: $(form).attr("action"),
          type: isEdit ? "PUT" : "POST",
          dataType: "json",
          data: $(form).serialize()
        }).done(function (data) {
          isEdit = true;
          companyColapse.collapse('hide');
          houseColapse.collapse('show');
          submitBtn.button('reset');

          mapModule.resize();
        });
      }
    });
  };

  return {
    init: init,
    setCheckUniqueUrl: setCheckUniqueUrl,
    setIsEdit: setIsEdit
  };
})();

