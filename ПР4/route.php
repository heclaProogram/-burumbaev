<?php

	$uri = [];

	if (isset($_GET['path'])) $uri = explode('/', $_GET['path']);

	switch ($uri[0]) {
		case '':
			if (isAuth()) {
				include $_SERVER['DOCUMENT_ROOT'].'/user/index.php';
			} else {
				include $_SERVER['DOCUMENT_ROOT'].'/user/auth.php';
			}
		break;
		case 'admin':
			if (isAuth()) {
				if (isset($uri[1])) $uri = $uri[1]; else $uri = '';
				switch ($uri) {
					case '':
						validateAdmin();
						include $_SERVER['DOCUMENT_ROOT'].'/admin/index.php';
					break;
					case 'add-user':
						validateAdmin();
						include $_SERVER['DOCUMENT_ROOT'].'/admin/add-user.php';
					break;
					case 'edit-user':
						validateAdmin();
						include $_SERVER['DOCUMENT_ROOT'].'/admin/edit-user.php';
					break;
					case 'log-user':
						validateAdmin();
						include $_SERVER['DOCUMENT_ROOT'].'/admin/log-user.php';
					break;
				}
			} else {
				header('Location: /');
			}
		break;
		case 'logout':
			if (isAuth()) userLogout();
			header('Location: /');
		break;
		default:
			header('Location: /');
		break;
	}

?>