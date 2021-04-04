<?
###################################
#     Page Notes (User Notes)     #
# Copyright 2021, Andrew Zawadzki #
###################################
$pageEditing = $_GET['page'];
$vars = parse_ini_file("/var/local/emhttp/var.ini");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=1600">
<meta name="robots" content="noindex, nofollow">
<meta name="referrer" content="same-origin">
</head>
<script src='/plugins/dynamix/javascript/dynamix.js'></script>
<body>

<h2><center>User Notes For Unraid Page <em>"<?=$_GET['page']?>"</em></center></h2>
<textarea id='UnraidNotes' rows=20 cols=65 placeholder='Enter Notes Here' oninput='$("#saveButton").prop("disabled",false);'></textarea>
<center>
<input id='saveButton' type='button' value='SAVE' disabled onclick='saveChanges();'></input>
<input type='button' value='DONE' onclick='window.close();'></input>
<script>
$(function() {
	$.post("/plugins/page.notes/exec.php",{csrf_token:"<?=$vars['csrf_token']?>",file:"<?=$pageEditing?>",action:"read"},function(data) {
		var result = JSON.parse(data);
		$("#UnraidNotes").val(result);
	});
});

function saveChanges() {
	$("#saveButton").prop("disabled",true);
	var notes = $("#UnraidNotes").val();
	$.post("/plugins/page.notes/exec.php",{csrf_token:"<?=$vars['csrf_token']?>",file:"<?=$pageEditing?>",action:"write",notes:notes});
}

</script>
</body>

</html>