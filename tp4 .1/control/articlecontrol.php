<?php
include("../model/Article.php");
include("../model/Fournisseur.php");
$tabart=Article::getAll();
$l=Fournisseur::getAll();
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
        Article::delete($_GET['ref']);}
else if(isset ($_GET['refsuplien']))   
   {Article::delete($_GET['ref']);
          } 
}else if (isset($_GET['ch']) && isset($_GET['ref2'])) {
    $tabart = Article::getprodlikeref($_GET['ref2']);
    
       
    }
  





 
include_once("../vue/articleForm.php");

//header("location:../vue/articleForm.php");?>   
