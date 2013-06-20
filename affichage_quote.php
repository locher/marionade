<?php

include('inc/bdd.php');

$bdd->query('SET NAMES "utf8"');

//Récupérer toutes les quotes pour les compter

$expressions = $bdd->query('SELECT * FROM expressions');

$table_expression = array();

while($export_expressions = $expressions->fetch()){
	$conteneur_expression = array($export_expressions['partie1'],$export_expressions['partie2'],$export_expressions['expression_id']);
	$table_expression[]=$conteneur_expression;
}

//Récupérer une quote aléatoire

$expressions = $bdd->query('SELECT note_positif, note_negatif, t1.partie1, t2.partie2, t1.expression_id as id1, t2.expression_id, afficher_combinaison FROM expressions as t1 LEFT JOIN expressions as t2 ON (t1.expression_id <> t2.expression_id) LEFT JOIN note_expression ON (t1.expression_id = note_expression.id_partie1 AND t2.expression_id = note_expression.id_partie2) WHERE afficher_combinaison = 1 OR afficher_combinaison IS NULL ORDER BY rand() LIMIT 1');
 
$export_expressions = $expressions->fetch();

$partie1 = $export_expressions[2];
$partie2 = $export_expressions[3];

$note_positif = $export_expressions[0];
$note_negatif = $export_expressions[1];

$id_partie1 = $export_expressions[4];
$id_partie2 = $export_expressions[5];

?>