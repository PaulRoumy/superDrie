<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin){

	if (isset($_GET['id'])) {

		$NumCategorie= $_GET['id'];

		$categorie = $CategorieManager->getByNumCategorie($NumCategorie);
		//var_dump($produit);
		if ($categorie) { 
			$NomCategorie =$categorie->NomCategorie;

			
			
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>modify</title>
</head>
<body>
	<form class="police" method="Post" action="doModifyCategorie.php">

		<input  hidden class="police"type="text" name="id" id="id" value='<?php echo $NumCategorie;?>' ><br /></p>
		<p><label class="police" for="NewPasseword">NomCategorie :</label> 
		<input class="police"type="text" name="NomCategorie" id="NomCategorie" value='<?php echo $NomCategorie;?>'> <br /></p>
		
</p>
		<input class="police" id="bt_valider" type="submit" value="Valider" /></p>

	</form>

	
	<a href="AdminBoard.php"><button>Retour</button></a>
	
</body>
    <?php }else{
    echo "acces interdie";

}?>