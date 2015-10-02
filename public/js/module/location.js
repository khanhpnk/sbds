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
        cityElement.select2({placeholder: "Tỉnh thành", allowClear: true, data: locationStorageJSON});
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
            locationSelectedJSON = {ward: "", district: "", city: citySelected.text};

            districtElement.select2({placeholder: "Quận / huyện", allowClear: true, data: districtJSON = citySelected.district});
        });
    };

    var districtEventListener = function() {
        districtElement.on("change", function (e) {
            var districtSelected = searchJsonById(districtJSON, $(this).val());
            locationSelectedJSON.district = districtSelected.text;
            locationSelectedJSON.ward = '';

            wardElement.select2({placeholder: "Xã / phường", allowClear: true, data: districtSelected.ward});
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