<?php include('inc/bdd.php');?>

<?php

//Récupérer le tableau
$bdd->query('SET NAMES "utf8"');
$expressions = $bdd->query('SELECT * FROM expressions');


$table_expression = array();

while($export_expressions = $expressions->fetch()){
	$conteneur_expression = array($export_expressions['partie1'],$export_expressions['partie2'],$export_expressions['expression_id']);
	$table_expression[]=$conteneur_expression;
}

//nombre d'expressions
$count_max = count($table_expression) - 1;

//random
$random1 = rand(0,$count_max);
$random2 = rand(0,$count_max);

//Si on tombe sur le même chiffre, on recommence
while ($random1 == $random2){
	$random1 = rand(0,$count_max);
}

//Les id (différents) obtenus par Random

$id_partie1 = $table_expression[$random1][2];
$id_partie2 = $table_expression[$random2][2];

//vérifier les note de la combinaison et si il a le droit de s'afficher

$query_note = $bdd->query('SELECT afficher_combinaison, note_positif, note_negatif FROM note_expression WHERE id_partie1='.$id_partie1.' AND id_partie2='.$id_partie2.'');

$export_affichable = $query_note->fetch();

$affichable = $export_affichable[0];
$note_positive = $export_affichable[1];
$note_negative = $export_affichable[2];


//Ok on regarde ce qui a derrière les ID

$partie1 = $table_expression[$random1][0];
$partie2 = $table_expression[$random2][1];

//Gérer les notes

if(count($export_affichable)>0)
{
	if(isset($affichable) AND $affichable==false)
	{
		//change de combinaison
	}

	else if($affichable==true)
	{
		//tout roule bébé
	}
}


?>