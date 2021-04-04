<?PHP
###################################
#     Page Notes (User Notes)     #
# Copyright 2021, Andrew Zawadzki #
###################################
exec("mkdir -p /boot/config/plugins/page.notes/pages");
switch ($_POST['action']) {
	case "read":
		$notes = @file_get_contents("/boot/config/plugins/page.notes/pages/{$_POST['file']}") ?: "";
		echo json_encode($notes);
		break;
	case "write":
		if ( ! trim($_POST['notes']) )
			@unlink("/boot/config/plugins/page.notes/pages/{$_POST['file']}");
		else 
			file_put_contents("/boot/config/plugins/page.notes/pages/{$_POST['file']}",$_POST['notes']);
		break;

}
?>