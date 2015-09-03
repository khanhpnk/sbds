/**
 * Module xử lý cho map thực thi Revealing Module Pattern
 */
var mapModule = (function() {
  var map;
  var markerManage = []; // Manage all makers

  var init = function(id) {
    var HANOI = new google.maps.LatLng(21.0277644, 105.83415979999995);

    google.maps.event.addDomListener(window, "load", function() {
      map = new google.maps.Map(document.getElementById(id), {
        zoom: 15,
        center: HANOI
      });

      // Responsive map
      google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
      });
    });
  };

  /**
   * Add one markers for map
   */
  var addMapMarker = function(pos) {
    clearAllMapMarkers();

    var marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(pos.lat(), pos.lng()),
      draggable: true,
      animation: google.maps.Animation.DROP,
    });
    map.setCenter(pos);

    markerManage.push(marker);
  };

  var clearAllMapMarkers = function() {
    for (var i = 0; i < markerManage.length; i++) {
      markerManage[i].setMap(null);
    }
    markerManage = [];
  };

  var searchAddress = function(value) {
    if (value) {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({address: value}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          addMapMarker(results[0].geometry.location);
        } else {
          alert("Không tìm thấy địa chỉ tương ứng trên bản đồ!");
        }
      });
    }
  };

  return {
    init: init,
    searchAddress: searchAddress
  };
})();
