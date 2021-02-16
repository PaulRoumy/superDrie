<?php
	class ProduitManager{
		private $_db;
		function __construct($db){
			$this->setDb($db);
		}

		function setDb(PDO $db){
			$this->_db =$db;
		}

		public function getAll() {
        	$query = $this->_db->prepare('SELECT * FROM Produit');
        	$produit= array();

        	$query->execute(); // la requete est executee

        	while($data = $query->fetch()){
            	$produit = new Produit();
            	$produit->hydrate($data);
           	
            	$produits[] = $produit;
        	}
        	//echo 'toto';
        	return $produits;
    	}

    	 public function getByNumProduit($numProduit) {
        $query = $this->_db->prepare('SELECT * FROM Produit WHERE numProduit = :numProduit');
        $query->bindValue(':numProduit', $numProduit); // on remplace :email par le contenu de $email
        $query->execute(); // la requete est executee
        $data = $query->fetch();
        if ($data === false) { return false; }
        $produit = new Produit();
        $produit->hydrate($data);
        return $produit;
    }

    	public function add($NomProduit,$Prix,$NumCategorie,$Stock) {

        $query = $this->_db->prepare('INSERT INTO Produit (NomProduit,Prix,NumCategorie,Stock) VALUES ( ?,?,?,?)');
       
        $query->execute([
            $NomProduit,$Prix,$NumCategorie,$Stock
        ]); // la requete est executee
        
        $numProduit = $this->_db->lastInsertId();
        //echo "tata";
        return $numProduit;
    }

     public function supressionProduit($Id){
            $query = $this->_db->prepare('DELETE FROM Produit WHERE NumProduit = :id');
            $query->bindValue(':id' ,$Id);
            $query->execute();
            echo "Produit supprimé";
        }

        public function modifyName($NewName,$NumProduit){
            $query = $this->_db->prepare('UPDATE Produit SET NomProduit =:newname WHERE NumProduit =:numproduit');
            $query->bindValue(':newname',$NewName);
            $query->bindValue(':numproduit',$NumProduit);
            $query->execute();
            echo "Name as change";
        }

        public function modifyPrix($NewPrix,$NumProduit){
            $query = $this->_db->prepare('UPDATE Produit SET Prix=:newprix WHERE NumProduit =:numproduit');
            $query->bindValue(':newprix',$newprix);
            $query->bindValue(':numproduit',$NumProduit);
            $query->execute();
            echo "Prix as change ";
        }
        public function modifyProduit($NumProduit,$Nom,$Prix,$Stock,$NumCategorie){
            $query = $this->_db->prepare('UPDATE Produit SET Prix=:prix , NomPRoduit=:nom ,NumCategorie= :NumCategorie, Stock=:stock WHERE NumProduit =:numproduit');
            $query->bindValue(':prix',$Prix);
            $query->bindValue(':numproduit',$NumProduit);
            $query->bindValue(':nom',$Nom);
            $query->bindValue(':stock',$Stock);
            $query->bindValue(':NumCategorie',$NumCategorie);
            $query->execute();
            echo "Compte has changed ";
        }

        
	}
?>