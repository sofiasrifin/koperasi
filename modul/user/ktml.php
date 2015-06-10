<?php
// KTML 4 Server Side Include
require_once("includes/ktm/ktml4.php");
?>
<?php
$database_path = 'out.txt';
if (isset($_POST['ktml1'])) {
	$fout = fopen($database_path, 'wb+');
	fwrite($fout, stripslashes($_POST['ktml1']));
	fclose($fout);
	header("Location: ". $_SERVER["SCRIPT_NAME"] ."?reload=1");
}
@$fcontent = file_get_contents($database_path);
?>
<?php
if ( !isset($_GET['size']) || $_GET['size'] == 'big') {
	$sizex = 700;
	$sizey = 500;
} else {
	$sizex = 400;	
	$sizey = 400;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>KTML 4 demo - visual online HTML editor</title>
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/ktm/core/ktml.js" type="text/javascript"></script>
<script src="includes/resources/ktml.js" type="text/javascript"></script>
<script src="includes/ktm/core/modules.js" type="text/javascript"></script>
<link href="includes/ktm/core/styles/ktml.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
	ktml_init_object = {
		"debugger_params": false,
		"path": "includes/ktm/",
		"server": "php"
	};
</script>
<script type="text/javascript">
	ktml1_config = {
		"width": <?php echo $sizex; ?>,
		"height": <?php echo $sizey; ?>,
		"show_toolbar": "load",
		"show_pi": true,
		"background_color": "#FFFFFF",
		"strip_server_location": true,
		"auto_focus": true,
		"module_props": { },
		"buttons": [
            [1, "standard", ["cut", "copy", "paste", "undo", "redo", "find_replace", "toggle_visible", "spellcheck", "toggle_editmode", "toggle_fullscreen", "help"]],
            [1, "formatting", ["bold", "italic", "underline", "align_left", "align_center", "align_right", "align_justify", "numbered_list", "bulleted_list", "outdent", "indent", "clean_menu", "foreground_color", "background_color", "superscript", "subscript"]],
            [2, "styles", ["heading_list", "style_list", "fonttype_list", "fontsize_list"]],
            [2, "insert", ["insert_link", "insert_anchor", "insert_table", "insert_image", "insert_file", "insert_template", "horizontal_rule", "insert_character"]],
            [3, "form", ["insert_form", "insert_textfield", "insert_hiddenfield", "insert_textarea", "insert_checkbox", "insert_radiobutton", "insert_listmenu", "insert_filefield", "insert_button", "insert_label", "insert_fieldset"]]
		]
	};
	<?php
		$ktml_ktml1 = new ktml4("ktml1");
		$ktml_ktml1->setModuleProperty("filebrowser", "AllowedModule", "true", false);
		$ktml_ktml1->setModuleProperty("filebrowser", "MaxFileSize", "2000", true);
		$ktml_ktml1->setModuleProperty("file", "UploadFolder", "uploads/files/", false);
		$ktml_ktml1->setModuleProperty("file", "UploadFolderUrl", "uploads/files/", true);
		$ktml_ktml1->setModuleProperty("file", "AllowedFileTypes", "doc,pdf,txt", true);
		$ktml_ktml1->setModuleProperty("media", "UploadFolder", "uploads/media/", false);
		$ktml_ktml1->setModuleProperty("media", "UploadFolderUrl", "uploads/media/", true);
		$ktml_ktml1->setModuleProperty("media", "AllowedFileTypes", "bmp,jpg,jpeg,gif,png", true);
		$ktml_ktml1->setModuleProperty("css", "PathToStyle", "includes/ktm/styles/KT_styles.css", true);
		$ktml_ktml1->setModuleProperty("date", "AllowedModule", "true", false);
		$ktml_ktml1->Execute();
	?>
</script>
</head>

<body>
<h3><b>InterAKT:: KTML demo - visual HTML editor</b> </h3>
<table>
	<tr>
		<td>Change editor size: </td>
		<td>
			<form name="form_size" id="form_size" method="get" style="display: inline">
			<select name="size" onchange="document.forms['form_size'].submit()">
				<option value="small" <?php if (@$_GET['size'] == 'small') { ?>selected="selected"<?php } ?>>Small (400 x 400)</option>
				<option value="big" <?php if (!isset($_GET['size']) || @$_GET['size'] == 'big') { ?>selected="selected"<?php } ?>>Big (700 x 500)</option>
			</select>
			</form>
		</td>
	</tr>
</table>
<br />
<form method="post" name="form1" id="form1">
<input type="hidden" name="ktml1" id="ktml1" value="<?php echo KTML4_escapeAttribute($fcontent); ?>" />
<script type="text/javascript">
	// KTML4 Object
	ktml_ktml1 = new ktml('ktml1');
</script>

<br />
<input type="submit" name="aasubmit" value="Save Content" />
</form>
</body>
</html>

