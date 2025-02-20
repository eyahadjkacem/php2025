<?php class User {
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

public function __isset($attr) {
return isset($this->$attr ); }

public function __toString() {
$s="vous ete connecte: ".$this->login;
return $s; 
}
public function connect(){
    if($this->login=="admin" && $this->pass=="admin")
    {
        return true;
    }else{
       // header("location:authentification.html");
       return false;
    }
    
   

}



}?>