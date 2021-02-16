<?php
	require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin){
    if (isset($_GET['action']) && $_GET['action'] == 'create'){

    }elseif (isset($_GET['action']) && $_GET['action'] == 'modify') {
        $roles = $RoleManager->getAll();
        var_dump($roles);

        if (isset($_GET['numCompte'])) {

            $NumCompte = $_GET['numCompte'];

            $compte = $CompteManager->getByNumCompte($NumCompte);
            if ($compte) {

                $email = $compte->Email;
                $nom = $compte->Nom;
                $numrole = $compte->NumRole;
            }
        }
        if (isset($_POST['NewName']) && isset($_POST['NewPassword']) && isset($_POST['NewEmail']) && isset($_POST['NewRole'])) {


        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>modify</title>
</head>
<body>
	<form class="police" method="Post" action="doModifyCompte.php">
		<input hidden class="police"type="text" name="id" id="id" value='<?php echo $NumCompte;?>' ><br /></p>
		<p><label class="police" for="NewName">New Name :</label> 
		<input class="police"type="text" name="NewName" id="NewName" value='<?php echo $nom;?>' ><br /></p>
		<p><label class="police" for="NewPasseword">New Password :</label> 
		<input class="police"type="text" name="NewPassword" id="NewPassword"><br /></p>
		<p><label class="police" for="NewName">New Email :</label> 
		<input class="police"type="text" name="NewEmail" id="NewEmail" value='<?php echo $email;?>'><br /></p>
		<p><label class="police" for="NewName">New Role :</label> 
		<select name="Role" id="Role-select">
	<?php foreach($roles as $role){
	echo"<option value=".$role->NumRole."> ".$role->NomRole."</option>";
}?></p>
		<input class="police" id="bt_valider" type="submit" value="Valider" /></p>

	</form>
<?php }else{
    echo "acces interdie";
}

?>
  <!--  <option value="">--Please choose an option--</option>
    
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>

	
	<a href="AdminBoard.php"><button>Retour</button></a>
</body>
</html>



-->