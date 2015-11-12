/**
 * Module projectModule implement Revealing Module Pattern
 */
var projectModule = (function() {
  var checkUniqueUrl = "";

  var init = function() {
    imagesModule.init();
    formEventListener();
  };

  var setCheckUniqueUrl = function(url) {
    checkUniqueUrl = url;
  };

  var formEventListener = function() {
    $('#projectForm').validate({
      rules: {
        title: {rangelength: [8, 60], required: true, remote: checkUniqueUrl},
        description: {rangelength: [8, 6000], required: true},
        schedule: {rangelength: [8, 6000], required: true},
        location: {rangelength: [8, 6000], required: true},
        category: {required: true},
        city: {required: true},
        district: {required: true},
        ward: {required: true},
        address: {maxlength: 32},
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
        error.insertAfter(element);
      }
    });

    $(document).on('submit', '#projectForm', function (event) {
      var latlng = mapModule.getMapMarker();

      $('#lat').val(latlng.lat());
      $('#lng').val(latlng.lng());
      $('#files_deleted').val(JSON.stringify(imagesModule.getFilesDeleted()));
    });
  };

  return {
    init: init,
    setCheckUniqueUrl: setCheckUniqueUrl,
  };
})();