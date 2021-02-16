<?php
  require_once('init.php');
$isAdmin= isAdmin($CompteManager,$_SESSION['id']);
if ($isAdmin) {
  $raws = $CategorieManager->getAll();
  echo '<br>';
  //var_dump($raws[0]->NumCompte);
?>

<table>
            <tr>
                <td>NumCategorie</td>
                <td>NomCategorie</td>
                
                <td></td>
                <td></td>
            </tr>

            <?php
               foreach ($raws as $row) {
                  # code...
                
                   echo "<tr>";
                   echo "<td>".$row->NumCategorie."</td>";
                   echo "<td>".$row->NomCategorie."</td>";
                   echo "<td><a href='modifyCategorie.php?id=".$row->NumCategorie."'><button> Modifier</button></a></td>";
                  echo "</tr>";
               }?>
             </table>
               <!DOCTYPE html>
               <html>
               <head>
                 <title></title>
               </head>
               <body>
                    <a href="addCategorie.php"><button>Add</button></a></br>
                    <a href="AdminBoard.php"><button>Liste Compte</button></a>
                    <a href="ListeProduit.php"><button>Liste Produit</button></a>
               </body>
               </html>
<?php }else{
    echo "acces interdie";
}?>