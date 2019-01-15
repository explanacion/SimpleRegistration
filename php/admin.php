<?
 /* 15.01.19
	Тестовое задание. Неклюдов К.А.
	Данный файл содержит необходимый код для административной части
 */
?>
<html>
<head>
    <title>Тестовое задание. Неклюдов К.А.</title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<?
	// Простейшая авторизация по логину-паролю
	// Для тестового задания логин admin, пароль 12345
	// С точки зрения безопасности лучше использовать SSL, 
	// хранить не открытые пароли, а хеши в базе данных и
	// использовать двухфакторную авторизацию или OAuth 
	$login = "admin";
	$password = "12345";
	// функция показывает сообщение об ошибке авторизации
	function sendErrorAuthMsg(){
		echo "<html><body>"
		,"<h1>Ошибка аутентификации</h1>"
		,"<p>Обратитесь к администратору для получения логина и пароля.</p><a class=\"btn btn-success\" href=\"/php/admin.php\" role=\"button\">Вернуться</a>"
		,"<a class=\"btn btn-primary offset-md-1\" href=\"/\" role=\"button\">На главную</a></body></html>";
		exit;
	};
	// функция отображает форму для входа в закрытый раздел сайта
	function showSignInForm()
	{
		echo '<body>
		<h2>Вход в административный раздел.</h2>
		<div class="row p-4 col-sm-12">
		    <form id="auth" method="post" action="/php/admin.php">
		    <div class="form-group col-sm-6">
		        Логин: <input type="text" name="login" required autofocus /><br/>
		    </div>
		    <div class="form-group col-sm-6">
		        Пароль: <input type="text" name="passwd" required autofocus /><br/>
		    </div>
			<div class="form-group col-sm-12 row">
		        <input type="submit" name="submitbtn" class="btn btn-success"></input>
				<a class="btn btn-primary offset-md-1" href="../" role="button">На главную</a>
			</div>
		    </form>
		</div>
		</body></html>';
		exit;
	}
	// функция очистки пользовательских данных от лишних символов и тегов
	function clean($value = "") {
		$value = trim($value); // удаляем лишние пробелы
		$value = stripslashes($value); // удаляем экранированные символы 
		$value = strip_tags($value); // удаляем HTML и PHP теги
		$value = htmlspecialchars($value); // обезвреживаем спец.символы
		return $value;
	}
	
	// данных для авторизации нет
	if ($_SERVER['REQUEST_METHOD'] != 'POST') 
	{	
		showSignInForm();
	}
	else {
		if (!isset($_POST['login'])) {
			showSignInForm();
		}
		else {
			$auth_user = clean($_POST['login']);
			$auth_pass = clean($_POST['passwd']);
			
			if (empty($auth_user) || empty($auth_pass) || ($auth_user != $login) || ($auth_pass != $password)) {
				sendErrorAuthMsg();
			}
			else {
				echo "<h1>Добро пожаловать, " . $auth_user . "</h1>";
				define('SHOWPAGE',true);
			}
		}
	}
	?>
<? 
// если данные авторизации были получены - показываем страницу
if ('SHOWPAGE'): ?>
<!DOCTYPE html>
<body>
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
	<? endif; ?>
	<?
	// чтение csv-файла для заполнения таблицы
	$csvfile = fopen('users.csv', 'r');
	$row = 1;
	if (($handle = $csvfile) !== FALSE) {
		while (($data = fgetcsv($handle, 0)) !== FALSE) {
			$num = count($data);
			if ($num != 6)
			{
				echo "Число полей в строке не равно шести. Нарушена структура файла. Строка №" . $row;
				break;
			}
				
			echo '<tr>';
			echo '<th scope="row">'. $row .'</th>';
			for ($c=0; $c < $num; $c++) {
				$line = $data[$c];
				echo '<th scope="row">'.clean($line).'</th>';
				 
			}
			$row++;
		}
	}
?>
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