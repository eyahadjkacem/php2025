
<?php
include("../connexion.php");
class Fournisseur{
    private $id;
    private $nom;
    function __construct($id, $nom) {
            $this->id=$id;
            $this->nom = $nom;
  }	
    public function __get($attr) {
       if (!isset($this->$attr)) return "erreur";
          else return ($this->$attr);}
    public function __set($attr,$value) {
  $this->$attr = $value; }

    public function __toString() {
          $s="<option value=".$this->id.">".$this->nom."</option>";
          return $s; 
      }
      public static function getAll(){
        $bdd=connexpdo();
        $l=array();
        $req="SELECT * FROM fournisseur" ;
        $sql = $bdd->query($req) or die($bdd->errorInfo()[2]);
        while($row=$sql->fetch(PDO::FETCH_BOTH)){
          $l[]=new Fournisseur($row[0],$row[1]);
        }

        return $l;

      }
      public static function getByArticle($ref){
        $bdd=connexpdo();
        $l=array();
        $req="SELECT * FROM fournisseur, article_fournisseur where fournisseur.id=article_fournisseur.fournisseur and article_fournisseur.article=:ref" ;

        $reqPrep=$bdd->prepare($req); 
        //*****Liaison des paramètres
        $reqPrep->bindParam(':ref',$ref,PDO::PARAM_STR); 
        $reqPrep->execute(); 
        //*****Liaison des résultats à des variables
        $reqPrep->bindColumn('id', $id); 
        $reqPrep->bindColumn('nom', $nom); 
        //*****Affichage
        while($result=$reqPrep->fetch(PDO::FETCH_BOUND))  {
          $l[]=new Fournisseur($id,$nom);
        }
  

        return $l;

      }
      
}

?>