<?php

	function validateAdmin() {
		if (!isset($_SESSION['user'])) {
			header('Location: /');
		} else {
			if ($_SESSION['user']['role'] !== 'admin') {
				header('Location: /');
			}
		}
	}

	function isAdmin() {
		$is_admin = false;
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['role'] == 'admin') {
				$is_admin = true;
			}
		}
		return $is_admin;
	}

	function isAuth() {
		return isset($_SESSION['user']);
	}

	function getUsers($db) {
		$users = false;
		$query = $db->query('SELECT * FROM users WHERE role="user" ORDER BY id ASC');
		if ($query) {
			$users = array();
			while ($row = $query->fetch_assoc()) {
				$users[$row['id']] = $row;
			}
		}
		return $users;
	}

	function getUser($db, $id) {
		$user = false;
		$query = $db->query('SELECT * FROM users WHERE id="'.$id.'"');
		if ($query) {
			$user = $query->fetch_assoc();
		}
		return $user;
	}

	function userAuth($db, $post) {
		$login = $post['login'];
		$password = md5($post['password']);
		$query = $db->query('SELECT * FROM users WHERE login="'.$login.'" AND password="'.$password.'"');
		if ($query->num_rows > 0) {
			$_SESSION['user'] = $query->fetch_assoc();
			if ($_SESSION['user']['role'] == 'admin') {
				header('Location: /admin/');
			} else {
				header('Location: /');
			}
		} else {
			$_SESSION['app_msg'] = '<script>setTimeout(function() {alert("Ошибка авторизации");}, 500);</script>';
		}
	}

	function userAdd($db, $post) {
		$login = $db->real_escape_string($post['login']);
		$password = md5($post['password']);
		$days = $db->real_escape_string($post['days']);
		$hours = $db->real_escape_string($post['hours']);
		$minutes = $db->real_escape_string($post['minutes']);
		$db->query('INSERT INTO users SET login="'.$login.'", password="'.$password.'", days="'.$days.'", hours="'.$hours.'", minutes="'.$minutes.'", role="user"');
		header('Location: /admin/');
	}

	function userEdit($db, $post) {
		$id = $db->real_escape_string($post['id']);
		$login = $db->real_escape_string($post['login']);
		$days = $db->real_escape_string($post['days']);
		$hours = $db->real_escape_string($post['hours']);
		$minutes = $db->real_escape_string($post['minutes']);
		if (!empty($post['password'])) {
			$password = md5($post['password']);
			$db->query('UPDATE users SET login="'.$login.'", password="'.$password.'", days="'.$days.'", hours="'.$hours.'", minutes="'.$minutes.'" WHERE id="'.$id.'"');
		} else {
			$db->query('UPDATE users SET login="'.$login.'", days="'.$days.'", hours="'.$hours.'", minutes="'.$minutes.'" WHERE id="'.$id.'"');
		}
		header('Location: /admin/');
	}

	function userLogout() {
		unset($_SESSION['app_msg']);
		unset($_SESSION['user']);
		header('Location: /');
	}

	function userDelete($db, $post) {
		$id = $db->real_escape_string($post['id']);
		$db->query('DELETE FROM users WHERE id="'.$id.'"');
		header('Location: /admin/');
	}

	function startWorkDay($db) {
		$db->query('UPDATE users SET started="'.date('Y-m-d').'" WHERE id="'.$_SESSION['user']['id'].'"');
		$db->query('INSERT INTO log SET user_id="'.$_SESSION['user']['id'].'", work_day="'.date('Y-m-d').'", started="'.date('Y-m-d H:i:s').'"');
	}

	function finishWorkDay($db) {
		$db->query('UPDATE users SET finished="'.date('Y-m-d').'" WHERE id="'.$_SESSION['user']['id'].'"');
		$db->query('UPDATE log SET finished="'.date('Y-m-d H:i:s').'" WHERE work_day="'.date('Y-m-d').'"');
	}

	function getLog($db, $user_id) {
		$records = false;
		$query = $db->query('SELECT * FROM log WHERE user_id="'.$user_id.'" ORDER BY work_day DESC');
		if ($query) {
			$records = array();
			while ($row = $query->fetch_assoc()) {
				$records[$row['id']] = $row;
			}
		}
		return $records;
	}

	function declOfNum($num, $titles) {
		$cases = array(2, 0, 1, 1, 1, 2);
		return $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
	}

?>