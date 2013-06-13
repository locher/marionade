<?php

//Connexion BDD

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=marionade', 'root', '');
}
catch (Exception $e)
{
    die('Ca chie');
}

//Récupérer le tableau
$bdd->query('SET NAMES "utf8"');
$expressions = $bdd->query('SELECT * FROM expressions');


$table_expression = array();

while($export_expressions = $expressions->fetch()){
	$conteneur_expression = array($export_expressions['partie1'],$export_expressions['partie2']);
	$table_expression[]=$conteneur_expression;
}

//nombre d'expressions
$count_max = count($table_expression) - 1;

//random

$random1 = rand(0,$count_max);
$random2 = rand(0,$count_max);

while ($random1 == $random2) {
	$random1 = rand(0,$count_max);
}

$partie1 = $table_expression[$random1][0];
$partie2 = $table_expression[$random2][1];

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Générateur de Marionade</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<?php echo $partie1.' '.$partie2; ?>

</body>
</html>