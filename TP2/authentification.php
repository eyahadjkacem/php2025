<?php
if(isset($_POST ['login']) && isset($_POST['password']))
$l=$_POST['login'];
$p=$_POST['password'];
if($l=="admin" && $p=="admin")
{
    echo("vous êtes connecté");
}else{
    header("location:authentification.html");
}

?>