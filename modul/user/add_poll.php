<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>

<script src="getpoll.js"></script>
<form name="form1" method="post" action="insert_poll.php">
  <table width="351" border="0" cellpadding="0" cellspacing="0" class="style1">
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="31%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="63%">&nbsp;</td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>ID Polling </td>
      <td>:</td>
      <td><input name="id_poll" type="text" id="id_poll" size="22"></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>Judul Grafik </td>
      <td>&nbsp;</td>
      <td><input name="judul_grafik" type="text" id="judul_grafik" size="22" /></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>Ket Polling </td>
      <td>:</td>
      <td><input name="ket_poll" type="text" id="ket_poll" size="22"></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>Jumlah Jawaban </td>
      <td>:</td>
      <td><select name="q1" id="q1" onClick="showUser(this.value)">
        <option value="1">1 Jawaban</option>
        <option value="2">2 Jawaban</option>
        <option value="3">3 Jawaban</option>
        <option value="4">4 Jawaban</option>
        <option value="5">5 Jawaban</option>
        <option value="6">6 Jawaban</option>
        <option value="7">7 Jawaban</option>
        <option value="8">8 Jawaban</option>
        <option value="9">9 Jawaban</option>
        <option value="10">10 Jawaban</option>
            </select>      </td>
    </tr>
  </table>
  <div id="txtHint"></div>
  <p class="style1">* id polling dan jawaban tidak boleh ada spasi </p>
</form>
