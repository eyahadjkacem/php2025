<?php
if(isset($_POST ['login']) && isset($_POST['password']))
$l=$_POST['login'];
$p=$_POST['password'];
//lena contoller yesnaa user w inedi el connect lel  bd 
/*if($l=="admin" && $p=="admin")
{
    echo("vous êtes connecté");
}*/
else{
    header("location:authentification.html");
}

?>