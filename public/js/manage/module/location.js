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
        if ("" != latInput.val() && 0 != latInput.val()) {
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
        mapModule.searchAddress(fullAddress.substring(0, fullAddress.length-2));
    };

    return {
        init: init,
        setLocationDbJSON: setLocationDbJSON
    };
})();