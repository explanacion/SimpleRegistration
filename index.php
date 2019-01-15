<!DOCTYPE html>
<html>
<head>
    <title>Тестовое задание. Неклюдов К.А.</title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="row">
    <div class="w-100">
		<div class="p-4">
		<p class="h2 text-center">Форма регистрации для участников "Ярмарки енотов".</p>
		</div>
		<div class="p-4">
		<form id="regform">
		    <div class="form-group row">
				<label for="name" class="col-sm-3 h4">Имя <span style="color:red">*</span></label>
				<div class="col-sm-4">
				    <input type="text" class="form-control" id="name" placeholder="Введите имя" required>
				</div>
			</div>
		    <div class="form-group row">
				<label for="surname" class="col-sm-3 h4">Фамилия <span style="color:red">*</span></label>
				<div class="col-sm-4">
				    <input type="text" class="form-control" id="surname" placeholder="Введите фамилию">
				</div>
			</div>
		    <div class="form-group row">
				<label for="birthday" class="col-sm-3 h4">Дата рождения</label>
				<div class="col-sm-4">
				    <input type="text" class="form-control" id="birthday" placeholder="Введите дату рождения">
				</div>
			</div>
		    <div class="form-group row">
				<label for="company" class="col-sm-3 h4">Компания</label>
				<div class="col-sm-4">
				    <input type="text" class="form-control" id="company" placeholder="Введите название компании">
				</div>
			</div>
		    <div class="form-group row">
				<label for="position" class="col-sm-3 h4">Должность</label>
				<div class="col-sm-4">
				    <input type="text" class="form-control" id="position" placeholder="Введите название должности">
				</div>
			</div>
		    <div class="form-group row">
				<label for="phone" class="col-sm-3 h4">Телефон <span style="color:red">*</span></label>
				<div class="col-sm-4">
				    <input type="text" class="form-control" id="phone" placeholder="Введите номер телефона" required>
				</div>
			</div>
			<button type="submit" id="form-submit" class="btn btn-success btn-lg float-left">Зарегистрироваться</button>
			<a class="btn offset-md-1 btn-primary btn-lg" href="/php/admin.php" role="button">Вход для администратора</a>
			<div id="msgSubmit" class="h3 text-center d-none">Вы успешно зарегистрированы!</div>
			
		</form>
		</div>
	</div>
</div>
</body>
</html>