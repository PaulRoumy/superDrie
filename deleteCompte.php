<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
    if ($isAdmin) {
        $CompteManager->suppressionCompte($_GET['id']);
        header("Location:AdminBoard.php");
    }else{
        echo "acces interdie";
    }
?>