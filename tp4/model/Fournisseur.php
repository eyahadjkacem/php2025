<?php
include("../connexion.php");
class Fournisseur {
    private $nom;
    private $id;
    function __construct($id, $nom) {
    $this->id=$id;
    $this->nom = $nom;
    }
    public function __get($attr) {
    if (!isset($this->$attr)) return "erreur";
    else return ($this->$attr);}
    
    public function __set($attr,$value) {
    $this->$attr = $value; }
    
    public function __isset($attr) {
    return isset($this->$attr ); }
    
    public function __toString() {
    $s="<option value= ".$this->id.">".$this->nom."</option>";
    return $s; 
    }
    public static function getAll(){
        $bdd=connexpdo();
        $l=array();

  
        $req = "SELECT * FROM fournisseur";
        $sql=$bdd->query($req)or die($bdd->erroInfo()[2]);
   
        while($row=$sql->fetch(PDO::FETCH_BOTH)){
            $l[] = new Fournisseur($row[0], $row[1]);
        }
        return $l;

    }
    public static function getbyArticle($ref){
        $bdd=connexpdo();
        $l=array();

  
        $req = "SELECT * FROM fournisseur,art-four where fournisseur.id=art-four.id and art-four.ref=:ref";
       /* $sql=$bdd->query($req)or die($bdd->erroInfo()[2]);*/
       $reqprep = $bdd->prepare($req); 
       //*****Liaison des paramètres
     $reqprep–>bindParam(':ref',$ref,PDO::PARAM_STR); 
     $reqprep–>execute();
      $reqprep–>bindColumn(':id',$id); 
      $reqprep–>bindColumn(':nom',$nom);
       
   
        while($result=$reqprep->fetch(PDO::FETCH_BOUND)){
            $l[] = new Fournisseur($id, $nom);
        }
        return $l;

    }













}



?>