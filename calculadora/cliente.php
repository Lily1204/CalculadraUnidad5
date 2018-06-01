
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
</head>
<body>
<?php

require_once('lib/nusoap.php');
$cliente = new nusoap_client('http://localhost/calculadora/servicio.php');
if(isset($_POST["num1"]))
	$num1 =$_POST["num1"];

	if(isset($_POST["num2"]))
	$num2 =$_POST["num2"];

	if(isset($_POST["operacion"]))
	$operacion =$_POST["operacion"];


if(!isset($num1) || !isset($num2) || !isset($operacion)){
	echo "<form method='POST'>";
	echo "<input type='text' id='num1' name='num1' placeholder='valor 1'>";
	echo "<input type='text' id='num2' name='num2' placeholder='valor 2'><br>";
	echo "<select name='operacion' id='operacion'>";
	echo "<option value='suma'>Suma</option>";
	echo "<option value='resta'>Resta</option>";
	echo "<option value='multiplica'>Multiplicacion</option>";
	echo "<option value='divide'>Division</option>";
	echo "</select>";
	echo "<input type='submit' onclick='funcion()' value='Calcular'/>";
	echo "</form>";
	echo "<label id='resultado'/>";
}else{
	
	     $resultado = $cliente->call('calculadora', array(	'x' => $num1, 'y' => $num2, 'operacion' =>$operacion) );
		 echo $resultado;
		

}
  

?>

</body>
</html>
