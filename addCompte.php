<?php
require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin) {
$roles = $RoleManager->getAll();
if (isset($_POST['Name']) && isset($_POST['Passeword']) && isset($_POST['Email']) && isset($_POST['Role'])) {
	$CompteManager->add($_POST['Name'],$_POST['Passeword'],$_POST['Email'],$_POST['Role']);
}

?><form class="police" method="Post" action="addCompte.php">
		<p><label class="police" for="Name">Name :</label> 
		<input class="police"type="text" name="Name" id="Name"><br /></p>
		<p><label class="police" for="Passeword">Passeword :</label> 
		<input class="police"type="password" name="Passeword" id="Passeword"><br /></p>
		<p><label class="police" for="Email"> Email :</label> 
		<input class="police"type="text" name="Email" id="Email"><br /></p>
		<p><label class="police" for="NumRole">NumRole :</label> 
		<select name="Role" id="Role-select">
	<?php foreach($roles as $role){
	echo"<option value=".$role->NumRole."> ". $role->NomRole."</option>";
}?></p>
		<input class="police" id="bt_valider" type="submit" value="Valider" /></p>
	</form>
	<a href="AdminBoard.php"><button>Retour</button></a>
<?php }else{
    echo "acces interdie";
}?>