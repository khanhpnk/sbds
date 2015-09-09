$(function() {
  mapModule.init("form-map-canvas");
  formModule.init();
  delay(function(){locationModule.init()}, 1000);
});

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
  var cityElement      = $("#city");
  var districtElement  = $("#district");
  var wardElement      = $("#ward");
  var addressElement   = $("#address");
  var districtJSON     = {};

  var init = function() {
    initOptions();
    searchAddress();
    locationEventListener();
  };

  var initOptions = function() {
    initCity();
    initDistrict();
    initWard();
    initAddress();
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
    init: init
  };
})();

/**
 * Module formModule implement Revealing Module Pattern
 */
var formModule = (function() {
  var moneyUnitElement = $('#money_unit');
  var categoryElement = $('#category');
  var latElement = $('#lat');
  var lngElement = $('#lng');
  var fileImageElement = $('#fileImage');
  var imageUrl = baseUrl + "/images/uploads/house/";

  var init = function() {
    radioEventListener();
    formSubmitEventListener();
    imageUpload();
  };

  var formSubmitEventListener = function() {
    $(document).on('submit', '#houseForm', function (event) {
      var latlng = mapModule.getMapMarker();

      latElement.val(latlng.lat());
      lngElement.val(latlng.lng());
    });
  };

  // Note:Core library file had edit
  var imageUpload = function() {
    if ('' == imagesDbJSON) {
      fileImageElement.filer({
        limit: 20,
        maxSize: 2, // MB
        addMore: true,
      });
    } else {
      var files = [];
      for(var key in imagesDbJSON) {
        files.push({
          "name": imagesDbJSON[key],
          "type": "image/jpg",
          "file": imageUrl + imagesDbJSON[key],
        });
      }

      fileImageElement.filer({
        limit: 4,
        maxSize: 2, // MB
        addMore: true,
        files: files,
        excludeName: null,
        beforeShow: function(){return true},
        onSelect: function(){},
        afterShow: function(){},
        onRemove: function(e){
          console.log(e);
        },
        onEmpty: function(){},
      });
    }
  };

  var radioEventListener = function() {
    $("input:radio[name=type]").on("change", function () {
      var moneyUnit; var category;

      switch(this.value) {
        case '1':
          moneyUnit = moneyUnitSale; category = houseCategorySale; break;
        case '2':
          moneyUnit = moneyUnitRent; category = houseCategoryRent; break;
      }

      moneyUnitElement.find("option:not(:first)").remove();
      moneyUnitElement.select2({
        minimumResultsForSearch: Infinity, allowClear: true, placeholder: "Đơn vị", data: moneyUnit
      });

      categoryElement.find("option:not(:first)").remove();
      categoryElement.select2({
        minimumResultsForSearch: Infinity, allowClear: true, placeholder: "Loại BĐS", data: category
      });
    })
  };

  return {
    init: init
  };
})();













