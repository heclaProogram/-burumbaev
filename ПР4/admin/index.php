<?php

	$users = getUsers($db);

?>
<!DOCTYPE html>
<html class="h-100">
<head>

	<title>Сотрудники | LogicApps</title>
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
				<div class="col-12">
					<div class="d-flex align-items-center justify-content-between my-3">
						<h3 class="m-0">Сотрудники</h3>
						<div>
							<a href="/admin/add-user/" class="btn btn-sm btn-success bi bi-plus-lg"> Добавить сотрудника</a>
						</div>
					</div>
					<div class="p-3 bg-white rounded-3 shadow-sm">
						<table class="table">
							<thead>
								<tr>
									<th width="1">ID</th>
									<th>Логин</th>
									<th>Рабочие дни</th>
									<th>Обеденный перерыв</th>
									<th width="1"></th>
								</tr>
							</thead>
							<?php
								if ($users) {
									echo '<tbody>';
									foreach ($users as $user) {
										$days = '';
										if (!empty($user['days'])) {
											$days = array();
											$work_days = explode(',', $user['days']);
											foreach ($work_days as $work_day) {
												switch ($work_day) {
													case '1': $days[] = 'Пн'; break;
													case '2': $days[] = 'Вт'; break;
													case '3': $days[] = 'Ср'; break;
													case '4': $days[] = 'Чт'; break;
													case '5': $days[] = 'Пт'; break;
													case '6': $days[] = 'Сб'; break;
													case '7': $days[] = 'Вс'; break;
												}
											}
											$days = implode(', ', $days);
										}
										$hours = '';
										if ($user['hours'] > 1) $hours = $user['hours'];
										echo '
											<tr>
												<td>'.$user['id'].'</td>
												<td>'.$user['login'].'</td>
												<td>'.$days.'</td>
												<td>'.$user['minutes'].' минут '.declOfNum($user['hours'], array('каждый', 'каждые', 'каждые')).' '.$hours.' '.declOfNum($user['hours'], array('час', 'часа', 'часов')).'</td>
												<td>
													<div class="d-flex gap-2">
														<div>
															<form action="" method="post" onsubmit="return confirm(\'Удалить сотрудника?\');">
																<button class="btn btn-sm btn-secondary bi bi-trash text-nowrap" name="id" value="'.$user['id'].'"> Удалить</button>
																<input type="hidden" name="action" value="delete_user">
															<form>
														</div>
														<div>
															<a href="/admin/edit-user/?id='.$user['id'].'" class="btn btn-sm btn-warning bi bi-pencil text-nowrap"> Редактировать</a>
														</div>
														<div>
															<a href="/admin/log-user/?id='.$user['id'].'" class="btn btn-sm btn-primary bi bi-substack text-nowrap"> Журнал</a>
														</div>
													</div>
												</td>
											</tr>
										';
									}
									echo '</tbody>';
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>