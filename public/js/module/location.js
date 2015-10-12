/**
 * Module frontLocationModule implement Revealing Module Pattern
 */
var frontLocationModule = (function() {
    var locationSelectedJSON = {
        ward: "",
        district: "",
        city: ""
    };
    var cityElement      = $("#city");
    var districtElement  = $("#district");
    var wardElement      = $("#ward");
    var districtJSON     = {};

    var init = function() {
        cityElement.select2({placeholder: "Tỉnh thành", data: locationStorageJSON});
        locationEventListener();
    };

    var locationEventListener = function() {
        cityEventListener();
        districtEventListener();
        wardEventListener();
    };

    var cityEventListener = function() {
        cityElement.on("change", function (e) {
            var citySelected = searchJsonById(locationStorageJSON, $(this).val());
            locationSelectedJSON.city = citySelected.text;
            locationSelectedJSON.district = '';
            locationSelectedJSON.ward = '';

            districtElement.find("option:not(:first)").remove();
            districtElement.select2({placeholder: "Quận / huyện", data: districtJSON = citySelected.district});
        });
    };

    var districtEventListener = function() {
        districtElement.on("change", function (e) {
            var districtSelected = searchJsonById(districtJSON, $(this).val());
            locationSelectedJSON.district = districtSelected.text;
            locationSelectedJSON.ward = '';

            wardElement.find("option:not(:first)").remove();
            wardElement.select2({placeholder: "Xã / phường", data: districtSelected.ward});
        });
    };

    var wardEventListener = function() {
        wardElement.on("change", function (e) {
            locationSelectedJSON.ward =  $(this).find('option:selected').text();
        });
    };

    return {
        init: init
    };
})();