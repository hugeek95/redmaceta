<?php

require_once 'init.php';

if (!$user->premium){
	header('Location: galeria.php');
	exit();
}
?>
