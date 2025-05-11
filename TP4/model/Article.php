<?php
class Article{
    private $ref;
    private $lib;
    private $qt;
    private $prix;
    private $four;
    function __construct($ref, $lib,$qt,$prix,$four) {
            $this->ref=$ref;
            $this->lib = $lib;
            $this->qt = $qt;
            $this->prix = $prix;
            $this->four = $four;
  }	
    public function __get($attr) {
       if (!isset($this->$attr)) return "erreur";
          else return ($this->$attr);}
    public function __set($attr,$value) {
  $this->$attr = $value; }

    public function __toString() {
          $s="<tr><td>".$this->ref."</td><td>".$this->lib."</td><td>".$this->prix."</td><td>".$this->qt."</td><td><select multiple>";
          foreach($this->four as $f){
            $s.=$f;
        
          }
          $s.="</select></td><td><a href='../control/articleControl.php?refSupp=".$this->ref."'>Supprimer</a></td><td><a href='../vue/articleForm.php?ref=".$this->ref."&lib=".$this->lib."&qt=".$this->qt."&prix=".$this->prix;
          
          foreach ($this->four as $f){
            $s.="&".$f->id."=ok";
          } 
          $s.="'>Edit</a></td></tr>";
          return $s; 
      }
      public static function getAll(){
        $bdd=connexpdo();
        $l=array();
        $req="SELECT * FROM article" ;
        $sql = $bdd->query($req) or die($bdd->errorInfo()[2]);
        while($row=$sql->fetch(PDO::FETCH_BOTH)){
          $f=Fournisseur::getByArticle($row[0]);
          $l[]=new Article($row[0],$row[1],$row[2],$row[3],$f);
        }

        return $l;

      }

      public static function search($ref,$lib,$p1,$p2,$q1,$q2){
        $bdd=connexpdo();
        $l=array();
        $req="SELECT * FROM article where 1=1" ;
        if (!empty($ref))
          $req.=" and ref like '%$ref%'";
          if (!empty($lib))
          $req.=" and lib like'%$lib%'";
          if (!empty($p1))
          $req.=" and prix>$p1";
          if (!empty($p2))
          $req.=" and prix<$p2";
          if (!empty($q1))
          $req.=" and qt>$q1";
          if (!empty($q2))
          $req.=" and qt<$q2";
           
        $sql = $bdd->query($req) or die($bdd->errorInfo()[2]);
        while($row=$sql->fetch(PDO::FETCH_BOTH)){
          $f=Fournisseur::getByArticle($row[0]);
          $l[]=new Article($row[0],$row[1],$row[2],$row[3],$f);
        }

        return $l;

      }

      public static function insert($art){
        $bdd=connexpdo();
        try{
        $stmt=$bdd->prepare("INSERT INTO article VALUES(?,?,?,?)");
        $stmt->bindParam(1,$art->ref); 
        $stmt->bindParam(2,$art->lib);
        $stmt->bindParam(3,$art->prix);
        $stmt->bindParam(4,$art->qt);
        $stmt->execute();
        $stmt=$bdd->prepare("INSERT INTO article_fournisseur VALUES(?,?)");
        $stmt->bindParam(1,$ref); 
        $stmt->bindParam(2,$id);
        $ref=$art->ref;
        foreach ($art->four as $f){
          $id=$f->id;
          // insertion d'une ligne
          $stmt->execute();

        }
      }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
     
      }
        
      }
      public static function update($art){
        $bdd=connexpdo();
        //try{
        $stmt=$bdd->prepare("UPDATE article set lib=?,prix=?,qt=? where ref=?");
        $stmt->bindParam(4,$art->ref); 
        $stmt->bindParam(1,$art->lib);
        $stmt->bindParam(2,$art->prix);
        $stmt->bindParam(3,$art->qt);
        $stmt->execute();
        $stmt=$bdd->prepare("DELETE from article_fournisseur where article=?");
        $stmt->bindParam(1,$art->ref); 
        $stmt->execute();
        $stmt=$bdd->prepare("INSERT INTO article_fournisseur VALUES(?,?)");
        $stmt->bindParam(1,$ref); 
        $stmt->bindParam(2,$id);
        $ref=$art->ref;
        foreach ($art->four as $f){
          $id=$f->id;
          // insertion d'une ligne
          $stmt->execute();

        }
      //}catch(Exception $e){
      //  echo 'Caught exception: ',  $e->getMessage(), "\n";}
      }
      public static function delete($ref){
        $bdd=connexpdo();
        $stmt=$bdd->prepare("DELETE from article_fournisseur where article=?");
        $stmt->bindParam(1,$ref); 
        $stmt->execute();
        $stmt=$bdd->prepare("DELETE from article where ref=?");
        $stmt->bindParam(1,$ref); 
        $stmt->execute();

      }

}
?>