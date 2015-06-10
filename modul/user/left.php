<link rel="stylesheet" type="text/css" href="simpletree.css" />

<style type="text/css">
<!--
#ok {	
	position:absolute;
	left:10px;
	top:375px;
	width:283px;
	height:114px;
	z-index:1;
}
    
#sidebar {
	float: left;
	width: 220px;
	color: #787878;
	padding-top: 5px;
	padding-right: 0;
	padding-bottom: 0;
	padding-left: 0px;
}

#sidebar ul {
	margin: 0;
	padding: 0;
	list-style: none;
	font-size: 11px;
}

#sidebar li {
	margin: 0;
	padding: 0;
}

#sidebar li ul {
	padding-bottom: 30px;
}

#sidebar li li {
	margin-left: 15px;
	margin-right: 15px;
	line-height: 35px;
	border-bottom: 1px dashed #D2D4C9;
}

#sidebar li li span {
	display: block;
	margin-top: -20px;
	padding: 0;
	font-size: 11px;
	font-style: italic;
}


#sidebar p {
	margin: 0 15px;
	padding-bottom: 20px;
	text-align: justify;
}

#sidebar a {
	color: #704A21;
	border: none;
}

#sidebar a:hover {
	text-decoration: none;
	color: #787878;
} 
</style>

<script type="text/javascript" src="simpletreemenu.js"></script>

<script type="text/javascript">

			function Ajax()
			{
				var
					$http,
					$self = arguments.callee;

				if (window.XMLHttpRequest) {
					$http = new XMLHttpRequest();
				} else if (window.ActiveXObject) {
					try {
						$http = new ActiveXObject('Msxml2.XMLHTTP');
					} catch(e) {
						$http = new ActiveXObject('Microsoft.XMLHTTP');
					}
				}

				if ($http) {
					$http.onreadystatechange = function()
					{
						if (/4|^complete$/.test($http.readyState)) {
							document.getElementById('ok').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 10000);
						}
					};
					$http.open('GET', 'index1.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}

			}


		</script>

		<script type="text/javascript">
			setTimeout(function() {Ajax();}, 10000);
		</script>


<?php
$id=$_GET['id'];
if ($id=='beranda')
{
?>

<div id="sidebar">
<ul>
 <li>
  <ul class="List LeftNavBasic RelP lnav_relpB">
    <li> <a href="index.php?id=beranda" title="beranda">Beranda</a> </li>
	<?php 
	if($status==admin)
	{
	?>
	<li> <a href="user_account.php?id=beranda" title="User Account">User Account</a> </li>
	<?php
	}
	else
	{
	}
	?>
    <li> <a href="my_account.php?id=beranda" title="Account ku">Account ku</a> </li>

<ul id="treemenu1" class="treeview">
<li><a href="#">Pengaturan</a>
	<ul>
	<?php
	$peng=mysql_query("SELECT * FROM pengaturan");
	while($tmpl_peng=mysql_fetch_array($peng))
	{
	echo"
	<a href='$tmpl_peng[link]?id=beranda'>&nbsp;&nbsp;<img src='img/folder.gif' /> &nbsp;$tmpl_peng[nama]</a>
	";
	}
	?>
	</ul>
</li>

    <li> <a href="tambah_modem.php?id=beranda" title="tambah modem">Modem</a> </li>

	<li><a href="#" title="polling">Polling</a>
	<ul>
	<a href='poling.php?id=beranda'>&nbsp;&nbsp;<img src='img/folder.gif' /> Data Polling</a>
	<a href='grafik_poll.php?id=beranda'>&nbsp;&nbsp;<img src='img/folder.gif' /> Grafik Polling</a>
	<a href='gambar_poll.php?id=beranda'>&nbsp;&nbsp;<img src='img/folder.gif' /> Gambar Polling</a>

	</ul>
</li>

    <li> <a href="#" title="cek pulsa" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', '../pulsa.php', 'Cek Pulsa', 'width=360px,height=330px,center=1,resize=0,scrolling=0', 'recal')">Cek Pulsa</a> </li>
    <li> <a href="logout.php" title="logout">Logout</a> </li>
  </ul>
 </li>
</ul>
</div>
<?php
}
?>
<?php
if ($id=='autorespond')
{
?>

<div id="sidebar">
<ul>
 <li>
  <ul class="List LeftNavBasic RelP lnav_relpB">
    <li> <a href="seting_autorespond.php?id=autorespond" title="Autorespond">Autorespond</a> </li>
<ul id="treemenu1" class="treeview">
<li><a href="addon_autorespond.php?id=autorespond#">Addon Autorespond</a>
	<ul>
	<?php
	$addin=mysql_query("SELECT * FROM addin_autorespond where aktif='1'");
	while($tmpl_addin=mysql_fetch_array($addin))
	{
	echo"
	<a href='$tmpl_addin[link]?id=autorespond'>&nbsp;&nbsp;<img src='img/folder.gif' /> &nbsp;$tmpl_addin[nama]</a>
	";
	}
	?>
	</ul>
</li>
    <li> <a href="logout.php" title="logout">Logout</a> </li>
  </ul>
 </li>
</ul>
</div>
<?php
}
?>


<?php
if ($id=='kotak_masuk')
{
?>

<div id="sidebar">
  <ul>
    <li>

  <ul class="List LeftNavBasic RelP lnav_relpB">
    <li> <a href="tulis_sms.php?id=kotak_masuk">Kirim SMS </a> </li>
    <li> <a href="tulis_sms_khusus.php?id=kotak_masuk">Kirim SMS (No Khusus)</a> </li>
    <li> <a href="tulis_sms_group.php?id=kotak_masuk">Kirim SMS Group</a> </li>
    <li> <a href="sms_excel.php?id=kotak_masuk">Kirim SMS dari Excel</a></li>
    <ul id="treemenu1" class="treeview">
	<?php
	$in=mysql_query("select SenderNumber from inbox");
	$jin=mysql_num_rows($in);
	?>
      <li><a href="inbox.php?id=kotak_masuk#">Kotak Masuk (<?php echo"$jin"; ?>)</a>
          <ul>
            <?php
	$grupsms=mysql_query("SELECT * FROM grup_sms");
	while($tmpl_grupsms=mysql_fetch_array($grupsms))
	{
	$sms=mysql_query("SELECT * FROM inbox_grup_sms where id_grup='$tmpl_grupsms[nama]'");
	$j_sms=mysql_num_rows($sms);
	echo"
	<a href='inbox_grup.php?id=kotak_masuk&grup=$tmpl_grupsms[nama]'>&nbsp;&nbsp;<img src='img/folder.gif' /> &nbsp;$tmpl_grupsms[nama] ($j_sms)</a>
	";
	}
	$sent=mysql_query("SELECT DestinationNumber from sentitems");
$jsent=mysql_num_rows($sent);
$out=mysql_query("SELECT DestinationNumber from outbox");
$jout=mysql_num_rows($out);

	?>
            </ul>
      </li>
      <li> <a href="outbox.php?id=kotak_masuk">Laporan Pengiriman (<?php echo"$jsent";?>)</a> </li>
      <li> <a href="outbox_schedule.php?id=kotak_masuk">Laporan Pengiriman Terjadwal</a> </li>
      <li> <a href="outbox1.php?id=kotak_masuk">Outbox SMS (<?php echo"$jout";?>)</a> </li>
      <li> <a href="template_sms.php?id=kotak_masuk">Template SMS</a> </li>
      <li> <a href="folder_sms.php?id=kotak_masuk">Folder SMS</a> </li>
      <li> <a href="percetakan_sms.php?id=kotak_masuk">Percetakan SMS</a> </li>
      <li> <a href="logout.php" title="logout">Logout</a> </li>
    </ul>
    </li>
</ul>
    </li>
</div>
<?php
}
?>

<?php
if ($id=='data_pelanggan')
{
?>

<div id="sidebar">
  <ul>
    <li>

  <ul class="List LeftNavBasic RelP lnav_relpB">
    <li> <a href="data_pelanggan.php?id=data_pelanggan">No Telepon </a> </li>
    <li> <a href="data_group.php?id=data_pelanggan">Group Telepon </a> </li>

    <li> <a href="logout.php" title="logout">Logout</a> </li>
  </ul>
  </li>
  </ul>
    </li>
</div>
<?php
}
?>



<script type="text/javascript">

//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))

ddtreemenu.createTree("treemenu1", true)
ddtreemenu.createTree("treemenu2", false)

</script>
<table id="ok">

</table>