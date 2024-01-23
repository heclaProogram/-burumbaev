<?php

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		switch ($action) {
			case 'auth':
				userAuth($db, $_POST);
			break;
			case 'add_user':
				userAdd($db, $_POST);
			break;
			case 'edit_user':
				userEdit($db, $_POST);
			break;
			case 'delete_user':
				userDelete($db, $_POST);
			break;
			case 'start':
				startWorkDay($db);
			break;
			case 'finish':
				finishWorkDay($db);
			break;
		}
	}

?>