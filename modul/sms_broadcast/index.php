<html>
 <head>
   <title>SMS Broadcast</title>
 </head>
 <body>
<div id="dalam_content">
   <h2>SMS Broadcast</h2>
   
 <?php
   // melakukan koneksi ke MySQL
   include "inc.koneksi.php";
 ?>
   
   <form method="post" action="?module=sms_broadcast">
   Tuliskan pesan SMS di sini:<br>
   <textarea name="sms" cols="40" rows="5"></textarea><br><br>
   Pilih Group:<br>
   <select name="group">
     <option>Semua</option>
	 
   <?php
      // membaca nomor Group dalam tabel PBK selain Group ID: -1
      $query = "SELECT * FROM sms_group";
      $hasil = mysql_query($query);
      while ($data = mysql_fetch_array($hasil))
      {
	  	 echo "<option value='".$data['idgroup']."'>".$data['group']."</option>";
         
      }	  
   ?> 
   </select>
   <br><br>
   <input type="submit" name="submit" value="Kirim SMS">
   </form>
</div>
 <?php
   // proses jika tombol SUBMIT diklik
   
   if (isset($_POST['submit']))
   {
      // baca bunyi SMS dari kotak
      $sms = $_POST['sms'];
	  // baca group yang dipilih dari option
	  $group = $_POST['group'];
	  
	  if ($group == "Semua")
	  {
	    // jika group yang dipilih 'semua', lakukan query untuk membaca semua no hp
	    $query = "SELECT * FROM sms_phonebook";
	  }
	  else
	  {
	    // jika yang dipilih GroupID tertentu, lakukan query untuk membaca no hp yang memiliki GroupID tertentu
	    $query = "SELECT * FROM sms_phonebook WHERE idgroup LIKE '%|$group|%'";
	  }
	  
	  $hasil = mysql_query($query);
	  while ($data = mysql_fetch_array($hasil))
	  {
	    $nohp = $data['noTelp'];
		
		// proses pengiriman SMS kepada setiap no hp hasil query
		$query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID) 
		           VALUES ('$nohp', '$sms', 'MyPhone1', 'Gammu 1.25.0')";
		mysql_query($query2);
	  }
      echo "<p>SMS sedang dikirimkan...</p>";	  
   }
 ?>
 </body>
</html>