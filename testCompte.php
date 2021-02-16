<?php
require_once('init.php');

$idAdmin=$CompteManager->add('MonsieurAdmin','monsieuradmin@gxxx.com','toto',2);
$idClient=$CompteManager->add('MonsieurClient','monsieurclient@gxxx.com','toto',1);

var_dump( $idAdmin);
var_dump($idClient);

var_dump(isAdmin($CompteManager,$idAdmin));
var_dump(isAdmin($CompteManager,$idClient));
 $EmailAd=$CompteManager->getEmailByNumCompte($idAdmin);
var_dump($EmailAd);
var_dump($CompteManager->isAdmin($EmailAd));
 $Emailcl=$CompteManager->getEmailByNumCompte($idClient);
var_dump($Emailcl);
var_dump($CompteManager->isAdmin($Emailcl));

$CompteManager->suppressionCompte($idClient);
$CompteManager->suppressionCompte($idAdmin);





