<?
if ($_POST['Submit'] == 'kirim') 
{
	for($o=1; $o<=120; $o++)
	{ 
     echo"$chk[$o], ";
	}


} 
else if ($_POST['Submit'] == 'delete') 
{

	for($o=1; $o<=120; $o++)
	{ 
     echo"$chk[$o]";
	}

}
?>