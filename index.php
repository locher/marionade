<?php include('affichage_quote.php');?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Générateur de Marionade</title>
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Radley:400,400italic' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="wrapper">

		<h1 class="citation"><?php echo $partie1.' '.$partie2; ?></h1>

		<div class="conteneur-refresh">
			<a href="" class="refresh">Une autre !</a>
		</div>

		<div class="conteneur_note">
			<form method="post" action="note.php" class="formulaire_note like_form">		
				<input type="submit" value="&#57344;">
				<input type="hidden" name="part_expression_1" value="<?php echo $id_partie1;?>" />
				<input type="hidden" name="part_expression_2" value="<?php echo $id_partie2;?>" />
				<input type="hidden" name="etat_note" value="positif" />
				<p>(
					<?php 
						if(isset($note_positif))
						{
							echo $note_positif;
						}
						else
						{
							echo '0';
						}
					?>
				)</p>
			</form>

			<form method="post" action="note.php" class="formulaire_note dislike_form">		
				<input type="submit" value="&#57345;">
				<input type="hidden" name="part_expression_1" value="<?php echo $id_partie1;?>" />
				<input type="hidden" name="part_expression_2" value="<?php echo $id_partie2;?>" />
				<input type="hidden" name="etat_note" value="negatif" />
				<p>(
					<?php 
						if(isset($note_negatif))
						{
							echo $note_negatif;
						}
						else
						{
							echo '0';
						}
					?>
				)</p>
			</form>
		</div>

		<footer>
			<p class="nombre_expression">Il y a actuellement <span><?php echo count($table_expression);?></span> expressions répertoriées, soit <span><?php echo(count($table_expression)*count($table_expression)-count($table_expression));?></span> possibilitées.</p>
		</footer>

	</div>






</body>
</html>