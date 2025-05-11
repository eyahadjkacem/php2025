<?php
include("../model/User.php");
if (isset($_POST['login']) && isset($_POST['pass'])){
    $l=$_POST['login'];
    $p=$_POST['pass'];
    $u=new User($l,$p);
    if($u->connect())
        echo $u;
    else
        header("location:../vue/UserForm.html");
    
}
else
    echo "il faut passer par le formulaire";


?>