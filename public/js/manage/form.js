/**
 * Module xử lý cho location thực thi Revealing Module Pattern
 */
var locationModule = (function() {
  var $cityElement      = $('#city');
  var $districtElement  = $('#district');
  var $wardElement      = $('#ward');
  var $addressElement   = $('#address');
  var $districtJson     = {};

  var init = function() {
    $cityElement.select2({placeholder: "Tỉnh thành", data: $locationJsonGlobal});

    $cityElement.on("change", function (e) {
      $districtJson = searchJson($locationJsonGlobal, this.options[e.target.selectedIndex].text).district;

      $("#district option:not(:first)").remove();
      $districtElement.select2({placeholder: "Quận / huyện", data: $districtJson});
    });

    $districtElement.on("change", function (e) {
      var $ward = searchJson($districtJson, this.options[e.target.selectedIndex].text).ward;

      $("#ward option:not(:first)").remove();
      $wardElement.select2({placeholder: "Xã / phường", data: $ward});
    })

    $addressElement.on("keyup", function () {
      var $val = $(this).val();

      delay(function(){
        mapModule.searchAddress($val);
      }, 1000 );
    });
  };

  return {
    init: init
  };
})();


var $addressCombine = '';


$(function() {
  locationModule.init();
  mapModule.init();

  //$(document).on('submit', '#houseForm', function (event) {
  //  var latlng = markerManage[0].getPosition();
  //
  //  $('#lat').val(latlng.lat());
  //  $('#lng').val(latlng.lng());
  //});
});

//$(function() {
//  $('input:radio[name=category]').on('change', function () {
//    $("#unit option:not(:first)").remove();
//    var $data;
//
//    switch(this.value) {
//      case '1':
//        $data = $unitSell; break;
//      case '2':
//        $data = $unitRent; break;
//    }
//
//    $('#unit').select2({
//      minimumResultsForSearch: Infinity,
//      allowClear: true,
//      placeholder: "Đơn vị",
//      data: $data
//    });
//  })
//});
//
//$(function() {
//  // Note:Core library file had edit
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
//});













