<?php include('inc/bdd.php');?>

<?php

// Récupérer les id des parties de l'expression
$part_expression_1 = $_POST['part_expression_1'];
$part_expression_2 = $_POST['part_expression_2'];

//Récupérer valeur de notes positives
$note_positif = $bdd->query('SELECT note_positif FROM note_expression WHERE id_partie1='.$part_expression_1.' AND id_partie2='.$part_expression_2.'');
$export_positif = $note_positif->fetch();

//Regarder si la note existe déjà
if(count($export_positif)==2){

	//Si elle existe déjà, on cherche sa valeur
	$valeur_note_positif = $export_positif[0];

	//on l'incrémente et on update la database
	$valeur_note_positif++;

	$bdd->query('UPDATE note_expression SET note_positif='.$valeur_note_positif.' WHERE id_partie1=16 AND id_partie2=8');
}

//Si elle existe pas encore, on ajoute la ligne avec 1 pour valeur_note_positif
else{
	$bdd->query("INSERT INTO note_expression (id_partie1, partie_id1, id_partie2, partie_id2, note_positif) VALUES ('.$part_expression_1.', 1, '.$part_expression_2.', 2, 1)");
}

?>