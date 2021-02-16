<?php 
	require_once('init.php');
 $isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin) {
if (isset($_POST['Name'])) {
	$CategorieManager->add($_POST['Name']);
}

?><form class="police" method="Post" action="addCategorie.php">
		<p><label class="police" for="Name">Name :</label> 
		<input class="police"type="text" name="Name" id="Name"><br /></p>
		
		<input class="police" id="bt_valider" type="submit" value="Valider" /></p>
	</form>
	<a href="ListeCategorie.php"><button>Retour</button></a>
<?php }else{
    echo "acces interdie";
}?>