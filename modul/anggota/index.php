<script type="text/javascript" src="modul/anggota/ajax.js"></script>
<style type="text/css">
.flexigrid div.fbutton .add {
	background: url(images/add.png) no-repeat center left;
}
.flexigrid div.fbutton .edit {
	background: url(images/edit.png) no-repeat center left;
}
.flexigrid div.fbutton .cmdedit {
	background: url(images/edit.png) no-repeat center left;
}

.flexigrid div.fbutton .delete {
	background: url(images/close.png) no-repeat center left;
}
.flexigrid div.fbutton .refresh {
	background: url(images/refresh.png) no-repeat center left;
}
.hilite{
   background-color: #FFF000;
}
</style>
<?php
echo "<div id='dalam_content'>
<div id='tampil_data'>
<table class=\"data\" id=\"data\" style=\"display: none\"></table>
</div>
</div>";
echo "<div id=\"form_input\" class=\"easyui-dialog\" title=\"Input Data\" style=\"padding:5px;width:520px;height:400px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\">
	<table id='theList' width='100%'>
	<tr>
		<td>No Registrasi</td>
		<td>:&nbsp;<input type='text' name='reg' id='reg' size='15' maxlength='20' 
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\" ></td>
	</tr>
	<tr>
		<td>No Anggota</td>
		<td>:&nbsp;<input type='text' name='nomor' id='nomor' size='20' maxlength='10' 
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\" ></td>
	</tr>
	<tr>
		<td>Nama Anggota </td>
		<td>:&nbsp;<input type='text' name='anggota' id='anggota' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>:&nbsp;<input type='text' name='tempat' id='tempat' size='20' maxlength='20'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:&nbsp;<input type='text' name='tgl' id='tgl' size='20' maxlength='20'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Fakultas/Jurusan</td>
		<td>:&nbsp;<select name='fakjur' id='fakjur' class=\"input\" data-options=\"required:true\">
				<option value=''>-Pilih-</option>
				<option value='FT/S1 PEND. T. ELEKTRO'>FT/S1 PEND. T. ELEKTRO</option>		
				<option value='FT/S1 PEND. T. MESIN'>FT/S1 PEND. T. MESIN</option>
				<option value='FT/S1 PEND. T. BANGUNAN'>FT/S1 PEND. T. BANGUNAN</option>
				<option value='FT/S1 PEND. TEKNOLOGI INFORMASI'>FT/S1 PEND. TEKNOLOGI INFORMASI</option>
				<option value='FT/S1 PEND. TATA BOGA'>FT/S1 PEND. TATA BOGA</option>
				<option value='FT/S1 PEND. TATA BUSANA'>FT/S1 PEND. TATA BUSANA</option>
				<option value='FT/S1 PEND. TATA RIAS'>FT/S1 PEND. TATA RIAS</option>
				<option value='FT/S1 TEKNIK SIPIL'>FT/S1 TEKNIK SIPIL</option>
				<option value='FT/S1 TEKNIK ELEKTRO'>FT/S1 TEKNIK ELEKTRO</option>
				<option value='FT/S1 TEKNIK MESIN'>FT/S1 TEKNIK MESIN</option>
				<option value='FT/DIII TEKNIK LISTRIK'>FT/DIII TEKNIK LISTRIK</option>
				<option value='FT/DIII MANAJEMEN INFORMATIKA'>FT/DIII MANAJEMEN INFORMATIKA</option>
				<option value='FT/DIII TEKNIK MESIN'>FT/DIII TEKNIK MESIN</option>
				<option value='FT/DIII TEKNIK SIPIL'>FT/DIII TEKNIK SIPIL</option>
				<option value='FT/DIII MANAJEMEN TRANSPORTASI'>FT/DIII MANAJEMEN TRANSPORTASI</option>
				<option value='FT/DIII TATA BOGA'>FT/DIII TATA BOGA</option>
				<option value='FT/DIII TEKNIK BUSANA'>FT/DIII TEKNIK BUSANA</option>
				<option value='FE/S1 PENDIDIKAN EKONOMI'>FE/S1 PENDIDIKAN EKONOMI</option>
				<option value='FE/S1 PENDIDIKAN AKUNTANSI'>FE/S1 PENDIDIKAN AKUNTANSI</option>
				<option value='FE/S1 PENDIDIKAN ADM.PERKANTORAN'>FE/S1 PENDIDIKAN ADM.PERKANTORAN</option>
				<option value='FE/S1 PENDIDIKAN TATA NIAGA'>FE/S1 PENDIDIKAN TATA NIAGA</option>
				<option value='FE/S1 MANAJEMEN'>FE/S1 MANAJEMEN</option>
				<option value='FE/S1 AKUNTANSI'>FE/S1 AKUNTANSI</option>
				<option value='FE/DIII AKUNTANSI'>FE/DIII AKUNTANSI</option>
				<option value='FIS/S1 PENDIDIKAN GEOGRAFI'>FIS/S1 PENDIDIKAN GEOGRAFI</option>
				<option value='FIS/S1 PENDIDIKAN SEJARAH'>FIS/S1 PENDIDIKAN SEJARAH</option>
				<option value='FIS/S1 PPKN'>FIS/S1 PPKN</option>
				<option value='FIS/S1 ILMU HUKUM'>FIS/S1 ILMU HUKUM</option>
				<option value='FIS/S1 ILMU ADMINISTRASI NEGARA'>FIS/S1 ILMU ADMINISTRASI NEGARA</option>
				<option value='FIS/S1 SOSIOLOGI'>FIS/S1 SOSIOLOGI</option>
				<option value='FIS/DIII ILMU ADMINISTRASI NEGARA'>FIS/DIII ILMU ADMINISTRASI NEGARA</option>
				<option value='FMIPA/S1 PENDIDIKAN MATEMATIKA'>FMIPA/S1 PENDIDIKAN MATEMATIKA</option>
				<option value='FMIPA/S1 PENDIDIKAN FISIKA'>FMIPA/S1 PENDIDIKAN FISIKA</option>
				<option value='FMIPA/S1 PENDIDIKAN KIMIA'>FMIPA/S1 PENDIDIKAN KIMIA</option>
				<option value='FMIPA/S1 PENDIDIKAN BIOLOGI'>FMIPA/S1 PENDIDIKAN BIOLOGI</option>
				<option value='FMIPA/S1 PENDIDIKAN SAINS'>FMIPA/S1 PENDIDIKAN SAINS</option>
				<option value='FMIPA/S1 PEND. MATEMATIKA INTERNATIONAL'>FMIPA/S1 PEND. MATEMATIKA INTERNATIONAL</option>
				<option value='FMIPA/S1 PEND. FISIKA INTERNATIONAL'>FMIPA/S1 PEND. FISIKA INTERNATIONAL</option>
				<option value='FMIPA/S1 PEND. KIMIA INTERNATIONAL'>FMIPA/S1 PEND. KIMIA INTERNATIONAL</option>
				<option value='FMIPA/S1 PEND. BIOLOGI INTERNATIONAL'>FMIPA/S1 PEND. BIOLOGI INTERNATIONAL</option>
				<option value='FMIPA/S1 MATEMATIKA'>FMIPA/S1 MATEMATIKA</option>
				<option value='FMIPA/S1 FISIKA'>FMIPA/S1 FISIKA</option>
				<option value='FMIPA/S1 KIMIA'>FMIPA/S1 KIMIA</option>
				<option value='FMIPA/S1 BIOLOGI'>FMIPA/S1 BIOLOGI</option>
				<option value='FIP/S1 PEND. LUAR SEKOLAH'>FIP/S1 PEND. LUAR SEKOLAH</option>
				<option value='FIP/S1 PEND. LUAR BIASA'>FIP/S1 PEND. LUAR BIASA</option>
				<option value='FIP/S1 BIMBINGAN dan KONSELING'>FIP/S1 BIMBINGAN dan KONSELING</option>
				<option value='FIP/S1 TEKNOLOGI PENDIDIKAN'>FIP/S1 TEKNOLOGI PENDIDIKAN</option>
				<option value='FIP/S1 PGSD'>FIP/S1 PGSD</option>
				<option value='FIP/S1 PSIKOLOGI'>FIP/S1 PSIKOLOGI</option>
				<option value='FIP/S1 PG-PAUD'>FIP/S1 PG-PAUD</option>
				<option value='FIP/S1 MANAJEMEN PENDIDIKAN'>FIP/S1 MANAJEMEN PENDIDIKAN</option>
				<option value='FBS/S1 PENDIDIKAN BAHASA INDONESIA'>FBS/S1 PENDIDIKAN BAHASA INDONESIA</option>
				<option value='FBS/S1 PENDIDIKAN BAHASA INGGRIS'>FBS/S1 PENDIDIKAN BAHASA INGGRIS</option>
				<option value='FBS/S1 PENDIDIKAN BAHASA JERMAN'>FBS/S1 PENDIDIKAN BAHASA JERMAN</option>
				<option value='FBS/S1 PENDIDIKAN BAHASA JEPANG'>FBS/S1 PENDIDIKAN BAHASA JEPANG</option>
				<option value='FBS/S1 PENDIDIKAN BAHASA JAWA'>FBS/S1 PENDIDIKAN BAHASA JAWA</option>
				<option value='FBS/S1 PENDIDIKAN BAHASA MANDARIN'>FBS/S1 PENDIDIKAN BAHASA MANDARIN</option>
				<option value='FBS/S1 PENDIDIKAN SENI RUPA'>FBS/S1 PENDIDIKAN SENI RUPA</option>
				<option value='FBS/S1 PENDIDIKAN SENDRATASIK'>FBS/S1 PENDIDIKAN SENDRATASIK</option>
				<option value='FBS/S1 SASTRA INDONESIA'>FBS/S1 SASTRA INDONESIA</option>
				<option value='FBS/S1 SASTRA INGGRIS'>FBS/S1 SASTRA INGGRIS</option>
				<option value='FBS/S1 SASTRA JERMAN'>FBS/S1 SASTRA JERMAN</option>
				<option value='FBS/DII DESAIN GRAFIS'>FBS/DII DESAIN GRAFIS</option>
				<option value='FIK/S1 PENDIDIKAN JASMANI DAN KESEHATAN'>FIK/S1 PENDIDIKAN JASMANI DAN KESEHATAN</option>
				<option value='FIK/S1 PENDIDIKAN KEPELATIHAN OLAHRAGA'>FIK/S1 PENDIDIKAN KEPELATIHAN OLAHRAGA</option>
				<option value='FIK/S1 ILMU KEOLAHRAGAAN'>FIK/S1 ILMU KEOLAHRAGAAN</option>
				</select>
		</td>
	</tr>
	<tr>
		<td>Agama</td>
		<td>:&nbsp;<select name='agama' id='agama' class=\"input\" data-options=\"required:true\">
			<option value=''>-Pilih-</option>
			<option value='Islam'>Islam</option>
			<option value='Kristen'>Kristen</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>
			</select>			
		</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:&nbsp;<select name='jk' id='jk' class=\"input\" data-options=\"required:true\">
			<option value=''>-Pilih-</option>
			<option value='L'>Laki-Laki</option>
			<option value='P'>Perempuan</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:&nbsp;<input type='text' name='alamat' id='alamat' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Hp/Telp</td>
		<td>:&nbsp;<input type='text' name='hp' id='hp' size='20' maxlength='20'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:&nbsp;<input type='password' name='pwd' id='pwd' size='20' maxlength='20'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>

	</table>
</div>";
?>
