<?php 
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin) {
    $ProduitManager->supressionProduit($_GET['id']);
    header("Location:ListeProduit.php");
}else{
    echo "acces interdie";
}
	?>