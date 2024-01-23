<?php

	$user = getUser($db, $_SESSION['user']['id']);

?>
<!DOCTYPE html>
<html class="h-100">
<head>

	<title>Сотрудник | LogicApps</title>
	<?php include 'head.php'; ?>
	<style>.btn-xl {width: 100%;font-size: 45px;font-weight: bold;padding: 80px 0;user-select: none;}</style>

</head>
<body class="bg-light h-100 pt-5">

	<div class="d-flex position-fixed top-0 start-0 w-100 bg-white shadow-sm align-items-center justify-content-between">
		<div><h3 class="text-secondary mb-1 px-3">LogicApps</h3></div>
		<div><a href="/logout/" class="btn btn-lg">Выход <i class="bi-box-arrow-right opacity-50"></i></a></div>
	</div>

	<div class="w-100 h-100 d-flex pt-3">
		<div class="container">
			<div class="row h-100">
				<form action="" method="post" class="col-12 col-lg-6 offset-lg-3 d-flex h-100 align-items-center justify-content-center">
					<?php
						if (date('Y-m-d', strtotime($user['started'])) !== date('Y-m-d')) {
							echo '<button type="submit" name="action" value="start" class="btn btn-success btn-xl">Начать<br>рабочий день</button>';
						} elseif (date('Y-m-d', strtotime($user['finished'])) !== date('Y-m-d')) {
							echo '<button type="submit" name="action" value="finish" class="btn btn-warning btn-xl">Закончить<br>рабочий день</button>';
						} else {
							echo '<div class="bg-secondary btn-xl text-white text-center rounded">Рабочий день<br>закончен</div>';
						}
					?>
				</form>
			</div>
		</div>
	</div>

</body>
</html>