<?php
include'../include/db.php';
$cek=mysql_query("select * from modem order by Id desc");
$tcek1=mysql_num_rows($cek);
$tcek=$tcek1-1;

if($tcek==0)
{
function service3($x)
{
   $string = "<select name='phoneid'>";
   $handle = @fopen($path."../smsdrc1", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id1 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id1 != '') {
   $string .= "<option value='$id1'>".$id1."</option>";
   }
   fclose($handle);
   
   
   $string .= "</select>";
   return $string;
}
}





if($tcek==1)
{
function service3($x)
{
   $string = "<select name='phoneid'>";
   $handle = @fopen($path."../smsdrc1", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id1 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id1 != '') {
   $string .= "<option value='$id1'>".$id1."</option>";
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc2", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id2 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id2 != '') {
   $string .= "<option value='$id2'>".$id2."</option>";   
   }
   fclose($handle);
   

   
   $string .= "</select>";
   return $string;
}
}


if($tcek==2)
{
function service3($x)
{
   $string = "<select name='phoneid'>";
   $handle = @fopen($path."../smsdrc1", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id1 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id1 != '') {
   $string .= "<option value='$id1'>".$id1."</option>";
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc2", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id2 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id2 != '') {
   $string .= "<option value='$id2'>".$id2."</option>";   
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc3", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id3 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id3 != '') {
   $string .= "<option value='$id3'>".$id3."</option>";   
   }
   fclose($handle);

   
   $string .= "</select>";
   return $string;
}
}

// jumlah 3

if($tcek==3)
{
function service3($x)
{
   $string = "<select name='phoneid'>";
   $handle = @fopen($path."../smsdrc1", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id1 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id1 != '') {
   $string .= "<option value='$id1'>".$id1."</option>";
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc2", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id2 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id2 != '') {
   $string .= "<option value='$id2'>".$id2."</option>";   
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc3", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id3 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id3 != '') {
   $string .= "<option value='$id3'>".$id3."</option>";   
   }
   fclose($handle);

   $handle = @fopen($path."../smsdrc4", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id4 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id4 != '') {
   $string .= "<option value='$id4'>".$id4."</option>";   
   }
   fclose($handle);


   
   $string .= "</select>";
   return $string;
}
}

// jumlah 4

if($tcek==4)
{
function service3($x)
{
   $string = "<select name='phoneid'>";
   $handle = @fopen($path."../smsdrc1", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id1 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id1 != '') {
   $string .= "<option value='$id1'>".$id1."</option>";
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc2", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id2 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id2 != '') {
   $string .= "<option value='$id2'>".$id2."</option>";   
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc3", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id3 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id3 != '') {
   $string .= "<option value='$id3'>".$id3."</option>";   
   }
   fclose($handle);

   $handle = @fopen($path."../smsdrc4", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id4 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id4 != '') {
   $string .= "<option value='$id4'>".$id4."</option>";   
   }
   fclose($handle);

   $handle = @fopen($path."../smsdrc5", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id5 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id5 != '') {
   $string .= "<option value='$id5'>".$id5."</option>";   
   }
   fclose($handle);

   
   $string .= "</select>";
   return $string;
}
}

// jumlah 5

if($tcek==5)
{
function service3($x)
{
   $string = "<select name='phoneid'>";
   $handle = @fopen($path."../smsdrc1", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id1 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id1 != '') {
   $string .= "<option value='$id1'>".$id1."</option>";
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc2", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id2 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id2 != '') {
   $string .= "<option value='$id2'>".$id2."</option>";   
   }
   fclose($handle);
   
   $handle = @fopen($path."../smsdrc3", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id3 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id3 != '') {
   $string .= "<option value='$id3'>".$id3."</option>";   
   }
   fclose($handle);

   $handle = @fopen($path."../smsdrc4", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id4 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id4 != '') {
   $string .= "<option value='$id4'>".$id4."</option>";   
   }
   fclose($handle);

   $handle = @fopen($path."../smsdrc5", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id5 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id5 != '') {
   $string .= "<option value='$id5'>".$id5."</option>";   
   }
   fclose($handle);

   $handle = @fopen($path."../smsdrc6", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id6 = str_replace("\r\n", "", $split[1]);
		}
   }	
   if ($id6 != '') {
   $string .= "<option value='$id6'>".$id6."</option>";   
   }
   fclose($handle);
   
   
   $string .= "</select>";
   return $string;
}
}

// jumlah 

?>