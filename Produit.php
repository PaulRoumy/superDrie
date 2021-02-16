<?php 

class Produit {
    public $NumProduit;
    public $NomPRoduit;
    public $Prix;
    public $Stock;
    public $NumCategorie;
    

    public function hydrate(array $datas) {
        foreach($datas as $key => $value) {
            if (property_exists('Produit', $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>