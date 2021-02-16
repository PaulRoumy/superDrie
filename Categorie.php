<?php 

class Categorie {
    public $NumCategorie;
    public $NomCategorie;
    

    public function hydrate(array $datas) {
        foreach($datas as $key => $value) {
            if (property_exists('Categorie', $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>