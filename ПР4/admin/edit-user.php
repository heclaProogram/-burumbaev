<?php

	$user = getUser($db, $_GET['id']);
	if (!$user) header('Location: /admin/');

?>
<!DOCTYPE html>
<html class="h-100">
<head>

	<title>Редактировать сотрудника | LogicApps</title>
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
				<div class="col-12 col-xl-6 offset-xl-3">
					<form action="" method="post">
						<div class="d-flex flex-column flex-md-row align-items-center justify-content-between my-3">
							<h3 class="m-0">Редактировать сотрудника</h3>
							<div>
								<a href="/admin/" class="btn btn-sm btn-secondary bi bi-x-lg"> Отмена</a>
								<button class="btn btn-sm btn-success bi bi-plus-lg"> Сохранить</button>
							</div>
						</div>
						<div class="p-3 bg-white rounded-3 shadow-sm">
							<div class="form-group mb-3">
								<label>Логин</label>
								<input type="text" name="login" class="form-control" value="<?php echo $user['login']; ?>" required>
							</div>
							<div class="form-group mb-3">
								<label>Пароль</label>
								<input type="password" name="password" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="p-3 bg-white rounded-3 shadow-sm mt-4">
							<div class="form-group">
								<label>Дни работы</label>
								<div class="d-flex gap-2 mt-3">
									<button type="button" class="btn <?php if (strpos($user['days'], '1') !== false) echo 'btn-primary'; else echo 'btn-light'; ?> flex-grow-1 work-day" data-day="1">Пн</button>
									<button type="button" class="btn <?php if (strpos($user['days'], '2') !== false) echo 'btn-primary'; else echo 'btn-light'; ?> flex-grow-1 work-day" data-day="2">Вт</button>
									<button type="button" class="btn <?php if (strpos($user['days'], '3') !== false) echo 'btn-primary'; else echo 'btn-light'; ?> flex-grow-1 work-day" data-day="3">Ср</button>
									<button type="button" class="btn <?php if (strpos($user['days'], '4') !== false) echo 'btn-primary'; else echo 'btn-light'; ?> flex-grow-1 work-day" data-day="4">Чт</button>
									<button type="button" class="btn <?php if (strpos($user['days'], '5') !== false) echo 'btn-primary'; else echo 'btn-light'; ?> flex-grow-1 work-day" data-day="5">Пт</button>
									<button type="button" class="btn <?php if (strpos($user['days'], '6') !== false) echo 'btn-primary'; else echo 'btn-light'; ?> flex-grow-1 work-day" data-day="6">Сб</button>
									<button type="button" class="btn <?php if (strpos($user['days'], '7') !== false) echo 'btn-primary'; else echo 'btn-light'; ?> flex-grow-1 work-day" data-day="7">Вс</button>
								</div>
							</div>
						</div>
						<div class="p-3 bg-white rounded-3 shadow-sm mt-4">
							<div class="form-group">
								<label>Обеденный перерыв</label>
								<div class="d-flex gap-2 mt-3">
									<select class="form-control flex-grow-1" name="minutes">
										<option value="10"<?php if ($user['minutes'] == '10') echo ' selected'; ?>>10 минут</option>
										<option value="20"<?php if ($user['minutes'] == '20') echo ' selected'; ?>>20 минут</option>
										<option value="30"<?php if ($user['minutes'] == '30') echo ' selected'; ?>>30 минут</option>
										<option value="40"<?php if ($user['minutes'] == '40') echo ' selected'; ?>>40 минут</option>
										<option value="50"<?php if ($user['minutes'] == '50') echo ' selected'; ?>>50 минут</option>
										<option value="60"<?php if ($user['minutes'] == '60') echo ' selected'; ?>>60 минут</option>
									</select>
									<select class="form-control flex-grow-1" name="hours">
										<option value="1"<?php if ($user['hours'] == '1') echo ' selected'; ?>>Каждый час</option>
										<option value="2"<?php if ($user['hours'] == '2') echo ' selected'; ?>>Каждые 2 часа</option>
										<option value="3"<?php if ($user['hours'] == '3') echo ' selected'; ?>>Каждые 3 часа</option>
										<option value="4"<?php if ($user['hours'] == '4') echo ' selected'; ?>>Каждые 4 часа</option>
										<option value="5"<?php if ($user['hours'] == '5') echo ' selected'; ?>>Каждые 5 часов</option>
										<option value="6"<?php if ($user['hours'] == '6') echo ' selected'; ?>>Каждые 6 часов</option>
										<option value="7"<?php if ($user['hours'] == '7') echo ' selected'; ?>>Каждые 7 часов</option>
										<option value="8"<?php if ($user['hours'] == '8') echo ' selected'; ?>>Каждые 8 часов</option>
									</select>
								</div>
							</div>
						</div>
						<input type="hidden" name="action" value="edit_user">
						<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
						<input type="hidden" name="days" value="<?php echo $user['days']; ?>">
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		$(function() {
			$('.work-day').on('click', function() {
				$(this).toggleClass('btn-light');
				$(this).toggleClass('btn-primary');
				var days = [];
				$('.work-day').each(function() {
					if ($(this).hasClass('btn-primary')) {
						days.push($(this).attr('data-day'));
					}
				});
				$('[name="days"]').val(days.join(','));
			});
		});
	</script>

</body>
</html>