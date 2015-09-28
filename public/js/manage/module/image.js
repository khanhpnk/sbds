/**
 * Module imageModule implement Revealing Module Pattern
 */
var imageModule = (function() {
  var fileImageInput = $('#avatar');
  var UPLOAD_FILE_MAX_SIZE = 2; // MB
  var avatarUrl = "";

  var init = function() {
    imageUploadEventListener();
  };

  var setAvatarUrl = function(url) {
    avatarUrl = url;
    //console.log(avatarUrl);
  };

  // Note: Core library file had edit
  var imageUploadEventListener = function() {
    fileImageInput.filer({
      limit: 1, maxSize: UPLOAD_FILE_MAX_SIZE, addMore: false, excludeName: null,
      files: [{name: "Avatar", type: "image/jpg", file: avatarUrl }],
    });
  };

  return {
    init: init,
    setAvatarUrl: setAvatarUrl
  };
})();
