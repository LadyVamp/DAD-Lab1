<meta charset="utf-8">
<?php
function clearData($data, $type='i') {
	switch ($type) {
		case 'i':
			return $data*1;
			break;
		case 's':
			return trim(strip_tags($data));
			break;
	}
}
$output = "";
if ($_SERVER ['REQUEST_METHOD'] == "POST"){
	$number1 = clearData ($_POST['number1']);
	$number2 = clearData ($_POST['number2']);
	$operator = clearData ($_POST['operator'], 's');
	$output = "$number1 $operator $number2 = ";
	switch ($operator) {
		case '+':
			$output .= $number1 + $number2; break;
		case '-':
			$output .= $number1 - $number2;	break;
		case '*':
			$output .= $number1 * $number2; break;
		case '/':
		if($number2 == 0)
			$output = "На ноль делить нельзя!"; 
		else
			$output .= $number1 / $number2; 
			break;
		
		default:
			$output = "Неизвестный оператор '$operator'";
			break;
	}

}
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
Число 1: <br />
<input type="text" name="number1"><br />
Оператор: <br />
<input type="text" name="operator"><br />
Число 2: <br />
<input type="text" name="number2"><br /><br />
<input type="submit" value="Считать">
</form>

<?php
if ($output) {
	echo $output;
}

?>

