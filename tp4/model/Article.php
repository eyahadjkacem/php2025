<?php
 
class Article {
    private $reference;
    private $libelle;
    private $quatite;
    private $prix;
    private $fournisser;

    

    function __construct($reference, $libelle,$prix,$quatite,$fournisser) {
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
    public static function getAll() {
        include_once("Fournisseur.php");
        $bdd = connexpdo();
        $l = array();
    
        $req = "SELECT * FROM article";
        $sql = $bdd->query($req) or die($bdd->errorInfo()[2]); // Correction de erroInfo() en errorInfo()
    
        while ($row = $sql->fetch(PDO::FETCH_BOTH)) {
            $f = Fournisseur::getbyArticle($row[0]);
            $l[] = new Article($row[0], $row[1], $row[2], $row[3], $f);
        }
        return $l;
    }
    public static function insert($art){}
    public static function update($art){}
    public static function delete($art){}
















    }
    



?>