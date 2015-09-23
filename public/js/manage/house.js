/**
 * Module houseModule implement Revealing Module Pattern
 */
var houseModule = (function() {
  var houseForm = $('#houseForm');
  var moneyUnitSelect = $('#money_unit');
  var categorySelect = $('#category');
  var fileImageInput = $('#fileImage');
  var latInput = $('#lat');
  var lngInput = $('#lng');
  var filesDeletedHiddenInput = $('#files_deleted');
  var filesDeleted = [];
  var imagesDbJSON = "";
  var imageUrl = baseUrl + "/images/uploads/house/";
  var UPLOAD_FILE_LIMIT = 20;
  var UPLOAD_FILE_MAX_SIZE = 2; // MB
  var checkUniqueUrl = "";
  var moneyUnitSale = [];
  var moneyUnitRent = [];
  var houseCategorySale = [];
  var houseCategoryRent = [];

  var init = function() {
    radioEventListener();
    imageUploadEventListener();
    formEventListener();
  };

  var setCheckUniqueUrl = function(url) {
    checkUniqueUrl = url;
  };

  var setMoneyUnitSale = function(val) {
    moneyUnitSale = val;
  };

  var setMoneyUnitRent = function(val) {
    moneyUnitRent = val;
  };

  var setMoneyCategorySale = function(val) {
    houseCategorySale = val;
  };

  var setMoneyCategoryRent = function(val) {
    houseCategoryRent = val;
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

  var radioEventListener = function() {
    $("input:radio[name=is_sale]").on("change", function () {
      var moneyUnit; var category;

      switch(this.value) {
        case '1':
          moneyUnit = moneyUnitSale; category = houseCategorySale; break;
        case '2':
          moneyUnit = moneyUnitRent; category = houseCategoryRent; break;
      }

      moneyUnitSelect.find("option:not(:first)").remove();
      moneyUnitSelect.select2({
        minimumResultsForSearch: Infinity, allowClear: true, placeholder: "Đơn vị", data: moneyUnit
      });

      categorySelect.find("option:not(:first)").remove();
      categorySelect.select2({
        minimumResultsForSearch: Infinity, allowClear: true, placeholder: "Loại BĐS", data: category
      });
    })
  };

  var formEventListener = function() {
    houseForm.validate({
      rules: {
        title: {rangelength: [8, 48], required: true, remote: checkUniqueUrl},
        price: {maxlength: 5, number: true, required: true},
        money_unit: {required: true},
        category: {required: true},
        city: {required: true},
        district: {required: true},
        ward: {required: true},
        address: {maxlength: 32, required: true},
        youtube: {url: true},
        description: {rangelength: [8, 2000], required: true},
        m2: {digits: true, maxlength: 16},
        road: {digits: true, maxlength: 16},
        "feature[]": {required: true},
      },
      messages: {
        "feature[]": "Bạn cần chọn ít nhất một giá trị.",
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

    $(document).on('submit', '#houseForm', function (event) {
      var latlng = mapModule.getMapMarker();

      latInput.val(latlng.lat());
      lngInput.val(latlng.lng());
      filesDeletedHiddenInput.val(JSON.stringify(filesDeleted));
    });
  };

  return {
    init: init,
    setCheckUniqueUrl: setCheckUniqueUrl,
    setMoneyUnitSale: setMoneyUnitSale,
    setMoneyUnitRent: setMoneyUnitRent,
    setMoneyCategorySale: setMoneyCategorySale,
    setMoneyCategoryRent: setMoneyCategoryRent,
    setImagesDbJSON: setImagesDbJSON
  };
})();