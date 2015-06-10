<?
$jngka=mysql_query("select jangka,denda from properties");
$tt=mysql_fetch_array($jngka);
$jangka=$tt[jangka];
$dnda=$tt[denda];
$pinj="select id_buku,tgl,bln,thn from pinjaman where no_anggota=$no_anggota AND kembali='0'";
$r=mysql_query($pinj);
$j=mysql_num_rows($r);
$i=1;
if($j<>0)
{
?>
<b>Buku-buku yang anda pinjam </b>
<?
}
while($c=mysql_fetch_array($r))
{
$thn=$c[thn];
$bln=$c[bln];
$tgl=$c[tgl];

$thn1=date(Y);
$bln1=date(m);
$tgl1=date(d);

// sel thn, bln, tgl //
$sel_thn=$thn1-$thn;
$sel_bln=$bln1-$bln;
$sel_tgl=$tgl1-$tgl;

// jumlah hari per tahun//

if ($sel_thn<>0 and $thn==2008 or $thn==2012 or $thn==2016)
{
$thn_hari=366;
}
else{
$thn_hari=365;
}

// jumlah hari tiap bulan //
$hari1=31;
	if ($bln==02 and $thn==2008 or $thn==2012 or $thn==2016)
	{
	$hari2=29;
	}
	elseif ($bln==02 and $thn<>2008 or $thn<>2012 or $thn<>2016)
	{
	$hari2=28;
	}
	if ($bln<>02 and $thn==2008 or $thn==2012 or $thn==2016)
	{
	$hari2=29;
	}
	elseif ($bln<>02 and $thn<>2008 or $thn<>2012 or $thn<>2016)
	{
	$hari2=28;
	}
$hari3=31;
$hari4=30;
$hari5=31;
$hari6=30;
$hari7=31;
$hari8=31;
$hari9=30;
$hari10=31;
$hari11=30;
$hari12=31;

//selisih plusa //
switch ($sel_bln) 
{
case "00":
	$bln_hari=0;
	break;

case "01":
	if ($bln==01)
	{
	$bln_hari=$hari1;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12;
	break;
	}

case "02":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1;
	break;
	}
	
case "03":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2;
	break;
	}

case "04":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3;
	break;
	}

case "05":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3+$hari4;
	break;
	}

case "06":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3+$hari4+$hari5;
	break;
	}
	
case "07":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6;
	break;
	}

case "08":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7;
	break;
	}
	
case "09":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8;
	break;
	}
	
case "10":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9;
	break;
	}

case "11":
	if ($bln==01)
	{
	$bln_hari=$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11;
	break;
	}
	if ($bln==02)
	{
	$bln_hari=$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=$hari5+$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=$hari6+$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=$hari7+$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=$hari8+$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=$hari9+$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=$hari10+$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=$hari11+$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=$hari12+$hari1+$hari2+$hari3+$hari4+$hari5+$hari6+$hari7+$hari8+$hari9+$hari10;
	break;
	}
	
// jika selisih min //
case "-01":
	if ($bln==02)
	{
	$bln_hari=-$hari1;
	break;
	}
	if ($bln==03)
	{
	$bln_hari=-$hari2;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=-$hari3;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=-$hari4;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=-$hari5;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=-$hari6;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=-$hari7;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari11;
	break;
	}

case "-02":
	if ($bln==03)
	{
	$bln_hari=-$hari1-$hari2;
	break;
	}
	if ($bln==04)
	{
	$bln_hari=-$hari2-$hari3;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=-$hari3-$hari4;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=-$hari4-$hari5;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=-$hari5-$hari6;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=-$hari6-$hari7;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=-$hari7-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari10-$hari11;
	break;
	}

case "-03":
	if ($bln==04)
	{
	$bln_hari=-$hari1-$hari2-$hari3;
	break;
	}
	if ($bln==05)
	{
	$bln_hari=-$hari2-$hari3-$hari4;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=-$hari3-$hari4-$hari5;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=-$hari4-$hari5-$hari6;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=-$hari5-$hari6-$hari7;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=-$hari6-$hari7-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari7-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari9-$hari10-$hari11;
	break;
	}

case "-04":
	if ($bln==05)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4;
	break;
	}
	if ($bln==06)
	{
	$bln_hari=-$hari2-$hari3-$hari4-$hari5;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=-$hari3-$hari4-$hari5-$hari6;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=-$hari4-$hari5-$hari6-$hari7;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=-$hari5-$hari6-$hari7-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari6-$hari7-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari7-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari8-$hari9-$hari10-$hari11;
	break;
	}
	
case "-05":
	if ($bln==06)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4-$hari5;
	break;
	}
	if ($bln==07)
	{
	$bln_hari=-$hari2-$hari3-$hari4-$hari5-$hari6;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=-$hari3-$hari4-$hari5-$hari6-$hari7;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=-$hari4-$hari5-$hari6-$hari7-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari5-$hari6-$hari7-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari6-$hari7-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari7-$hari8-$hari9-$hari10-$hari11;
	break;
	}
	
case "-06":
	if ($bln==07)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4-$hari5-$hari6;
	break;
	}
	if ($bln==08)
	{
	$bln_hari=-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari6-$hari7-$hari8-$hari9-$hari10-$hari11;
	break;
	}
		
case "-07":
	if ($bln==08)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7;
	break;
	}
	if ($bln==09)
	{
	$bln_hari=-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10-$hari11;
	break;
	}
case "-08":
	if ($bln==09)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8;
	break;
	}
	if ($bln==10)
	{
	$bln_hari=-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10-$hari11;
	break;
	}
		
case "-09":
	if ($bln==10)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9;
	break;
	}
	if ($bln==11)
	{
	$bln_hari=-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10-$hari11;
	break;
	}
		
case "-10":
	if ($bln==11)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10;
	break;
	}
	if ($bln==12)
	{
	$bln_hari=-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10-$hari11;
	break;
	}
	
case "-11":
	if ($bln==12)
	{
	$bln_hari=-$hari1-$hari2-$hari3-$hari4-$hari5-$hari6-$hari7-$hari8-$hari9-$hari10-$hari11;
	break;
	}
}

// conv ke hari //
$conv_thn=$sel_thn*$thn_hari;
$conv_bln=$bln_hari;

$ttl_hari=$conv_thn+$conv_bln+$sel_tgl;

if ($ttl_hari>=3)
{
$b[$i]=($ttl_hari-$jangka)*$dnda;
}
if ($ttl_hari==3)
{
$b[$i]=0;
}
if ($j<>0)
{
$bku=mysql_query("select id_buku,judul,pengarang from buku where id_buku=$c[id_buku]");
$tp=mysql_fetch_array($bku);
?>
<p class="warkecil"><?=$tp[id_buku];?><br><?=$tp[judul];?><br>Penulis <?=$tp[pengarang];?><br>denda Rp. <?=$b[$i];?></p><?
}
$i++;
}
if ($j==0)
{
$bk=mysql_query("select id_buku,judul,pengarang from buku order by no DESC limit 4");
?>
<b>Buku-buku baru :</b>
<?
while ($t=mysql_fetch_array($bk))
{
?>
<p class="warkecil"><?=$t[id_buku];?><br><?=$t[judul];?><br>penulis <?=$t[pengarang];?><br></p>
<?
}
}
?>