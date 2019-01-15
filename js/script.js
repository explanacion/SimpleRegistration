// обработчик на отправку формы
window.onload = function() {
    document.forms["regform"].addEventListener("submit",validateData);
};

function setInfoField(text,isSuccess)
{
	var infoField = document.getElementById("msgSubmit");
	if (isSuccess)
		infoField.innerHTML = '<span style="color:green">' + text + '</span>';
	else
		infoField.innerHTML ='<span style="color:red">' + text + '</span>';
}


function validateData(event){
	var firstName = encodeURIComponent(document.getElementById("name").value);
	var lastName = encodeURIComponent(document.getElementById("surname").value);
	var birthDay = encodeURIComponent(document.getElementById("birthday").value);
	var company = encodeURIComponent(document.getElementById("company").value);
	var position = encodeURIComponent(document.getElementById("position").value);
	var phoneNum = encodeURIComponent(document.getElementById("phone").value);
	var form = document.forms["regform"];
	
    if (form.checkValidity() === false) {
      event.preventDefault()
      event.stopPropagation()
    }
	// дополнительная проверка
	var infoField = document.getElementById("msgSubmit");
	infoField.classList.remove("d-none");
	
	var success = true;
	// проверка номера телефона, знак + преобразуется в %2B
	if (!phoneNum.match(/^%2B\d+$/))
	{
		setInfoField("Поле телефона должно содержать только числа и знак \"+\"",false);
		success = false;
	}
	// проверка даты рождения
	if (birthDay)
	{
		var m = birthDay.match(/^(\d{2}).(\d{2}).(\d{4})$/);
		if (m) 
		{
			var testDate = new Date(m[3], m[2]-1, m[1]);
			if (!testDate) {
				success = false;
				setInfoField("Поле дня рождения должно быть в формате 01.01.2019",false);
			}
		}
		else
		{
			success = false;
			setInfoField("Поле дня рождения должно быть в формате 01.01.2019",false);
		}
	}
	if (success) {
		setInfoField("Данные успешно прошли проверку!",true);
		form.classList.add('was-validated');
	}
	
	var dataToSend = "name=" + firstName + "&surname=" + lastName + "&birthday=" + birthDay + "&company=" + company + "&position=" + position + "&phone=" + phoneNum;
	submitFormAjax(dataToSend);
	
    
}

function submitFormAjax(data)
{
    var xmlhttp= window.XMLHttpRequest ?
        new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{	
			if (xmlhttp.responseText == "OK")
				setInfoField("Вы были успешно зарегистрированы!",true);
		}
    }

    xmlhttp.open("POST","/php/process.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(data);
};