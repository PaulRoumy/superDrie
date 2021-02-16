<?php
require_once ('init.php');
$connection = false;
if(isset($_POST['Email'])&&(isset($_POST['password']))){
	$Email=$_POST['Email'];
	$password=$_POST['password'];
	$valid = $CompteManager->validCnx($Email,$password);
	$name = $CompteManager->getNameByEmail($Email);
	$id = $CompteManager->getNumCompte($Email);
	if($valid){
		$_SESSION['id'] = $id;
		$connection = true;
		

	}
}elseif(isset($_SESSION['id']) && $_SESSION['id']){
	$connection = true;
}
//function controlConnection($user,$mdp){


//}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
</head>
<body>
<?php
	if(!$connection){?>
	<main  id="main" role="main" class="flex-item-fluid pam">
    	<form class="police" method="Post" action="Login.php">
    		<p class="police" id="id_p"><label class="police" for="Email">Email :</label>
   		 		<input class="police"type="text" name="Email" id="Email"><br /></p>
   			<p class="police" id="id_p"><label class="police" for="password">Mot de passe :</label>
       	 		<input class="police"type="password" name="password" id="password"><br /></p>   

    		<p class="police"id="id_bt">
				<input class="police" id="bt_connexion" type="submit" value="Connexion" /></p>
		</form>
	</main>
	<?php }else{?>
		<p>Bonjour <?php echo  $CompteManager->getNameByEmail($Email);?> </br>
			<a href="index.php">Retour a la boutique</a> 

		 </p>
	<?php } ?>
</body>
</html>