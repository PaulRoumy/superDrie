<?php 

try {
    $db = new PDO('mysql:host=192.168.56.103;port=3306;dbname=minishop', 'root', 'rootpwd');
}
catch (Exception $e) {
    die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}

?>
