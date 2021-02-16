<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
    if ($isAdmin) {
        $CompteManager->modifyCompte($_POST['id'], $_POST['NewName'], $_POST['NewPassword'], $_POST['NewEmail'], $_POST['Role']);
        header('Location: AdminBoard.php');
    }else{
        echo"acces interdie";
    }
?>