var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function searchJsonById(json, id) {
  return json.filter(
    function(json){ return json.id == id }
  )[0];
}