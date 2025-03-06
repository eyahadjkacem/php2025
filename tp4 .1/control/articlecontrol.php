<?php
include("../model/Article.php");
include("../model/Fournisseur.php");
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
$art->insert() ;
echo"<table border=1>$art</table>";
}


/*
echo "<ul><li>reference:$ref</li><li>libelle:$lib</li> <li>prix:$prix</li><li>stock:$stock</li></ul>";

echo "</ul> </li>" ;
echo"<li>liste des fournisseur <ul>" ;
foreach($fr as $f){
    echo "<li> $f </li>" ;

}
echo "</ul> </li>" ;*/








?>