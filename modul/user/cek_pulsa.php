<?php

// jalankan perintah cek pulsa via gammu
exec("c:\appserv\www\upsms\gammu -c c:\appserv\www\upsms\gammurc getussd *388#", $hasil);

// proses filter hasil output
for ($i=0; $i<=count($hasil)-1; $i++)
{
   if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
}

// menampilkan sisa pulsa
echo $hasil[$index];

?>