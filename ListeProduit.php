<?php
  require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin){
  $raws = $ProduitManager->getAll();
  echo '<br>';
 // var_dump($raws);
?>

<table>
            <tr>
                <td>NumProduit</td>
                <td>NomProduit</td>
                <td>Prix</td>
                <td>NumCategorie</td>
                <td>Stock</td>
                <td></td>
                <td></td>
            </tr>

            <?php
               foreach ($raws as $row) {
                  # code...
                
                   echo "<tr>";
                   echo "<td>".$row->NumProduit."</td>";
                   echo "<td>".$row->NomPRoduit."</td>";
                   echo "<td>".$row->Prix."</td>";
                   echo "<td>".$CategorieManager->getByNumCategorie($row->NumCategorie)->NomCategorie."</td>";
                   echo "<td>".$row->Stock."</td>";
                   echo "<td><a href='deleteProduit.php?id=".$row->NumProduit."'><button>Supprimer</button></a></td>";
                   echo "<td><a href='modifyProduit.php?id=".$row->NumProduit."'><button> Modifier</button></a></td>";
                  echo "</tr>";
               }?>
             </table>
               <!DOCTYPE html>
               <html>
               <head>
                 <title></title>
               </head>
               <body>
                    <a href="addProduit.php"><button>Add</button></a></br>
                    <a href="AdminBoard.php"><button>Liste Compte</button></a>
                    <a href="ListeCategorie.php"><button>Liste Categorie</button></a>
               </body>
               </html>
<?php }else{
    echo "acces interdie";
}
 ?>