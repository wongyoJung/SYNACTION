function MouseIn(elem){
  var change = document.getElementById(elem);
  change.style="text-decoration:underline";
}

function MouseOut(elem){
  var change = document.getElementById(elem);
  change.style="text-decoration:none";
}

window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}
