<?php
	class CategorieManager{
		private $_db;
		function __construct($db){
			$this->setDb($db); 
		}

		function setDb(PDO $db){
			$this->_db =$db;
		}

		public function getAll() {
        	$query = $this->_db->prepare('SELECT * FROM Categorie');
            
        	$categories= array();

        	$query->execute(); // la requete est executee

        	while ($data = $query->fetch()){
            	$categorie = new Categorie();
            	$categorie->hydrate($data);
           	
            	$categories[] = $categorie;
        	}
        	
        	return $categories;
    	}



    	 public function getByNumCategorie($NumCategorie) {
        $query = $this->_db->prepare('SELECT * FROM Categorie WHERE NumCategorie = :NumCategorie');
        $query->bindValue(':NumCategorie', $NumCategorie); // on remplace :email par le contenu de $email
        $query->execute(); // la requete est executee
        $data = $query->fetch();
        if ($data === false) { return false; }
        $categorie = new Categorie();
        $categorie->hydrate($data);
        return $categorie;
    } 


    	public function add($NomCategorie) {

        $query = $this->_db->prepare('INSERT INTO Categorie (NomCategorie) VALUES ( ?)');
       
        $query->execute([
            $NomCategorie
        ]); // la requete est executee
        
        $NumCategorie = $this->_db->lastInsertId();
        return $NumCategorie;
    }
    public function supressionCategorie($Num){
            $query = $this->_db->prepare('DELETE FROM Categorie WHERE NumCategorie = :num ');
            $query->bindValue(':num' ,$Num);
            $query->execute();
            echo "Categorie supprimé";
        }

        public function modifyName($NumCategorie,$NewName){
            $query = $this->_db->prepare('UPDATE Categorie SET NomCategorie =:newname WHERE NumCategorie =:numcategorie');
            $query->bindValue(':newname',$NewName);
            $query->bindValue(':numcategorie',$NumCategorie);
            $query->execute();
            echo "Categorie's name as change";
        }

        

}
?>