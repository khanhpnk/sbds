/**
 * Module projectModule implement Revealing Module Pattern
 */
var projectModule = (function() {
  var projectForm = $('#projectForm');
  var fileImageInput = $('#fileImage');
  var latInput = $('#lat');
  var lngInput = $('#lng');
  var filesDeletedHiddenInput = $('#files_deleted');
  var filesDeleted = [];
  var imagesDbJSON = "";
  var imageUrl = baseUrl + "/images/uploads/project/";
  var UPLOAD_FILE_LIMIT = 20;
  var UPLOAD_FILE_MAX_SIZE = 2; // MB
  var checkUniqueUrl = "";

  var init = function() {
    imageUploadEventListener();
    formEventListener();
  };

  var setCheckUniqueUrl = function(url) {
    checkUniqueUrl = url;
  };

  var setImagesDbJSON = function(val) {
    imagesDbJSON = val;
  };

  // Note: Core library file had edit
  var imageUploadEventListener = function() {
    if ('' == imagesDbJSON) {
      fileImageInput.filer({limit: UPLOAD_FILE_LIMIT, maxSize: UPLOAD_FILE_MAX_SIZE, addMore: true});
    } else {
      var files = [];
      for(var key in imagesDbJSON) {
        files.push({"name": imagesDbJSON[key], "type": "image/jpg", "file": imageUrl + imagesDbJSON[key]});
      }

      fileImageInput.filer({
        limit: UPLOAD_FILE_LIMIT, maxSize: UPLOAD_FILE_MAX_SIZE,
        addMore: true, files: files,
        excludeName: null,
        onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl) {
          filesDeleted.push(file.name);
        }
      });
    }
  };

  var formEventListener = function() {
    projectForm.validate({
      rules: {
        title: {rangelength: [8, 64], required: true, remote: checkUniqueUrl},
        description: {rangelength: [8, 2000], required: true},
        schedule: {rangelength: [8, 2000], required: true},
        location: {rangelength: [8, 2000], required: true},
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
      filesDeletedHiddenInput.val(JSON.stringify(filesDeleted));
    });
  };

  return {
    init: init,
    setCheckUniqueUrl: setCheckUniqueUrl,
    setImagesDbJSON: setImagesDbJSON
  };
})();