/**
 * Module locationModule implement Revealing Module Pattern
 */
var locationModule = (function() {
  var locationSelectedJSON = {
    address:  "",
    ward: "",
    district: "",
    city: ""
  };
  var locationDbJSON = [];
  var cityElement      = $("#city");
  var districtElement  = $("#district");
  var wardElement      = $("#ward");
  var addressElement   = $("#address");
  var districtJSON     = {};

  var setLocationDbJSON = function(val) {
    locationDbJSON = val;
  };

  var init = function() {
    initCity();
    initDistrict();
    initWard();
    initAddress();
    searchAddress();
    locationEventListener();
  };

  var locationEventListener = function() {
    cityEventListener();
    districtEventListener();
    wardEventListener();
    addressEventListener();
  };

  var initCity = function() {
    cityElement.select2({placeholder: "Tỉnh thành", data: locationStorageJSON});
    if ('' != locationDbJSON.city) {
      cityElement.find('option[value="'+locationDbJSON.city+'"]').attr("selected",true);
      cityElement.select2({placeholder: "Tỉnh thành"});
      locationSelectedJSON.city = cityElement.find("option:selected").text();
    }
  };

  var initDistrict = function() {
    if ('' != locationDbJSON.district) {
      var citySelected = searchJsonById(locationStorageJSON, locationDbJSON.city);
      districtElement.select2({placeholder: "Quận / huyện", data: districtJSON = citySelected.district});
      districtElement.find('option[value="' + locationDbJSON.district + '"]').attr("selected", true);
      districtElement.select2({placeholder: "Quận / huyện"});
      locationSelectedJSON.district = districtElement.find("option:selected").text();
    }
  };

  var initWard = function() {
    if ('' != locationDbJSON.ward) {
      var districtSelected = searchJsonById(districtJSON, locationDbJSON.district);
      wardElement.select2({placeholder: "Quận / huyện", data: districtSelected.ward});
      wardElement.find('option[value="' + locationDbJSON.ward + '"]').attr("selected", true);
      wardElement.select2({placeholder: "Quận / huyện"});
      locationSelectedJSON.ward = wardElement.find("option:selected").text();
    }
  };

  var initAddress = function() {
    if ('' != locationDbJSON.address) {
      locationSelectedJSON.address = locationDbJSON.address;
    }
  };

  var cityEventListener = function() {
    cityElement.on("change", function (e) {
      var citySelected = searchJsonById(locationStorageJSON, $(this).val());
      locationSelectedJSON.city = citySelected.text;
      locationSelectedJSON.district = '';
      locationSelectedJSON.ward = '';

      districtElement.find("option:not(:first)").remove();
      districtElement.select2({placeholder: "Quận / huyện", data: districtJSON = citySelected.district});
      searchAddress();
    });
  };

  var districtEventListener = function() {
    districtElement.on("change", function (e) {
      var districtSelected = searchJsonById(districtJSON, $(this).val());
      locationSelectedJSON.district = districtSelected.text;
      locationSelectedJSON.ward = '';

      wardElement.find("option:not(:first)").remove();
      wardElement.select2({placeholder: "Xã / phường", data: districtSelected.ward});
      searchAddress();
    });
  };

  var wardEventListener = function() {
    wardElement.on("change", function (e) {
      locationSelectedJSON.ward =  $(this).find('option:selected').text();
      searchAddress();
    });
  };

  var addressEventListener = function() {
    addressElement.on("keyup", function () {
      locationSelectedJSON.address = $(this).val();
      delay(function(){searchAddress()}, 1000);
    });
  };

  var searchAddress = function() {
    var fullAddress = "";
    $.each(locationSelectedJSON, function(key, value) {
      if ("" != value) {
        fullAddress += value + ", ";
      }
    });
    console.log(fullAddress);
    mapModule.searchAddress(fullAddress.substring(0, fullAddress.length-2));
  };

  return {
    init: init,
    setLocationDbJSON: setLocationDbJSON
  };
})();

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
        title: {rangelength: [8, 64], required: true, remote: checkUniqueUrl},
        price: {maxlength: 16, digits: true, required: true},
        money_unit: {required: true},
        category: {required: true},
        city: {required: true},
        district: {required: true},
        ward: {required: true},
        address: {required: true},
        youtube: {url: true},
        description: {rangelength: [8, 2000], required: true},
        m2: {digits: true, maxlength: 16},
        road: {maxlength: 64},
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