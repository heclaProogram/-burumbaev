<!DOCTYPE html>
<html class="h-100">
<head>

	<title>Авторизация | LogicApps</title>
	<?php include 'head.php'; ?>

</head>
<body class="h-100 bg-light">

	<div class="d-flex w-100 h-100 align-items-center justify-content-center">
		<div class="p-4 bg-white shadow-sm rounded-4">
			<h4 class="px-5 mb-3 text-secondary">LogicApps</h4>
			<form action="/" method="post">
				<div class="form-group mb-3">
					<label>Логин</label>
					<input type="text" class="form-control" name="login">
				</div>
				<div class="form-group mb-4">
					<label>Пароль</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<button class="btn btn-secondary w-100">Войти</button>
				</div>
				<input type="hidden" name="action" value="auth">
			</form>
		</div>
	</div>

	<?php
		if (!empty($_SESSION['app_msg'])) echo $_SESSION['app_msg'];
	?>

</body>
</html>