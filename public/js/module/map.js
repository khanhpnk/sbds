var frontGooglemapModule = (function() {
  var googlemap;
  var HANOI = new google.maps.LatLng(21.0277644, 105.83415979999995);
  var markerManage = []; // Manage all makers
  var infoWindow = new google.maps.InfoWindow; //  Only one infoWindow track for all makers
  var iconHouseBasePath = '/images/map/house/';
  var iconProjectBasePath = '/images/map/project/';
  var icons = {
    'sale': {
      1: {name: '', path: iconHouseBasePath + 'nha-rieng.png'},
      2: {name: '', path: iconHouseBasePath + 'can-ho.png'},
      3: {name: '', path: iconHouseBasePath + 'biet-thu.png'},
      4: {name: '', path: iconHouseBasePath + 'mat-pho.png'},
      5: {name: '', path: iconHouseBasePath + 'dat-nen-du-an.png'},
      6: {name: '', path: iconHouseBasePath + 'dat.png'},
      7: {name: '', path: iconHouseBasePath + 'kho.png'},
      8: {name: '', path: iconHouseBasePath + 'trang-trai.png'},
      9: {name: '', path: iconHouseBasePath + 'khac.png'},
    },
    'rent': {
      1: {name: '', path: iconHouseBasePath + 'nha-rieng.png'},
      2: {name: '', path: iconHouseBasePath + 'can-ho.png'},
      3: {name: '', path: iconHouseBasePath + 'biet-thu.png'},
      4: {name: '', path: iconHouseBasePath + 'mat-pho.png'},
      5: {name: '', path: iconHouseBasePath + 'dat-nen-du-an.png'},
      6: {name: '', path: iconHouseBasePath + 'dat.png'},
      7: {name: '', path: iconHouseBasePath + 'kho.png'},
      8: {name: '', path: iconHouseBasePath + 'nha-tro.png'},
      9: {name: '', path: iconHouseBasePath + 'van-phong.png'},
      10: {name: '', path: iconHouseBasePath + 'cua-hang.png'},
      11: {name: '', path: iconHouseBasePath + 'khac.png'},
    },
    'project': {
      1: {name: '', path: iconProjectBasePath + 'thuong-mai-dich-vu.png'},
      2: {name: '', path: iconProjectBasePath + 'du-lich-nghi-duong.png'},
      3: {name: '', path: iconProjectBasePath + 'can-ho-chung-cu.png'},
      4: {name: '', path: iconProjectBasePath + 'van-phong-cao-oc.png'},
      5: {name: '', path: iconProjectBasePath + 'khu-cong-nghiep.png'},
      6: {name: '', path: iconProjectBasePath + 'khu-do-thi-moi.png'},
      7: {name: '', path: iconProjectBasePath + 'khu-phuc-hop.png'},
      8: {name: '', path: iconProjectBasePath + 'khu-dan-cu.png'},
    }
  };

  var init = function(type = null, id = null) {
    //google.maps.event.addDomListener(window, "load", function() {
      googlemap = new google.maps.Map(document.getElementById("map-canvas"), {
        zoom: 15,
        center: HANOI,
        scrollwheel: false
      });
      
      if (type && id) {
      	showMarkerForDetail(type, id)
      }

      googlemap.addListener("click", function() {
        googlemap.set("scrollwheel", true);
      });
    //});

    formEventListener();
  };

  var formEventListener = function() {
    $('#searchForm').submit(function (event) {
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        dataType: 'json',
        data: $(this).serialize()
      }).done(function(data) {
        clearAllMapMarkers();
        dropMapMarkers(data);
      });

      event.preventDefault();
    });
  };
  
  var showMarkerForDetail = function(type, id) {
      $.ajax({
        url: '/map/search-marker-for-detail',
        type: "GET",
        dataType: 'json',
        data: {'id': id, 'type': type}
      }).done(function(data) {
        clearAllMapMarkers();
        dropMapMarkers(data);
      });
  };

  /**
   * Drop markers for map
   */
  var dropMapMarkers = function(markers) {
    clearAllMapMarkers();

    // Figure out the optimal viewport
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0; i < markers.length; i++) {
      dropMapMarkerWithTimeout(markers[i], i * 10);
      bounds.extend(new google.maps.LatLng(markers[i].lat, markers[i].lng));
    }
    googlemap.fitBounds(bounds);
  };

  var dropMapMarkerWithTimeout = function(marker, timeout) {
    var data = marker;

    var type = $('#type').val();
    var iconImage = "";
    var srcImage = "";
    var url = "";

    switch (type) {
      case "2":
        iconImage = icons["rent"][data.category]["path"];
        srcImage = "https://s3-ap-southeast-1.amazonaws.com/house360/house/"+data.user_id+"/large";
        url = "/nha-dat/" + data.slug;
        break;
      case "3":
        iconImage = icons["project"][data.category]["path"];
        srcImage = "https://s3-ap-southeast-1.amazonaws.com/house360/project/"+data.user_id+"/large";
        url = "/du-an/" + data.slug;
        break;
      case "1":
      default:
        iconImage = icons["sale"][data.category]["path"];
        srcImage = "https://s3-ap-southeast-1.amazonaws.com/house360/house/"+data.user_id+"/large";
        url = "/nha-dat/" + data.slug;
        break;
    }

    window.setTimeout(function() {
      var marker = new google.maps.Marker({
        map: googlemap,
        position: new google.maps.LatLng(data.lat, data.lng),
        icon: iconImage || {},
        animation: google.maps.Animation.DROP
      });

      google.maps.event.addListener(marker, 'click', function() {
        $('.iw-name').text(data.title);
        $('.iw-link').attr("href", url);
        $('.iw-image').attr("src", srcImage + data.images[0]);
        if (data.price) {
        	$('.iw-price').text('Giá: ' + priceConver(data.price, data.money_unit, data.sale_type));
      	}

        googlemap.setCenter(marker.getPosition());
        infoWindow.setContent($('.infowindow-placeholder').html());
        infoWindow.open(googlemap, marker);
      });

      google.maps.event.addListener(googlemap, 'click', function() {
        infoWindow.close();
      });

      markerManage.push(marker);
    }, timeout);
  };
  
  var priceConver = function ($price, $moneyUnit, $saleType) {
	  var moneyUnitSaleOption = {
	      1: 'Thỏa thuận',
	      2: 'triệu',
	      3: 'tỷ',
	      4: 'nghìn/m2',
	      5: 'triệu/m2',
	  };
	  
	  var moneyUnitRentOption = {
   	      1: 'Thỏa thuận',
   	      2: 'nghìn/tháng',
   	      3: 'triệu/tháng',
   	      4: 'nghìn/m2/tháng',
   	      5: 'triệu/m2/tháng',
	  }
	  
	  // console.log($price, $moneyUnit, $saleType);
	  // console.log(moneyUnitSaleOption[$moneyUnit]);
	  
      if (1 == $moneyUnit) { // thoa thuan
          return moneyUnitSaleOption[$moneyUnit];
      }

      if (0 == $saleType) { // ban
          return $price + ' ' + moneyUnitSaleOption[$moneyUnit];
      } else if (1 == $saleType) { // cho thue
          return $price + ' ' + moneyUnitRentOption[$moneyUnit];
      }
  }

  var clearAllMapMarkers = function() {
    for (var i = 0; i < markerManage.length; i++) {
      markerManage[i].setMap(null);
    }
    markerManage = [];
  };

  return {
    init: init,
  };
})();
