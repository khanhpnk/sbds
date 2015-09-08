/**
 * Module xử lý cho location thực thi Revealing Module Pattern
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

    // city
    cityElement.select2({placeholder: "Tỉnh thành", data: locationStorageJSON});
    if ('' != locationDbJSON.city) {
      cityElement.find('option[value="'+locationDbJSON.city+'"]').attr("selected",true);
      cityElement.select2({placeholder: "Tỉnh thành"});
      locationSelectedJSON.city = cityElement.find("option:selected").text();
    }

    // district
    if ('' != locationDbJSON.district) {
      var citySelected = searchJsonById(locationStorageJSON, locationDbJSON.city);
      districtElement.select2({placeholder: "Quận / huyện", data: districtJSON = citySelected.district});
      districtElement.find('option[value="' + locationDbJSON.district + '"]').attr("selected", true);
      districtElement.select2({placeholder: "Quận / huyện"});
      locationSelectedJSON.district = districtElement.find("option:selected").text();
    }

    // ward
    if ('' != locationDbJSON.ward) {
      var districtSelected = searchJsonById(districtJSON, locationDbJSON.district);
      wardElement.select2({placeholder: "Quận / huyện", data: districtSelected.ward});
      wardElement.find('option[value="' + locationDbJSON.ward + '"]').attr("selected", true);
      wardElement.select2({placeholder: "Quận / huyện"});
      locationSelectedJSON.ward = wardElement.find("option:selected").text();
    }

    // search & add marker
    if ('' != locationDbJSON.address) {
      locationSelectedJSON.address = locationDbJSON.address;
    }

    searchAddress();

    cityChangeEvent();
    districtChangeEvent();
    wardChangeEvent();
    addressInputKeyupEvent();
  };

  var cityChangeEvent = function() {
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

  var districtChangeEvent = function() {
    districtElement.on("change", function (e) {
      var districtSelected = searchJsonById(districtJSON, $(this).val());
      locationSelectedJSON.district = districtSelected.text;
      locationSelectedJSON.ward = '';

      wardElement.find("option:not(:first)").remove();
      wardElement.select2({placeholder: "Xã / phường", data: districtSelected.ward});
      searchAddress();
    });
  };

  var wardChangeEvent = function() {
    wardElement.on("change", function (e) {
      locationSelectedJSON.ward =  $(this).find('option:selected').text();
      searchAddress();
    });
  };

  var addressInputKeyupEvent = function() {
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
 * Module xử lý cho form thực thi Revealing Module Pattern
 */
var formModule = (function() {
  var init = function() {
    typeRadio();
    formSubmit();
    imageUpload();
  };

  var formSubmit = function() {
    $(document).on('submit', '#houseForm', function (event) {
      var latlng = mapModule.getMapMarker();

      $('#lat').val(latlng.lat());
      $('#lng').val(latlng.lng());
    });
  };

  // Note:Core library file had edit
  var imageUpload = function() {
    $('#fileImage').filer({
      limit: 20,
      maxSize: 2, // MB
      addMore: true,
    });
//  $('#fileImage').filer({
//    limit: 20,
//    maxSize: 2, // MB
//    addMore: true,
//    //files: [{
//    //  name: "appended_file.jpg",
//    //  size: 5453,
//    //  type: "image/jpg",
//    //  file: "http://dummyimage.com/158x113/f9f9f9/191a1a.jpg",
//    //},{
//    //  name: "appended_file_2.png",
//    //  size: 9503,
//    //  type: "image/png",
//    //  file: "http://dummyimage.com/158x113/f9f9f9/191a1a.png",
//    //}]
//  });
  };

  var typeRadio = function() {
    $('input:radio[name=type]').on("change", function () {
      var moneyUnit;
      var category;

      switch(this.value) {
        case '1':
          moneyUnit = moneyUnitSale;
          category = houseCategorySale;
          break;
        case '2':
          moneyUnit = moneyUnitRent;
          category = houseCategoryRent;
          break;
      }

      $("#money_unit option:not(:first)").remove();
      $('#money_unit').select2({
        minimumResultsForSearch: Infinity,
        allowClear: true,
        placeholder: "Đơn vị",
        data: moneyUnit
      });

      $("#category option:not(:first)").remove();
      $('#category').select2({
        minimumResultsForSearch: Infinity,
        allowClear: true,
        placeholder: "Loại BĐS",
        data: category
      });
    })
  };

  return {
    init: init
  };
})();

$(function() {
  mapModule.init("form-map-canvas");
  formModule.init();
  delay(function(){locationModule.init()}, 1000);
});













