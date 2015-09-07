/**
 * Module xử lý cho location thực thi Revealing Module Pattern
 */
var locationModule = (function() {
  var positionJSON = {
    address:  "",
    ward: "",
    district: "",
    city: ""
  };
  var cityElement      = $("#city");
  var districtElement  = $("#district");
  var wardElement      = $("#ward");
  var districtJson     = {};

  var init = function() {
    citySelect();
    districtSelect();
    wardSelect();
    addressInputText();
  };

  var addressInputText = function() {
    $("#address").on("keyup", function () {
      positionJSON.address = $(this).val();

      delay(function(){
        searchAddress();
      }, 1000 );
    });
  };

  var wardSelect = function() {
    wardElement.on("change", function (e) {
      positionJSON.ward = this.options[e.target.selectedIndex].text;

      searchAddress();
    });
  };

  var districtSelect = function() {
    districtElement.on("change", function (e) {
      positionJSON.district = this.options[e.target.selectedIndex].text;
      positionJSON.ward = '';

      searchAddress();

      $("#ward option:not(:first)").remove();
      wardElement.select2({
        placeholder: "Xã / phường",
        data: searchJson(districtJson, positionJSON.district).ward});
    });
  };

  var citySelect = function() {
    cityElement.select2({placeholder: "Tỉnh thành", data: locationJSON});
    cityElement.on("change", function (e) {
      positionJSON.city = this.options[e.target.selectedIndex].text;
      positionJSON.district = '';
      positionJSON.ward = '';

      searchAddress();

      $("#district option:not(:first)").remove();
      districtElement.select2({
        placeholder: "Quận / huyện",
        data: districtJson = searchJson(locationJSON, positionJSON.city).district
      });
    });
  };

  var searchAddress = function() {
    var fullAddress = "";
    $.each(positionJSON, function(key, value) {
      if ("" != value) {
        fullAddress += value + ", ";
      }
    });

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
  formModule.init();
  locationModule.init();
  mapModule.init("form-map-canvas");
});













