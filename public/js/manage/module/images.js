/**
 * Module imageModule implement Revealing Module Pattern
 */
var imagesModule = (function() {
  var fileImageInput = $('#fileImage');
  var imageUrl = '';
  var imageType = "medium";
  var UPLOAD_FILE_LIMIT = 20;
  var UPLOAD_FILE_MAX_SIZE = 3; // MB
  var imagesDbJSON = "";
  var filesDeleted = [];

  var init = function() {
    imageUploadEventListener();
  };

  var setImagesDbJSON = function(val) {
    imagesDbJSON = val;
  };

  var setImageUrl = function(val) {
    imageUrl = val;
  };

  var getFilesDeleted = function() {
    return filesDeleted;
  };

  // Note: Core library file had edit
  var imageUploadEventListener = function() {
    if ('' == imagesDbJSON) {
      fileImageInput.filer({limit: UPLOAD_FILE_LIMIT, maxSize: UPLOAD_FILE_MAX_SIZE, addMore: true});
    } else {
      var files = [];
      for(var key in imagesDbJSON) {
        files.push({"name": imagesDbJSON[key], "type": "image/jpg", "file": imageUrl+'/'+imageType+imagesDbJSON[key]});
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

  return {
    init: init,
    setImagesDbJSON: setImagesDbJSON,
    setImageUrl: setImageUrl,
    getFilesDeleted: getFilesDeleted
  };
})();
