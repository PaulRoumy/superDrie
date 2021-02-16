<?php 
require_once("init.php");

 
//var_dump($CompteManager->isAdmin('paul@gmail.com'));
//var_dump( $CompteManager->validCnx('mich','root'));
//var_dump($CompteManager);
//$id = $CompteManager->add('Paul', 'paul@gmail.com', 'EEA3E2pa', 2);

//var_dump( $CategorieManager->supressionCategorie("Ordinateur"));

// $account->email;
// $account->password;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Index.php</title>
</head>
<body>
	<?php
		if ( isset($_SESSION['id']) && $_SESSION['id']) {
            var_dump( $_SESSION['id']) ;
            $Email = $CompteManager->getEmailByNumCompte($_SESSION['id']);
            echo 'tutu' . $Email;
			$isAdmin =$CompteManager->isAdmin($Email);

			?>
			<header> Bonjour <?php echo $CompteManager->getNameByEmail($Email);?>, bienvenue sur php.minishop.</header>
			<a href="Deconnection.php">Se Déconnecter</a></p>
			<?php
			 if ($isAdmin) {?>
			 	<a href="AdminBoard.php">Tableau de bord Admin</a>

			 	
			<?php }
			?>
<?php	
		}else{
			?>
			<header>Bonjour visteur, bienvenue sur php.minishop.</header>
			<a href="Login.php">Se Connecter</a></p>
<?php
		}
	?>
	
	<p>
</body>
</html>
<?php

?>