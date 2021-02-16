<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin) {
	$Categories = $CategorieManager->getAll();
if (isset($_POST['Name']) && isset($_POST['Prix']) && isset($_POST['Categorie']) && isset($_POST['Stock'])) {
	$ProduitManager->add($_POST['Name'],$_POST['Prix'],$_POST['Categorie'],$_POST['Stock']);
}

?><form class="police" method="Post" action="addProduit.php">
		<p><label class="police" for="Name">Name :</label> 
		<input class="police"type="text" name="Name" id="Name"><br /></p>
		<p><label class="police" for="Prix">Prix :</label> 
		<input class="police"type="text" name="Prix" id="Prix"><br /></p>
		<p><label class="police" for="Stock">Stock :</label> 
		<input class="police"type="text" name="Stock" id="Stock"><br /></p>
				<select name="Categorie" id="Categorie-select">
	<?php foreach($Categories as $Categorie){
	echo"<option value=".$Categorie->NumCategorie."> ". $Categorie->NomCategorie."</option>";
}?></p>
		<input class="police" id="bt_valider" type="submit" value="Valider" /></p>
	</form>
	<a href="ListeProduit.php"><button>Retour</button></a>
<?php }else{
    echo "acces interdie";
}?>