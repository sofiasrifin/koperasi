<?php
session_start();
include "../../inc/inc.koneksi.php";
//include "../../inc/fungsi_hdt.php";
include "../../inc/fungsi_tanggal.php";

$table			="jurnal";
$tableD			="d_jurnal";
$kode			=str_replace("'","\'",$_POST[kode]);
//$nobukti		=str_replace("'","\'",$_POST[nobukti]);
$tgl			=jin_date_sql($_POST[tgl]);
$keterangan		=str_replace("'","\'",$_POST[keterangan]);
$kodeakun		=str_replace("'","\'",$_POST[kodeakun]);
$namaakun		=str_replace("'","\'",$_POST[namaakun]);
$debetkredit	=str_replace("'","\'",$_POST[debetkredit]);
$jml			=str_replace("'","\'",$_POST[jml]);
//$kredit			=str_replace("'","\'",$_POST[kredit]);

$where		= "WHERE no_jurnal= '$kode'";
$whereD		= "WHERE no_jurnal= '$kode' AND kode_akun='$kodeakun'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);

if ($row>0){
	$input	= "UPDATE $table SET 
				tgl			='$tgl',
				uraian		='$keterangan'
				$where";
	mysql_query($input);
	
	//update tabel d_jurnal
	$sqlD = mysql_query("SELECT *
						FROM $tableD
						$whereD");
	$rowD	= mysql_num_rows($sqlD);
	
	if($rowD>0 and $debetkredit=='debet'){
		$inputD = " UPDATE $tableD SET
					debet		= '$jml',
					kredit		= '0'
					$where";	
		mysql_query($inputD);		
	}elseif($rowD>0 and $debetkredit=='kredit'){
		$inputD = "UPDATE $tableD SET
					kredit		= '$jml',
					debet		= '0'
					$where";
		mysql_query($inputD);
	}
	/*
	else{
		$inputD = "INSERT INTO $tableD 
			(no_jurnal,kode_akun,debet,kredit)
			VALUES
			('$kode','$kodeakun','$debet','$kredit')";
		mysql_query($inputD);
	}		
	*/				
	echo "<b>Data Sukses diubah</b>";
}else{
	//jurnal
	$input = "INSERT INTO $table 
			(no_jurnal,tgl,uraian)
			VALUES
			('$kode','$tgl','$keterangan')";
	mysql_query($input);
	
	//detail jurnal
	if($debetkredit=='debet'){
		$inputD = " INSERT INTO $tableD
					(no_jurnal,kode_akun,debet,kredit)
					VALUES
					('$kode','$kodeakun','$jml','0')";	
		mysql_query($inputD);	
			
	}elseif($debetkredit=='kredit'){
		$inputD = "INSERT INTO $tableD
					(no_jurnal,kode_akun,debet,kredit)
					VALUES
					('$kode','$kodeakun','0','$jml')";	
		mysql_query($inputD);
	}
	/*
	$inputD = "INSERT INTO $tableD
			(no_jurnal,kode_akun,debet,kredit)
			VALUES
			('$kode','$kodeakun','$debet',$'kredit')";
	mysql_query($inputD);
	*/
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>