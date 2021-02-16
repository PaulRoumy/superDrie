<?php 

class Compte {
    public $NumCompte;
    public $Nom;
    public $Email;
    public $MotDePasse;
    public $NumRole;
    

    public function hydrate(array $datas) {
        foreach($datas as $key => $value) {
            if (property_exists('Compte', $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>