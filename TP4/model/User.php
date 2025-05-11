<?php
include("../connexion.php");
class User {
      private $login;
      private $pass;
      function __construct($login, $pass) {
              $this->login=$login;
              $this->pass = $pass;
    }	
      public function __get($attr) {
         if (!isset($this->$attr)) return "erreur";
            else return ($this->$attr);}
      public function __set($attr,$value) {
	$this->$attr = $value; }

      public function __toString() {
            $s="</h1>Vous etes connecté: ".$this->login."</h1>";
            return $s; 
        }

        public function connect(){
            $bdd=connexpdo();
            $req="SELECT * FROM user WHERE login = '".$this->login."' and pass='".$this->pass."'" ;
            echo $req;
            $sql = $bdd->query($req) or die($bdd->errorInfo()[2]);
            if($sql->rowCount()==1)
                return true;
            else
                return false;

       
}
}

?>
