<?php

	$user = getUser($db, $_GET['id']);
	if (!$user) header('Location: /admin/');
	$log_records = getLog($db, $_GET['id']);

?>
<!DOCTYPE html>
<html class="h-100">
<head>

	<title>Журнал сотрудника <?php echo $user['login']; ?> | LogicApps</title>
	<?php include 'head.php'; ?>

</head>
<body class="bg-light h-100 pt-5">

	<div class="d-flex position-fixed top-0 start-0 w-100 bg-white shadow-sm align-items-center justify-content-between">
		<div><h3 class="text-secondary mb-1 px-3"><a href="/" class="text-decoration-none">LogicApps</a></h3></div>
		<div><a href="/logout/" class="btn btn-lg">Выход <i class="bi-box-arrow-right opacity-50"></i></a></div>
	</div>

	<div class="w-100 h-100 d-flex pt-3">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6 offset-lg-3">
					<div class="d-flex align-items-center justify-content-between my-3">
						<h3 class="m-0">Журнал сотрудника <?php echo $user['login']; ?></h3>
						<div>
							<a href="/admin/" class="btn btn-sm btn-secondary bi bi-arrow-left"> Назад</a>
						</div>
					</div>
					<div class="p-3 bg-white rounded-3 shadow-sm">
						<table class="table">
							<thead>
								<tr>
									<th>Рабочий день</th>
									<th>Начал</th>
									<th>Закончил</th>
								</tr>
							</thead>
							<?php
								echo '<tbody>';
								foreach ($log_records as $log_record) {
									echo '
										<tr>
											<td>'.date('d.m.Y', strtotime($log_record['work_day'])).'</td>
											<td>'.date('H:i:s', strtotime($log_record['started'])).'</td>
											<td>'.date('H:i:s', strtotime($log_record['finished'])).'</td>
										</tr>
									';
								}
								echo '</tbody>';
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>