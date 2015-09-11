/**
 * Module locationModule implement Revealing Module Pattern
 */
var companyModule = (function() {
  var companyForm = $('#companyForm');
  var companyColapse = $('#collapseOne');
  var houseColapse = $('#collapseTwo');
  var checkUniqueUrl = "";
  var id = 0; // if is new resource => id is 0, else => id is id of resource

  var init = function() {
    // default in css config display house form, change to display company form if is still has not been added
    if (0 != id) {
      companyColapse.collapse('show');
      houseColapse.collapse('hide');
    }

    accordionEventListener();
    formEventListener();
  };

  var setUrl = function(url) {
    checkUniqueUrl = url;
  };

  var setId = function(val) {
    id = val;
  };

  var accordionEventListener = function(val) {
    $('#accordion').on('show.bs.collapse', function () {
      $('#accordion .in').collapse('hide');
    });
  };

  var formEventListener = function() {
    companyForm.validate({
      rules: {
        title: {
          rangelength: [8, 50],
          required: true,
          remote: {
            url: checkUniqueUrl,
            data: {
              id: function() {return id;}
            }
          }
        },
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
          type: $(form).attr("method"),
          dataType: "json",
          data: $(form).serialize()
        }).done(function (data) {
          companyColapse.collapse('hide');
          houseColapse.collapse('show');
          submitBtn.button('reset');
        });
      }
    });
  };

  return {
    init: init,
    setUrl: setUrl,
    setId: setId
  };
})();

