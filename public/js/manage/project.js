/**
 * Module projectModule implement Revealing Module Pattern
 */
var projectModule = (function() {
  var projectForm = $('#projectForm');
  var latInput = $('#lat');
  var lngInput = $('#lng');
  var filesDeletedHiddenInput = $('#files_deleted');
  var checkUniqueUrl = "";

  var init = function() {
    imageModule.init();
    formEventListener();
  };

  var setCheckUniqueUrl = function(url) {
    checkUniqueUrl = url;
  };

  var formEventListener = function() {
    projectForm.validate({
      rules: {
        title: {rangelength: [8, 64], required: true, remote: checkUniqueUrl},
        description: {rangelength: [8, 6000], required: true},
        schedule: {rangelength: [8, 6000], required: true},
        location: {rangelength: [8, 6000], required: true},
        category: {required: true},
        city: {required: true},
        district: {required: true},
        ward: {required: true},
        address: {required: true},
        youtube: {url: true},

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

    $(document).on('submit', '#projectForm', function (event) {
      var latlng = mapModule.getMapMarker();

      latInput.val(latlng.lat());
      lngInput.val(latlng.lng());
      filesDeletedHiddenInput.val(JSON.stringify(imageModule.getFilesDeleted()));
    });
  };

  return {
    init: init,
    setCheckUniqueUrl: setCheckUniqueUrl,
  };
})();