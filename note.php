<?php include('inc/bdd.php');?>

<?php

// Récupérer les valeurs des forms
$part_expression_1 = $_POST['part_expression_1'];
$part_expression_2 = $_POST['part_expression_2'];
$etat_note = $_POST['etat_note'];

$valeur_note_negatif = 0;
$valeur_note_positif = 0;


//Si la ligne existe déjà, on cherche la valeur de note positif et note négatif

$note_positif = $bdd->query('SELECT note_positif FROM note_expression WHERE id_partie1='.$part_expression_1.' AND id_partie2='.$part_expression_2.'');
$export_positif = $note_positif->fetch();

if(count($export_positif)==2)
{
	//Si elle existe déjà, on cherche sa valeur
	$valeur_note_positif = $export_positif[0];
}


$note_negatif = $bdd->query('SELECT note_negatif FROM note_expression WHERE id_partie1='.$part_expression_1.' AND id_partie2='.$part_expression_2.'');
$export_negatif = $note_negatif->fetch();

if(count($export_negatif)==2)
{
	//Si elle existe déjà, on cherche sa valeur
	$valeur_note_negatif = $export_negatif[0];
}


/*********************
UPDATE DES DATABASE 
*********************/

//Si il a aimé la quote

if($etat_note == 'positif')
{
	$valeur_note_positif++;

	//Regarder si la note existe déjà
	if(count($export_positif)==2)
	{
		$bdd->query('UPDATE note_expression SET note_positif='.$valeur_note_positif.' WHERE id_partie1='.$part_expression_1.' AND id_partie2='.$part_expression_2.'');
		echo "note positif et valeur existante";
	}

	//Si elle existe pas encore, on ajoute la ligne
	else
	{
	$bdd->query("INSERT INTO note_expression (id_partie1, partie_id1, afficher_combinaison, id_partie2, partie_id2, note_positif) VALUES ('".$part_expression_1."', 1, true,'".$part_expression_2."', 2,'".$valeur_note_positif."')");
	echo "note positif et valeur innexistante";
	}	
}

//Si il a pas aimé la quote

else if($etat_note == 'negatif')
{
	$valeur_note_negatif++;
	//Regarder si la note existe déjà
	if(count($export_negatif)==2)
	{
		$bdd->query('UPDATE note_expression SET note_negatif='.$valeur_note_negatif.' WHERE id_partie1='.$part_expression_1.' AND id_partie2='.$part_expression_2.'');
		echo "note negative et valeur existante";
	}

	//Si elle existe pas encore, on ajoute la ligne
	else
	{
	$bdd->query("INSERT INTO note_expression (id_partie1, partie_id1, afficher_combinaison, id_partie2, partie_id2, note_negatif) VALUES ('".$part_expression_1."', 1, 1, '".$part_expression_2."', 2,'".$valeur_note_negatif."')");
	echo "note negative et valeur innexistante";
	}	
}

//On les redirige sur une autre quote
header("Location: index.php");

?>