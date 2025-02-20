<?php
class Article {
    private $reference;
    private $libelle;
    private $quatite;
    private $prix;
    private $fournisser;

    

    function __construct($reference, $libelle,$quatite,$prix,$fournisser) {
    $this->reference=$reference;
    $this->libelle = $libelle;
    $this->quatite = $quatite;
    $this->prix = $prix;
    $this->fournisser = $fournisser;
    
    }
    public function __get($attr) {
    if (!isset($this->$attr)) return "erreur";
    else return ($this->$attr);}
    public function __set($attr,$value) {
    $this->$attr = $value; }
    public function __isset($attr) {
    return isset($this->$attr ); }
    public function __toString() {
     
       


       
/*$s="larticle est : ".$this->reference."/ ".$this->libelle;*/
    $s="<tr><td>".$this->libelle."</td><td>".$this->prix."</td><td>".$this->quatite."</td><td><select multiple>";
    foreach($this->fournisser as $f){
        $s.=$f;
         
    }
    $s.="</select></td></tr>";
  

    return $s; 
    }
    }

?>