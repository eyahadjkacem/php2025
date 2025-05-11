<?php
include ("../model/User.php");
if(isset($_POST ['login']) && isset($_POST['password'])){
$l=$_POST['login'];
$p=$_POST['password'];
$us=new User($l,$p);
if($us->connect()){
      echo " $us";
} 
 


else {
    header("location:../vue/UserForm.html");
}
}



      




?>