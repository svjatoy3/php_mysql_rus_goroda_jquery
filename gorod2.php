<?php
include("connect.php");
mysqli_set_charset($connect,"utf8");
 
if (!empty($_GET['stt'])) {
	$stt = $_GET['stt'];
//echo "<br>".$stt."<br><br>";
 
$us1=mysqli_query($connect,"SELECT * FROM cscart_goroda WHERE code='".$stt."' "); // выбираем 
if (mysqli_num_rows($us1)>0) {
$data1=mysqli_fetch_array($us1, MYSQLI_ASSOC);

//echo $data1['city_id'];

echo "<select name='gorod' class='gorod' ><option value='1'>Выберите город</option>";
//echo "<option >Москва</option>";
while ($data1=mysqli_fetch_array($us1, MYSQLI_ASSOC) ) {	
echo "<option value='".$data1['id']."' >" . $data1[ 'city' ]." </option>";	
}
echo "</select>";


}
}


 
 
if (!empty($_GET['gor'])) {
	$citt = $_GET['gor'];
//echo "<br>".$citt."<br><br>";


$usz=mysqli_query($connect,"SELECT zipcode,city FROM cscart_goroda WHERE id='".$citt."' "); // выбираем 
if (mysqli_num_rows($usz)>0) {
$dataz=mysqli_fetch_array($usz, MYSQLI_ASSOC);

echo "
<input type='hidden' name='s_city' value='".$dataz[ 'city' ]."'>
<input type='text' name='s_zipcode' value='".substr($dataz[ 'zipcode' ], 0, 6)."'>";

}

}

 





?>