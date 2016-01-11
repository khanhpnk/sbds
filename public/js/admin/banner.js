/**
 * Module bannerModule implement Revealing Module Pattern
 */
var bannerModule = (function() {
  var init = function() {
    imagesModule.init();
    formEventListener();
  };

  var formEventListener = function() {
    $(document).on('submit', '#bannerForm', function (event) {
      $('#files_deleted').val(JSON.stringify(imagesModule.getFilesDeleted()));
    });
  };

  return {
    init: init,
  };
})();