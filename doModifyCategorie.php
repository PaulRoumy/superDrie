<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin) {
    $CategorieManager->modifyName($_POST['id'], $_POST['NomCategorie']);
    header('Location:ListeCategorie.php');
}else{
    echo "acces interdie";
}
?>