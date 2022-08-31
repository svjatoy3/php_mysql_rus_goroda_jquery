<!DOCTYPE html>
<html>
<head>
<title>города</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" data-ca-mode="" />
 <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<script>
 $(document).ready(function() {
    $('select.s_state').change(function(){
		  
	$.ajax({
	url: 'gorod2.php',         /* Куда пойдет запрос */
	method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	data: {stt: $('select.s_state').val() },     /* Параметры передаваемые в запросе. */
	cache: false,
	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
		//alert(data);            /* В переменной data содержится ответ от index.php. */
		//document.getElementById("new_select").value=data;
		document.getElementById("new_select").innerHTML=data;
		
	}
});
	 
		 
    });
	
	
	$('#new_select').on('change','select.gorod',function(){
		
	$.ajax({
	url: 'gorod2.php',         /* Куда пойдет запрос */
	method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	data: {gor: $('select.gorod').val() },     /* Параметры передаваемые в запросе. */
	cache: false,
	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
		//alert(data);            /* В переменной data содержится ответ от index.php. */
		//document.getElementById("new_select").value=data;
		document.getElementById("zipp").innerHTML=data;
		
	}
});
		
	});
});

</script>
<body>

<?php

//echo $_REQUEST['utext'];

include("connect.php");
mysqli_set_charset($connect,"utf8");
 
$us=mysqli_query($connect,"SELECT * FROM cscart_oblast "); // выбираем 
if (mysqli_num_rows($us)>0) {
$data=mysqli_fetch_array($us, MYSQLI_ASSOC);

echo "<select name='s_state' class='s_state'  required>";
echo "<option value='MOW' >Москва</option>";
while ($data=mysqli_fetch_array($us, MYSQLI_ASSOC) ) {	
echo "<option value='".$data['code']."' >" . $data[ 'state' ] . " </option>";	
}
echo "</select>";
}


echo "<p id='new_select'><select name='s_city' class='s_city' >
<option value='Москва'>Москва</option>
</select></p>Почтовый индекс: <p id='zipp'><input type='text' name='s_zipcode' value='101000'></p>";


?>

</body>
</html>