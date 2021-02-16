<?php 
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
    if ($isAdmin){
        echo "DELETE'";die();
	    //$CategorieManager->supressionCategorie($_GET['id']);
	    header("Location:ListeCategorie.php");
    }else{
        echo "Acces Interdit";
    }
	?>