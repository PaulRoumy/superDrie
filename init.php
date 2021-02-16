<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db.php');
//require_once('CategorieManager.php');
//require_once('Categorie.php');
require_once('Role.php');
require_once('RoleManager.php');
//require_once('Produit.php');
//require_once('ProduitManager.php');
require_once('Compte.php');
require_once('CompteManager.php');
$RoleManager = new RoleManager($db);
//$CategorieManager = new CategorieManager($db);
//$ProduitManager = new ProduitManager($db);
$CompteManager = new CompteManager($db, $RoleManager);

 function isAdmin($CompteManager,$id){
    $Email = $CompteManager->getEmailByNumCompte($id);
    $isAdmin =$CompteManager->isAdmin($Email);
    return $isAdmin;
};


?>