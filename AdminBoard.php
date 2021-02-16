<?php
  require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);

if ($isAdmin) {
  $raws = $CompteManager->getAll();
  echo '<br>';

?>


<table>
            <tr>
                <td>NumCompte</td>
                <td>Nom</td>
                <td>Email</td>
                <td>Passeword</td>
                <td>Role</td>
                <td></td>
                <td></td>
            </tr>

            <?php
               foreach ($raws as $row) {
                  # code...
                
                   echo "<tr>";
                   echo "<td>".$row->NumCompte."</td>";
                   echo "<td>".$row->Nom."</td>";
                   echo "<td>".$row->Email."</td>";
                   echo "<td>".$row->MotDePasse."</td>";
                   echo "<td>".$RoleManager->getByNumRole($row->NumRole)->NomRole."</td>";
                   echo "<td><a href='deleteCompte.php?id=".$row->NumCompte."'><button>Supprimer</button></a></td>";
                   echo "<td><a href='modifyCompte.php?numCompte=".$row->NumCompte."&action=modify'><button> Modifier</button></a></td>";
                   echo "</tr>";
               }

            ?>
        </table>
        <!DOCTYPE html>
        <html>
        <head>
          <title></title>
        </head>
        <body>
        <a href="modifyCompte.php?action=create"><button>Add</button></a></br>
        <a href="ListeProduit.php"><button>Liste Produit</button></a>
        <a href="ListeCategorie.php"><button>Liste Categorie</button></a>
        </body>
        </html>
<?php } else{
    echo "acces interdie";
}?>
       
        