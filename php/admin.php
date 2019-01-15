<!DOCTYPE html>
<html>
<head>
    <title>Тестовое задание. Неклюдов К.А.</title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?
 // TODO здесь нужно будет прочитать csv-файл для заполнения таблицы
?>

<div class="row">
    <div class="w-100">
        <p class="h2 text-center">Страница для администратора.</p>
		<br>
		<div class="row">
			<div class="col-sm-8">
				<p class="h3 text-center">Список зарегистрированных пользователей</p>
			</div>
			<div class="col-sm-4">
				<form>
				<input type="button" id="getUsers" value="Выгрузить пользователей" class="btn btn-success btn-lg pull-right" onClick="window.location.href='/php/users.csv'"></input>
				</form>
			</div>
		</div>
		<div class="p-4">
			<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Имя</th>
					<th scope="col">Фамилия</th>
					<th scope="col">Дата рождения</th>
					<th scope="col">Компания</th>
					<th scope="col">Должность</th>
					<th scope="col">Телефон</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<th scope="row"></th>
					<th scope="row"></th>
					<th scope="row"></th>
					<th scope="row"></th>
					<th scope="row"></th>
					<th scope="row"></th>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="p-4">
		<a class="btn btn-primary" href="../" role="button">На главную</a>
	</div>
</div>
</body>
</html>