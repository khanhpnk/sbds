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
  var latInput = $('#lat');
  var lngInput = $('#lng');

  var setLocationDbJSON = function(val) {
    locationDbJSON = val;
  };

  var init = function() {
    initCity();
    initDistrict();
    initWard();
    initAddress();
    if ("" != latInput.val()) {
      mapModule.addMapMarker(latInput.val(), lngInput.val());
    }

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
    console.log("ADDRESS: " + fullAddress);
    mapModule.searchAddress(fullAddress.substring(0, fullAddress.length-2));
  };

  return {
    init: init,
    setLocationDbJSON: setLocationDbJSON
  };
})();

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