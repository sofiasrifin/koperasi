<?php
include'../include/db.php';
$id_poll=$_GET['id_poll'];

$del=mysql_query("delete from arr_poll");

$sql2 = mysql_query("SELECT distinct id_poll FROM poll");
while($row2=mysql_fetch_array($sql2))
{
	$x=0;
	$arr_poll=mysql_query("SELECT * FROM poll where id_poll='$row2[id_poll]'");
	while($tarr=mysql_fetch_array($arr_poll))
	{
	$inbox=mysql_query("SELECT * from inbox_poll where id_poll='$row2[id_poll]' and jawab='$tarr[jawaban]'");
	$tinbox=mysql_num_rows($inbox);
	$jum[$x]=$tinbox;
	echo"ok $jum[$x]";
	$up=mysql_query("update poll set jumlah='$jum[$x]' where id_poll='$row2[id_poll]' and jawaban='$tarr[jawaban]'");

	$cek=mysql_query("SELECT * FROM arr_poll where id_poll='$row2[id_poll]'");
	$tcek=mysql_fetch_array($cek);
	$jcek=mysql_num_rows($cek);
		if($jcek==0)
		{
		$ins=mysql_query("INSERT INTO arr_poll SET id_poll='$row2[id_poll]',data='$tarr[jawaban]'");
		}
		if($jcek==1)
		{
		$upd=mysql_query("UPDATE arr_poll SET data='$tcek[data]/$tarr[jawaban]' where id_poll='$row2[id_poll]'");
		}
		$x++;

	}
}
	
$graf1=mysql_query("SELECT * FROM poll where id_poll='$id_poll' order by jumlah desc");
$tgraf1=mysql_fetch_array($graf1);

$ket=mysql_query("SELECT * FROM ket_poll where id_poll='$id_poll'");
$tket=mysql_fetch_array($ket);

if($tket['jenis_grafik']=="glass_bar")
{
include_once( 'ofc-library/open-flash-chart.php' );

// generate some random data
srand((double)microtime()*1000000);


$bar_1 = new bar_glass( 80, '#87E2D0', '#C31812' );

// add 10 bars with random heights
$graf=mysql_query("SELECT * FROM poll where id_poll='$id_poll'");
while($tgraf=mysql_fetch_array($graf))
{
  $bar_1->data[] = $tgraf['jumlah'];
}




//
// create the chart:
//
$g = new graph();
$g->title( "$tket[judul_grafik]", '{font-size:20px; color: #000000; margin:15px;  padding: 5px 15px 45px 15px;}' );
$g->bg_colour = '#ffffff';

// add both sets of bars:
$g->data_sets[] = $bar_1;

// label the X axis (10 labels for 10 bars):
$ar_pol=mysql_query("select * from arr_poll where id_poll='$id_poll'");
$tar_pol=mysql_fetch_array($ar_pol);
$newphrase = str_replace("/", ",", $tar_pol['data']);

$g->set_x_labels( array( $newphrase ) );

// colour the chart to make it pretty:
$g->x_axis_colour( '#000000', '#e0e0e0' );
$g->y_axis_colour( '#000000', '#e0e0e0' );
$g->set_x_label_style( 20, '#303030', 0 );
$g->set_y_label_style( 11, '#303030', 2 );

$g->set_y_min( 0 );
$g->set_y_max( $tgraf1['jumlah']+2 );
$g->y_label_steps( 6 );
$g->set_y_legend( '', 6, '#736AFF' );
echo $g->render();
}


if($tket['jenis_grafik']=="sketch")
{
include_once( 'ofc-library/open-flash-chart.php' );

// generate some random data
srand((double)microtime()*1000000);

$bar = new bar_sketch( 80, 5, '#45B469', '#45B469' );

$graf=mysql_query("SELECT * FROM poll where id_poll='$id_poll'");
while($tgraf=mysql_fetch_array($graf))
{
  $bar->data[] = $tgraf['jumlah'];
}

$g = new graph();
$g->title( "$tket[judul_grafik]", '{font-size:20px; color: #000000; margin:15px;  padding: 5px 15px 45px 15px;}' );
$g->bg_colour = '#ffffff';


//
// add the bar object to the graph
//
$g->data_sets[] = $bar;

$g->x_axis_colour( '#e0e0e0', '#e0e0e0' );
$g->set_x_tick_size( 9 );
$g->y_axis_colour( '#e0e0e0', '#e0e0e0' );

$ar_pol=mysql_query("select * from arr_poll where id_poll='$id_poll'");
$tar_pol=mysql_fetch_array($ar_pol);
$newphrase = str_replace("/", ",", $tar_pol['data']);

$g->set_x_labels( array( $newphrase ) );
$g->set_x_label_style( 20, '#303030', 0 );
$g->set_y_label_style( 11, '#303030', 2 );

$g->set_y_max( $tgraf1['jumlah']+2 );
$g->y_label_steps( 5 );
echo $g->render();
}




if($tket['jenis_grafik']=="fade")
{

include_once( 'ofc-library/open-flash-chart.php' );

// generate some random data
srand((double)microtime()*1000000);

$bar = new bar_fade( 80, '#C31812' );

$graf=mysql_query("SELECT * FROM poll where id_poll='$id_poll'");
while($tgraf=mysql_fetch_array($graf))
{
  $bar->data[] = $tgraf['jumlah'];
}

$g = new graph();
$g->title( "$tket[judul_grafik]", '{font-size:20px; color: #000000; margin:15px;  padding: 5px 15px 45px 15px;}' );
$g->bg_colour = '#ffffff';

$g->data_sets[] = $bar;

$g->x_axis_colour( '#e0e0e0', '#e0e0e0' );
$g->set_x_tick_size( 9 );
$g->y_axis_colour( '#e0e0e0', '#e0e0e0' );

$ar_pol=mysql_query("select * from arr_poll where id_poll='$id_poll'");
$tar_pol=mysql_fetch_array($ar_pol);
$newphrase = str_replace("/", ",", $tar_pol['data']);

$g->set_x_labels( array( $newphrase ) );
$g->set_x_label_style( 20, '#303030', 0 );
$g->set_y_label_style( 11, '#303030', 2 );

$g->set_y_max( $tgraf1['jumlah']+4 );
$g->y_label_steps( 5 );
echo $g->render();

}

if($tket['jenis_grafik']=="bar")
{

include_once( 'ofc-library/open-flash-chart.php' );

// generate some random data
srand((double)microtime()*1000000);
$bar = new bar( 50, '#0066CC' );

$graf=mysql_query("SELECT * FROM poll where id_poll='$id_poll'");
while($tgraf=mysql_fetch_array($graf))
{
  $bar->data[] = $tgraf['jumlah'];
}

$g = new graph();
$g->title( "$tket[judul_grafik]", '{font-size:20px; color: #000000; margin:15px;  padding: 5px 15px 45px 15px;}' );
$g->bg_colour = '#ffffff';


$g->data_sets[] = $bar;

$g->x_axis_colour( '#e0e0e0', '#e0e0e0' );
$g->set_x_tick_size( 9 );
$g->y_axis_colour( '#e0e0e0', '#e0e0e0' );

$ar_pol=mysql_query("select * from arr_poll where id_poll='$id_poll'");
$tar_pol=mysql_fetch_array($ar_pol);
$newphrase = str_replace("/", ",", $tar_pol['data']);

$g->set_x_labels( array( $newphrase ) );
$g->set_x_label_style( 20, '#303030', 0 );
$g->set_y_label_style( 11, '#303030', 2 );

$g->set_y_max( $tgraf1['jumlah']+2 );
$g->y_label_steps( 5 );
echo $g->render();




}
?>

