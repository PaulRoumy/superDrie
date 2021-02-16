<?php 

class Role {
    public $NumRole;
    public $NomRole;
    

    public function hydrate(array $datas) {
        foreach($datas as $key => $value) {
            if (property_exists('Role', $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>