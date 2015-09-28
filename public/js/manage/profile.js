/**
 * Module profileModule implement Revealing Module Pattern
 */
var profileModule = (function() {
  var profileForm = $('#profileForm');
  var latInput = $('#lat');
  var lngInput = $('#lng');

  var fileImageInput = $('#fileImage');
  var UPLOAD_FILE_MAX_SIZE = 2; // MB
  var avatarPath = "";

  var init = function() {
    imageUploadEventListener();
    formEventListener();
  };

  var setAvatarPath = function(val) {
    avatarPath = val;
  };

  // Note: Core library file had edit
  var imageUploadEventListener = function() {
      fileImageInput.filer({
        limit: 1, maxSize: UPLOAD_FILE_MAX_SIZE,
        addMore: false,
        files: [{
          name: "Ảnh đại diện",
          type: "image/jpg",
          file: avatarPath,
        }],
        excludeName: null,
      });
  };

  var formEventListener = function() {
    profileForm.validate({
      rules: {
        name: {required: true},
        email: {required: true},
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

    $(document).on('submit', '#profileForm', function (event) {
      var latlng = mapModule.getMapMarker();

      latInput.val(latlng.lat());
      lngInput.val(latlng.lng());
    });
  };

  return {
    init: init,
    setAvatarPath: setAvatarPath
  };
})();