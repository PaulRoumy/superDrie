<?php
	class CompteManager{
		private $_db;
		function __construct($db,$RoleManager){
			$this->setDb($db);
            $this->RoleManager= $RoleManager;
		}

		function setDb(PDO $db){
			$this->_db =$db;
		}

		public function getAll() {
        	$query = $this->_db->prepare('SELECT * FROM Compte');
        	$comptes= array();

        	$query->execute(); // la requete est executee

        	while($data = $query->fetch()){
            	$compte = new Compte();
            	$compte->hydrate($data);
           	
            	$comptes[] = $compte;
        	}
        	//echo 'toto';
        	return $comptes;
    	}

    	 public function getByNumCompte($numCompte) {
            $query = $this->_db->prepare('SELECT * FROM Compte WHERE numCompte = :numCompte');
            $query->bindValue(':numCompte', $numCompte); // on remplace :email par le contenu de $email
            $query->execute(); // la requete est executee
            $data = $query->fetch();
            if ($data === false) { return false; }
            $compte = new Compte();
            $compte->hydrate($data);
            return $compte;
        }

    	public function add($Nom,$Email,$MotDePasse,$numRole) {
            $MotDePasse = hash('sha256', $MotDePasse);
            $query = $this->_db->prepare('INSERT INTO Compte (Nom,Email,MotDePasse,NumRole) VALUES ( ?,?,?,?)');
            $query->execute([
            $Nom,$Email,$MotDePasse,$numRole
            ]); // la requete est executee
        
            $numCompte = $this->_db->lastInsertId();
            echo "oui";
            return $numCompte;
        }


        public function validCnx($Email, $mdp){
            $hashmdp = hash('sha256', $mdp);
            $query = $this->_db->prepare('SELECT count(1)  as valid FROM Compte WHERE Email = :email and MotDePasse = :mdp');
            $query->bindValue(':email',$Email);
            $query->bindValue(':mdp',$hashmdp);
            $query->execute();
            $data =$query->fetch();

        
            return $data['valid'];

        }

        public function getNameByEmail($Email){
            $query = $this->_db->prepare('SELECT Nom FROM Compte WHERE Email = :email');
            $query->bindValue(':email',$Email);
            $query->execute();
            $data = $query->fetch();
           
            $name = $data["Nom"];
            
            return $name;
        }

        public function suppressionCompte($NumCompte){
            $query = $this->_db->prepare('DELETE FROM Compte WHERE NumCompte = :numcompte');
            $query->bindValue(':numcompte',$NumCompte);
            $query->execute();
            echo "Compte supprimé";
        }

        public function modifyName($NewName,$Email){
            $query = $this->_db->prepare('UPDATE Compte SET Nom =:newname WHERE Email =:email');
            $query->bindValue(':newname',$NewName);
            $query->bindValue(':email',$Email);
            $query->execute();
            echo "Name as change";
        }


         public function modifyCompte($NumCompte,$Nom,$Password,$Email,$role){
            $hashNewPasseword =hash('sha256', $Password);
            $query = $this->_db->prepare('UPDATE Compte SET MotDePasse=:newpasseword , Nom=:nom ,NumRole= :role, Email=:email WHERE NumCompte =:NumCompte');
            $query->bindValue(':newpasseword',$hashNewPasseword);
            $query->bindValue(':email',$Email);
            $query->bindValue(':nom',$Nom);
            $query->bindValue(':role',$role);
            $query->bindValue(':NumCompte',$NumCompte);
            $query->execute();
            echo "Compte has changed ";
        }




        public function modifyPasseword($NewPasseword,$Email){
            $hashNewPasseword =hash('sha256', $NewPasseword);
            $query = $this->_db->prepare('UPDATE Compte SET MotDePasse=:newpasseword WHERE Email =:email');
            $query->bindValue(':newpasseword',$hashNewPasseword);
            $query->bindValue(':email',$Email);
            $query->execute();
            echo "Passeword as change ";
        }

        public function modifyRole($NameRole,$Email){
            $query =$this->_db->prepare('UPDATE Compte SET NumRole =(SELECT NumRole FROM Role WHERE NomRole =:namerole) WHERE Email =:email');
            $query->bindValue(':namerole',$NameRole);
            $query->bindValue('email',$Email);
            $query->execute();
            echo "Role as change";
        }

        public function getNumCompte($Email){
            $query =$this->_db->prepare('SELECT numCompte FROM Compte WHERE Email = :email');
            $query->bindValue(':email',$Email);
            $query->execute();
            $data = $query->fetch();
            $numCompte = $data[0];
            return $numCompte;
        }


        public function getNumRole($Email){
            $numCompte= $this->getNumCompte($Email);
            $query =$this->_db->prepare('SELECT NumRole FROM Compte WHERE NumCompte = :numcompte and Email = :email');
            $query->bindValue(':numcompte', $numCompte);
            $query->bindValue(':email',$Email);
            $query->execute();
            $data = $query->fetch();
            $numRole = $data[0];
            return $numRole;
        }

        public function isAdmin($Email){
            $isAdmin = false;

            $numRoleAdmin= $this->RoleManager->getNumRoleByName('Administrateur');

            $numRoleCompte = $this->getNumRole($Email);

            if ($numRoleAdmin == $numRoleCompte) {

                $isAdmin = true;
            }

            return $isAdmin;
        }
        public function getEmailByNumCompte($NumCompte){
            $query = $this->_db->prepare('SELECT Email FROM Compte WHERE NumCompte = :numcompte');
            $query->bindValue(':numcompte',$NumCompte);
            $query->execute();
            $data = $query->fetch();
            return $data[0];
        }
	}
?>