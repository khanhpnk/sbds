/**
 * Module mapModule implement Revealing Module Pattern
 */
var googlemap;
var mapModule = (function() {
  var markerManage = []; // Manage all makers
  var HANOI = new google.maps.LatLng(21.0277644, 105.83415979999995);

  var init = function(id) {

    google.maps.event.addDomListener(window, "load", function() {
      googlemap = new google.maps.Map(document.getElementById(id), {
        zoom: 15,
        center: HANOI,
        scrollwheel: false
      });

      googlemap.addListener("click", function() {
        googlemap.set("scrollwheel", true);
      });

      locationModule.init();

      //// Responsive map
      //google.maps.event.addDomListener(window, "resize", function() {
      //  var center = map.getCenter();
      //  google.maps.event.trigger(map, "resize");
      //  map.setCenter(center);
      //});
    });
  };

  /**
   * Solve problem with google map inside of a hidden div
   */
  //var resize = function() {
  //  google.maps.event.trigger(map, 'resize');
  //};

  /**
   * Add one markers for map
   */
  var addMapMarker = function(lat, lng) {
    clearAllMapMarkers();

    var latlng = new google.maps.LatLng(lat, lng);
    var marker = new google.maps.Marker({
      map: googlemap,
      position: latlng,
      draggable: true,
      animation: google.maps.Animation.DROP,
    });
    googlemap.setCenter(latlng);

    markerManage.push(marker);
  };

  /**
   * Get one markers for map
   */
  var getMapMarker = function() {
    return markerManage[0].getPosition();
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
          var pos = results[0].geometry.location;
          addMapMarker(pos.lat(), pos.lng());
        } else {
          return false; // not found
        }
      });
    }
  };

  return {
    init: init,
    searchAddress: searchAddress,
    getMapMarker: getMapMarker,
    //resize: resize,
    addMapMarker: addMapMarker
  };
})();
