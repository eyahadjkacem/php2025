<?php

session_start();
//if (!isset($_COOKIE['login']))
if(!isset($_SESSION['login']))
    header("location:../vue/UserForm.html");

include("../model/Article.php");
include("../model/Fournisseur.php");
$artList=Article::getAll();
$fournisseur=Fournisseur::getAll();
if(isset($_GET['add'])){
if (isset($_GET['ref']) && isset($_GET['lib'])&& isset($_GET['prix'])&& isset($_GET['qt'])&& isset($_GET['four'])){
    $ref=$_GET['ref'];
    $lib=$_GET['lib'];
    $qt=$_GET['qt'];
    $four=$_GET['four'];
    $prix=$_GET['prix'];
    $listFour=Array();
    foreach($four as $f){
        echo $f;
        $fou=new Fournisseur($f,"");
        $listFour[]=$fou;
    }

    $art=new Article($ref,$lib,$qt,$prix,$listFour);
    Article::insert($art);
    $artList=Article::getAll();

    //echo "<table border=1><tr><th>Ref</th><th>Libelle</th><th>Prix</th><th>Quantité</th><th>Fournisseurs</th></tr>";
    //echo "$art </table>";
}
}
else if(isset($_GET['up'])){

    if (isset($_GET['ref']) && isset($_GET['lib'])&& isset($_GET['prix'])&& isset($_GET['qt'])&& isset($_GET['four'])){
        $ref=$_GET['ref'];
        $lib=$_GET['lib'];
        $qt=$_GET['qt'];
        $four=$_GET['four'];
        $prix=$_GET['prix'];
        $listFour=Array();
        foreach($four as $f){
            echo $f;
            $fournisseur=new Fournisseur($f,"");
            $listFour[]=$fournisseur;
        }
    
        $art=new Article($ref,$lib,$qt,$prix,$listFour);
        Article::update($art);
        $artList=Article::getAll();

}
}else if(isset($_GET['refSupp'])){
    Article::delete($_GET["refSupp"]);
    $artList=Article::getAll();

}else if(isset($_GET['del']) ){
    Article::delete($_GET["ref"]);
    $artList=Article::getAll();

}
else if(isset($_GET['search']) ){
    $artList=Article::search($_GET["ref"],$_GET["lib"],$_GET["p1"],$_GET["p2"],$_GET["q1"],$_GET["q2"]);

}

   

include("../vue/articleForm.php");


//header("location:../vue/articleForm.php");






?>