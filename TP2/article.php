<?php
if(isset($_GET['ref']) && isset($_GET['lib'])&& isset($_GET['prix'])&& isset($_GET['stock'])&& isset($_GET['pv'])&& isset($_GET['four'])){
$ref=$_GET['ref'];
$lib=$_GET['lib'];
$prix=$_GET['prix'];
$stock=$_GET['stock'];
$pv=$_GET['pv'];
$fr=$_GET['four'];

echo "<ul><li>reference:$ref</li><li>libelle:$lib</li> <li>prix:$prix</li><li>stock:$stock</li></ul>";
echo"<li>liste de point de vente<ul>" ;
foreach($pv as $p){
    echo "<li> $p </li>" ;

}
echo "</ul> </li>" ;
echo"<li>liste des fournisseur <ul>" ;
foreach($fr as $f){
    echo "<li> $f </li>" ;

}
echo "</ul> </li>" ;

}






?>