<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin) {
    $ProduitManager->modifyProduit($_POST['id'], $_POST['NewName'], $_POST['NewPrix'], $_POST['Stock'], $_POST['Categorie']);
    header('Location:ListeProduit.php');
}else{
    echo "acces interdie";
}
?>