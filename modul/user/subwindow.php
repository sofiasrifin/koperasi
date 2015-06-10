<html>

<script language="JavaScript">
<!--
// Set nilai elemen opener
function setSelected(fld) {
  opener.document.forms[0].sender.value = fld.value;
  // Tutup window ini (subwindow)
  
}
//-->
</script>

<p>
  <select name="sex" size="3" multiple onChange="setSelected(this);">
    <option></option>
    <option value="Pria">Pria</option>
    <option value="Wanita">Wanita</option>
  </select>
  
  
  <a href="#" onClick="setSelected(this);">pilih</a></p>
<p>
  <input type="checkbox" name="checkbox" value="ok" onClick="setSelected(this);"> 
  ok
</p>
</html>