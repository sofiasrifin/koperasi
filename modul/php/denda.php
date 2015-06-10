<?
$jngka=mysql_query("select jangka,denda from properties");
$tt=mysql_fetch_array($jngka);
$jangka=$tt[jangka];
$dnda=$tt[denda];
$denda="select tgl,bln,thn from pinjaman where no_anggota=$no_anggota AND kembali='0'";
$row=mysql_query($denda);
$jml=mysql_num_rows($row);
$i=1;
while($tmpl=mysql_fetch_array($row))
{
$thn=$tmpl[thn];
$bln=$tmpl[bln];
$tgl=$tmpl[tgl];
$bln_pinj=$tmpl[bln];


$thn1=date(Y);
$bln1=date(m);
$tgl1=date(d);

// sel thn, bln, tgl //
$sel_thn=$thn1-$thn;
$sel_bln=$bln1-$bln;
$sel_tgl=$tgl1-$tgl;

// conv ke hari //
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
$a[$i]=($ttl_hari-$jangka)*$dnda;
$i++;
}
$total=$a[1]+$a[2]+$a[3];
}
if ($ttl_hari<=3)
{
$total=0;
}
?>