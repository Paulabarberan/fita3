<?php
class Tasca {
    public $id;
    public $titol;
    public $descripcio;
    public $dataVenciment;
    public $prioritat;
    public $estat;

    public function __construct($id, $titol, $descripcio, $dataVenciment, $prioritat, $estat) {
        $this->id = $id;
        $this->titol = $titol;
        $this->descripcio = $descripcio;
        $this->dataVenciment = $dataVenciment;
        $this->prioritat = $prioritat;
        $this->estat = $estat;
    }
}
?>
