<?php
include("../model/Article.php");
include("../model/Fournisseur.php");
if(isset($_GET['add'])){
    if(isset($_GET['ref']) && isset($_GET['lib'])&& isset($_GET['prix'])&& isset($_GET['qt'])
&& isset($_GET['four'])){
$ref=$_GET['ref'];
$lib=$_GET['lib'];
$prix=$_GET['prix'];
$stock=$_GET['qt'];
$fr=$_GET['four'];
$listfr=Array();
foreach($fr as $f){
    $fournisseur=new Fournisseur($f,"");
    $listfr[]=$fournisseur;

}

$art=new Article($ref,$lib,$stock,$prix,$listfr);
Article::insert($art) ;

                                        

//echo"<table border=1>$art</table>";
}
}
else if(isset($_GET['up'])){
    if(isset($_GET['ref']) && isset($_GET['lib'])&& isset($_GET['prix'])&& isset($_GET['qt'])
    && isset($_GET['four'])){
    $ref=$_GET['ref'];
    $lib=$_GET['lib'];
    $prix=$_GET['prix'];
    $stock=$_GET['qt'];
    $fr=$_GET['four'];
    $listfr=Array();
    foreach($fr as $f){
        $fournisseur=new Fournisseur($f,"");
        $listfr[]=$fournisseur;
    
    }
    
    
    Article::update($ref,$lib,$stock,$prix,$listfr); }

}else if(isset($_GET['del'])){
    if(isset($_GET['ref'])){
        Article::delete($_GET['ref']);

    }
    
}













header("location:../vue/articleForm.php");



/*
echo "<ul><li>reference:$ref</li><li>libelle:$lib</li> <li>prix:$prix</li><li>stock:$stock</li></ul>";

echo "</ul> </li>" ;
echo"<li>liste des fournisseur <ul>" ;
foreach($fr as $f){
    echo "<li> $f </li>" ;

}
echo "</ul> </li>" ;*/








?>