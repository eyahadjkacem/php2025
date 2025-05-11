<?php

class Panier{
    private $tab;
    private $nb;
    function __construct() {
            $this->tab= Array();

  }	
    public function __get($attr) {
       if (!isset($this->$attr)) return "erreur";
          else return ($this->$attr);}
    public function __set($attr,$value) {
  $this->$attr = $value; }

    public function __toString() {
        $s="<table border=1><tr><th>Reference</th><th>Quantité</th></tr>";
        foreach ($this->tab as $ref=>$qt)
          $s.="<tr><td>".$ref."</td><td>".$qt."</td></tr>";
        $s.="</table>";
        return $s;
    }
public function addPanier($art,$q){
    if(isset($this->tab[$art])){
        $this->tab[$art]+=$q;
    }else
        $this->tab[$art]=$q;
}
public function calculPrix(){
    $tot=0;
    foreach ($this->tab as $ref=>$qt){
        $p=Article::getPrice($ref);
        $tot+=$p*$qt;
    }
    return $tot;
}

}