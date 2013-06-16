<?php

	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=marionade', 'root', '');
	}
	catch (Exception $e)
	{
	    die('Ca chie');
	}
	
?>