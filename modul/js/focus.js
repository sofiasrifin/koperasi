function OnLoad() {
  gaia_setFocus();
}
 
var PAD = '.000000'; 
 function gaia_setFocus() {
  var f = null;
  if (document.getElementById) { 
    f = document.getElementById("form");
  } else if (window.form) { 
    f = window.form;
  } 
  if (f) {
    if (f.no_anggota.value == null || f.no_anggota.value == "") { 
      f.no_anggota.focus();
    } 
  }
}