<script type="text/javascript">
    $(function() {
        $("#theTable tr:even").addClass("stripe1");
        $("#theTable tr:odd").addClass("stripe2");

        $("#theTable tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });
	function editRow(ID){
		var id = ID;
		var pilih = confirm('Data yang akan mengubah  = '+id+ '?');
		if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/pengguna/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#userid").val(ID);
				$("#namalengkap").val(data.namalengkap);
				$("#level").val(data.level);
				$("#pwd").val('');
				$('#form_input').dialog('open');
				return false;
			}
		});
		}
	}
	function deleteRow(ID) {
		var id	= ID;
	   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
		if (pilih==true) {
			$.ajax({
				type	: "POST",
				url		: "modul/pengguna/hapus.php",
				data	: "id="+id,
				success	: function(data){
					$("#tampil_data").load("modul/pengguna/tampil_data.php");
				}
			});
		}
	}
</script>
<?php
include '../../inc/inc.koneksi.php';

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>USER ID</th>
			<th>Nama Lengkap</th>
			<th>Level</th>
			<th width='10%'>Aksi</th>
		</tr>";
	$sql	= "SELECT * FROM users ORDER By user_id";
	$query	= mysql_query($sql);
	
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[user_id]</td>
				<td>$rows[namalengkap]</td>
				<td>$rows[level]</td>
				<td align='center'>
				<a href='javascript:editRow(\"{$rows[user_id]}\")'>Edit</a>
				<a href='javascript:deleteRow(\"{$rows[user_id]}\")'>Hapus</a>			
				</td>
			</tr>";
	$no++;
	}
echo "</table>";
?>