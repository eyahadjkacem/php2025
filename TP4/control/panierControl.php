<?php
session_start();
include("../model/Panier.php");
echo "hello";
if(isset($_GET['ref']) && isset($_GET['qt'])){
    $ref=$_GET['ref'];
    $qt=$_GET['qt'];
    if(Article::verifQt($ref,$qt)){
    if(isset($_SESSION['panier']))
        $p=unserialize($_SESSION['panier']);
    else{
        $p=new Panier();
        
    }

$p->addPanier($ref,$qt);
$_SESSION['panier']=serialize($p);

include("../vue/panierView.php");
    }
    else 
    echo "Qt non disponible";
}


?>