<!DOCTYPE html>
<html class="h-100">
<head>

	<title>Добавить сотрудника | LogicApps</title>
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
							<h3 class="m-0">Добавить сотрудника</h3>
							<div>
								<a href="/admin/" class="btn btn-sm btn-secondary bi bi-x-lg"> Отмена</a>
								<button class="btn btn-sm btn-success bi bi-plus-lg"> Сохранить</button>
							</div>
						</div>
						<div class="p-3 bg-white rounded-3 shadow-sm">
							<div class="form-group mb-3">
								<label>Логин</label>
								<input type="text" name="login" class="form-control" autofocus required>
							</div>
							<div class="form-group mb-3">
								<label>Пароль</label>
								<input type="password" name="password" class="form-control" required>
							</div>
						</div>
						<div class="p-3 bg-white rounded-3 shadow-sm mt-4">
							<div class="form-group">
								<label>Дни работы</label>
								<div class="d-flex gap-2 mt-3">
									<button type="button" class="btn btn-light flex-grow-1 work-day" data-day="1">Пн</button>
									<button type="button" class="btn btn-light flex-grow-1 work-day" data-day="2">Вт</button>
									<button type="button" class="btn btn-light flex-grow-1 work-day" data-day="3">Ср</button>
									<button type="button" class="btn btn-light flex-grow-1 work-day" data-day="4">Чт</button>
									<button type="button" class="btn btn-light flex-grow-1 work-day" data-day="5">Пт</button>
									<button type="button" class="btn btn-light flex-grow-1 work-day" data-day="6">Сб</button>
									<button type="button" class="btn btn-light flex-grow-1 work-day" data-day="7">Вс</button>
								</div>
							</div>
						</div>
						<div class="p-3 bg-white rounded-3 shadow-sm mt-4">
							<div class="form-group">
								<label>Обеденный перерыв</label>
								<div class="d-flex gap-2 mt-3">
									<select class="form-control flex-grow-1" name="minutes">
										<option value="10">10 минут</option>
										<option value="20">20 минут</option>
										<option value="30">30 минут</option>
										<option value="40">40 минут</option>
										<option value="50">50 минут</option>
										<option value="60">60 минут</option>
									</select>
									<select class="form-control flex-grow-1" name="hours">
										<option value="1">Каждый час</option>
										<option value="2">Каждые 2 часа</option>
										<option value="3">Каждые 3 часа</option>
										<option value="4">Каждые 4 часа</option>
										<option value="5">Каждые 5 часов</option>
										<option value="6">Каждые 6 часов</option>
										<option value="7">Каждые 7 часов</option>
										<option value="8">Каждые 8 часов</option>
									</select>
								</div>
							</div>
						</div>
						<input type="hidden" name="action" value="add_user">
						<input type="hidden" name="days" value="">
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