var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function searchJson(json, text) {
  return json.filter(
    function(json){ return json.text == text }
  )[0];
}