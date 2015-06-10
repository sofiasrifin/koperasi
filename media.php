<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Koperasi Mahasiswa UNESA</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/themes/pepper-grinder/easyui.css">
<link rel="stylesheet" type="text/css" href="css/themes/icon.css">
<link rel="stylesheet" href="css/style_content.css" type="text/css"/>
<link rel="stylesheet" href="css/style_table.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/themes/cupertino/easyui.css">
<link rel="stylesheet" type="text/css" href="css/themes/base/jquery.ui.all.css" />
<link rel="stylesheet" type="text/css" href="css/flexigrid.pack.css" />
<link rel="stylesheet" type="text/css" href="css/style_input.css">
<link type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/halaman.css" />
<link rel="stylesheet" type="text/css" href="css/standar.css" />

<script type="text/javascript" src="js/jquery.ui.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="css/themes/base/jquery.ui.autocomplete.css" />
 
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<!--
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>		
-->
 <script type="text/javascript" src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js"></script>


<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>


<script type="text/javascript" src="js/jquery.easyui.min.js"></script>

<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker-id.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/flexigrid.pack.js"></script>
<link rel="stylesheet" type="text/css" href="css/paging.css">

<script type="text/javascript" src="js/jquery.paginate.js"></script>
<link rel="stylesheet" type="text/css" href="css/paginate.css">
<!--
<script type='text/javascript' src='js/entertotab.js'></script>

-->
</script>

</head>
<body>
<!--Bagian Header-->
<div class="header" style="height:70px;background:white;padding:2px;margin:0;">	
		<div style="float:left; padding:0px; margin:0px;">
        	<img  src="foto/kopma_unesa_2013.png" style="padding:0; margin:0;" width="85" height="71">
        </div>
        <div class="judul" style="float:left; line-height:3px; margin-top:0px; padding:2px 5px;">
        <?php
		include "inc/inc.koneksi.php";
		include "inc/class_paging.php";
		$q = mysql_query("SELECT * FROM profile WHERE id='1'");
		while($r=mysql_fetch_array($q)){
        	echo "<h1>".$r['koperasi']."</h1>";
			echo "<p><b>Sistem Informasi Koperasi Mahasiswa UNESA</b></p>
     		 <p>".$r['alamat']."</p>";
		}
		?>
      </div>
		
</div>	
	<!-- Menu Atas -->
	<div class="panel-header" fit="true" style="height:21px;padding-top:1px;padding-right:20px">
		<div style="float:left;">
			<a style="color:#000;" href="?module=home" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-home">Home</a>
            <a style="color:#000;" href="logout.php" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-out">Logout</a>
		</div>
	</div>
    
	<!-- Menu kiri -->
    <div id="kiri" style="float:left;;">
    	<div id="Profil" class="easyui-panel" title="Profil Pengguna" style="float:left;width:170px;height:90px;padding:5px;">
        <img style="float:left;padding:2px;" src="foto/<?php echo $_SESSION['foto'];?>" width="50" height="50" align="middle" />
        <p style="line-height:15px;">
        <b> <?php echo $_SESSION['namalengkap'];?> </b><br />
        <a href="?module=edit_profil">Edit Profil</a>
        </p>
        </div>		
        <?php include 'menu_new.php';?>
    </div>       
    <div id="tt" class="easyui-tabs" style="height:480px;">
        <div title="Pengguna : <?php echo $_SESSION['namalengkap'].' - '.$_SESSION['level'];?>" style="padding:5px">
		 <?php include 'content.php'; ?>
        </div>
    </div>	

<div class="panel-header" fit="true" style="height:20px;text-align:center;">	    
Copyright &copy; Koperasi.
<!-- <a href="http://bebiy.com">Copyright &copy; Asrifin Sofi.</a> -->
</div>
</body>
</html>