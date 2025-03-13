<?php
include_once ("../connexion.php");
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
   /* public static function getAll(){
        $bdd=connexpdo();
        $l=array();

  
        $req = "SELECT * FROM fournisseur";
        $sql=$bdd->query($req)or die($bdd->erroInfo()[2]);
   
        while($row=$sql->fetch(PDO::FETCH_BOTH)){
            $l[] = new Fournisseur($row[0], $row[1]);
        }
        return $l;}*/


    

  public static function getAll() {
        $cnx = connexpdo(); // Assure-toi que connexpdo() est bien défini
        $tab = array();
        $reqsql = "SELECT * FROM fournisseur";
        $lesresultat = $cnx->query($reqsql);
        
        while ($row = $lesresultat->fetch(PDO::FETCH_ASSOC)) {
            $tab[] = new Fournisseur($row['id'], $row['nom']);
        }
        
        return $tab; 
    }  

    public static function getfrbyrf($reff) {
        $tabfrart = array();
        $cnx = connexpdo();
        
        $rqtprep = $cnx->prepare("SELECT f.id, f.nom FROM `art-for` a JOIN fournisseur f ON a.id = f.id WHERE a.ref = :reff");
        $rqtprep->bindParam(":reff", $reff, PDO::PARAM_STR);
        $rqtprep->execute();
    
        
        $rqtprep->bindColumn("id", $id);
        $rqtprep->bindColumn("nom", $nom);


        while ($rqtprep->fetch(PDO::FETCH_BOUND)) {
            $f = new Fournisseur($id, $nom);
            $tabfrart[] = $f;
        }
    
        return $tabfrart;
        }


        
      /* $tousfour = Fournisseur::getAll();
    
        foreach ($res as $row) {
            foreach ($tousfour as $fr) {
                if ($fr->id == $row[0]) {
                    $f = new Fournisseur($row[0], $fr->nom);
                    $tabfrart[] = $f;
                }
            }
        }
    
        return $tabfrart; // Ajout du retour de la fonction*/
    }
    




?>