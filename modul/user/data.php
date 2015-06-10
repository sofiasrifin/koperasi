<?php
include'../include/db.php'; 

include 'php-ofc-library/open-flash-chart.php';
$result = mysql_query("select * from grafik order by id desc limit 15");
$inmax = mysql_query("select * from grafik order by inbox desc limit 15");
$oumax = mysql_query("select * from grafik order by outbox desc limit 15");

$jinmax=mysql_fetch_array($inmax);
$joutmax=mysql_fetch_array($oumax);

if($jinmax['inbox']>=$joutmax['outbox'])
{
$jmax=$jinmax['inbox'];
}
else
{
$jmax=$joutmax['outbox'];
}

$animation = array();
$delay = array();
$cascade = array();
for($i=1; $i<4; $i++)
{
    $animation[]    = isset($_GET["animation_$i"])?$_GET["animation_$i"]:'pop-up';
    $delay[]        = isset($_GET["delay_$i"])?$_GET["delay_$i"]:0.5;
    $cascade[]    = isset($_GET["cascade_$i"])?$_GET["cascade_$i"]:1;
}

$data_1 = array();
$data_2 = array();
$data_3 = array();

while($row = mysql_fetch_array($result))
{
  $data_1[] = 0+$row['inbox'];
  $data_2[] = 0+$row['outbox'];
  $year[] = $row['tglbulan']; 

}

$title = new title( 'Inbox & Outbox 15 hari terakhir' );
$title->set_style( "{font-size: 18px; color: #A2ACBA; text-align: center;}" );

$line_1_default_dot = new solid_dot();
$line_1_default_dot->size(1)->halo_size(1)->colour('#40230B');

$line_1 = new line();
$line_1->set_default_dot_style($line_1_default_dot);
$line_1->set_values( $data_1 );
$line_1->set_width( 2 );
$line_1->set_key( 'inbox', 12 );
$line_1->set_colour( '#FF0000' );
$line_1->on_show(new line_on_show($animation[0], $cascade[0], $delay[0]));

// ------- LINE 2 -----
$line_2_default_dot = new solid_dot();
$line_2_default_dot->size(2)->halo_size(1)->colour('#138085');

$line_2 = new line();
$line_2->set_default_dot_style($line_2_default_dot);
$line_2->set_values( $data_2 );
$line_2->set_width(2);
$line_2->set_key( 'outbox', 12 );
$line_2->set_colour( '#138085' );
$line_2->on_show(new line_on_show($animation[1], $cascade[1], $delay[1]));


    
$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $line_1 );
$chart->add_element( $line_2 );

$x_labels = new x_axis_labels();
$x_labels->set_steps( 1 );
$x_labels->set_vertical();
$x_labels->set_colour( '#000000' );
$x_labels->set_labels( $year );

$x = new x_axis();
$x->set_colour( '#A2ACBA' );
$x->set_grid_colour( '#D7E4A3' );
$x->set_offset( false );
$x->set_steps(1);
// Add the X Axis Labels to the X Axis
$x->set_labels( $x_labels );

$chart->set_x_axis( $x );

//
// LOOK:
//
$x_legend = new x_legend( 'Tanggal dan Bulan' );
$x_legend->set_style( '{font-size: 16px; color: #778877}' );
$chart->set_x_legend( $x_legend );

//
// remove this when the Y Axis is smarter
//
$y = new y_axis();
$hmax=$jmax+5;
$batas=round($hmax/6);
$y->set_range( 0, $hmax, $batas );
$chart->add_y_axis( $y );
$chart->set_bg_colour( '#ffffff' );


echo $chart->toPrettyString();
