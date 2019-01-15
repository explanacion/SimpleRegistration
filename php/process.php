<?
 /* 15.01.19
	Тестовое задание. Неклюдов К.А.
	Данный файл содержит необходимый код для обработки данных, полученных от пользователя
 */
 
// функция очистки пользовательских данных от лишних символов и тегов
function clean($value = "") {
	$value = trim($value); // удаляем лишние пробелы
	$value = stripslashes($value); // удаляем экранированные символы 
	$value = strip_tags($value); // удаляем HTML и PHP теги
	return $value;
}


$csvfile = fopen('users.csv', 'a');
$fields = array(
		clean($_POST['name']), clean($_POST['surname']), 
		clean($_POST['birthday']), clean($_POST['company']),
		clean($_POST['position']), clean($_POST['phone']),
);

if (!fputcsv($csvfile,$fields))
{
	echo "Error";
}
else 
{
	echo "OK";
}

?>
