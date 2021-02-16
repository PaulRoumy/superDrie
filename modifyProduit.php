<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin){

	$Categories = $CategorieManager->getAll();
	//var_dump($Categories);
	//var_dump($_GET['id']);
	if (isset($_GET['id'])) {

		$NumProduit= $_GET['id'];

		$produit = $ProduitManager->getByNumProduit($NumProduit);
		//var_dump($produit);
		if ($produit) { 
			
			$Stock = $produit->Stock;
			$nom =$produit->NomPRoduit;
			$prix =$produit->Prix;
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>modify</title>
</head>
<body>
	<form class="police" method="Post" action="doModifyProduit.php">
		<input hidden class="police"type="text" name="id" id="id" value='<?php echo $NumProduit;?>' ><br /></p>
		<p><label class="police" for="NewName">New Name :</label> 
		<input class="police"type="text" name="NewName" id="NewName" value='<?php echo $nom;?>' ><br /></p>
		<p><label class="police" for="NewPasseword">New Prix :</label> 
		<input class="police"type="text" name="NewPrix" id="NewPrix" value='<?php echo $prix;?>'> <br /></p>
		<p><label class="police" for="NewName">Stock :</label> 
		<input class="police"type="text" name="Stock" id="Stock" value='<?php echo $Stock;?>'><br /></p>
		<p><label class="police" for="NewName">New Categorie :</label> 
		<select name="Categorie" id="Categorie-select">
	<?php foreach($Categories as $Categorie){
	echo"<option value=".$Categorie->NumCategorie."> ". $Categorie->NomCategorie."</option>";
}?></p>
		<input class="police" id="bt_valider" type="submit" value="Valider" /></p>

	</form>

	
	<a href="AdminBoard.php"><button>Retour</button></a>
	
</body>
<?php }else{
    echo "acces interdie";
}
?>