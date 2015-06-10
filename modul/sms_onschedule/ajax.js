var page = "run.php";

function ajax(page) {
  // native XMLHttpRequest object
  if (window.XMLHttpRequest) {
    req = new XMLHttpRequest();
    req.onreadystatechange = function() {ajaxDone(target);};
    req.open("GET", page, true);
    req.send(null);
    // IE/Windows ActiveX version
  } else if (window.ActiveXObject) {
    req = new ActiveXObject("Microsoft.XMLDOM");
    if (req) {
      req.onreadystatechange = function() {ajaxDone(target);};
      req.open("GET", page, true);
      req.send(null);
    }
  }
  // pemrosesan script run.php dilakukan setiap interval 3 detik (3000 mili sekon)
  setTimeout("ajax(page)", 3000);
}

function ajaxDone(target) {
  // only if req is "loaded"
  if (req.readyState == 4) {
    // only if "OK"
    if (req.status == 200 || req.status == 304) {
      results = req.responseText;
    } else {
      req.statusText;
    }
  }
}


