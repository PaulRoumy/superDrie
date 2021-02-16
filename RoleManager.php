<?php 

class RoleManager {

    private $_db;

    function __construct($db) {
        $this->setDb($db);
    }

    function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function getAll() {
        $query = $this->_db->prepare('SELECT * FROM Role');
        $roles = array();

        $query->execute(); // la requete est executee

        while($data = $query->fetch()){
            $role = new Role();
            $role->hydrate($data);
           
            $roles[] = $role;
        }
        echo 'toto';
        return $roles;
    }

    public function getByNumRole($NumRole) {
        $query = $this->_db->prepare('SELECT * FROM Role WHERE NumRole = :NumRole');
        $query->bindValue(':NumRole', $NumRole); // on remplace :email par le contenu de $email
        $query->execute(); // la requete est executee
        $data = $query->fetch();
        if ($data === false) { return false; }
        $role = new Role();
        $role->hydrate($data);
        return $role;
    }

    public function add($NomRole) {

        $query = $this->_db->prepare('INSERT INTO Role (nomRole) VALUES ( ?)');
       
        $query->execute([
            $NomRole
        ]); // la requete est executee
        
        $numRole = $this->_db->lastInsertId();
        return $numRole;
    }

    public function supressionCategorie($Name){
        $query = $this->_db->prepare('DELETE FROM Role WHERE NomRole = :name ');
        $query->bindValue(':name' ,$Name);
        $query->execute();
        echo "Role supprimé";
        }

    public function modifyName($NewName,$NumRole){
        $query = $this->_db->prepare('UPDATE Role SET NomRole =:newname WHERE NumRole =:numrole');
        $query->bindValue(':newname',$NewName);
        $query->bindValue(':numrole',$NumRole);
        $query->execute();
        echo "Role's name as change";
        }
    public function getNumRoleByName($Name){
        $query =$this->_db->prepare('SELECT NumRole FROM Role WHERE NomRole = :namerole');
        $query->bindValue(':namerole',$Name);
        $query->execute();
        $data = $query-> fetch();
        $numRole = $data[0];
        return $numRole;

        }
}     

?>