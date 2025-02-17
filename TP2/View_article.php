<?php 
$erreurref="";
$erreurlib="";
$erreurprix="";
$erreurqt="";



if (isset($_GET['ref'])&& isset($_GET['lib'])&& isset($_GET['pv'])&& isset($_GET['four'])&& isset($_GET['prix'])&& isset($_GET['qt']))
{ 
    $ref=$_GET['ref'];
    $lib=$_GET['lib'];
    $pv=$_GET['pv'];
    $prix=$_GET['prix'];
    $qt=$_GET['qt'];
    $fr = $_GET['four'];
    if(!empty($ref)&&!empty($lib)&&!empty($pv)&&!empty($prix)&&!empty($qt)&& !empty($fr))
    {
        echo"<ul>
                <li>$ref</li>
                <li>$lib</li>
                <li>$prix</li>
                <li>$qt</li>
                <li>les points de ventes
                    <ul>";
        foreach ($pv as $elem) {
           echo"<li>$elem</li>";
        }
        echo"             </ul>
                                 </li>
               <li>les fournisseurs<ul>";
        foreach ($fr as $ele) {
            echo"<li>$ele</li>";
         }
         echo"</ul></li>
                                   </ul>";

         
    }
    else {
        if(empty($ref)) $erreurref="reference ne doit pas etre vide";
        if(empty($lib)) $erreurlib="libelle ne doit pas etre vide";
        if(empty($prix)) $erreurprix="prix ne doit pas etre vide";
        if(empty($qt)) $erreurqt="qutantite ne doit pas etre vide";
        
        ?>
        <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <h2>Formulaire d'Article</h2>
    <form method="GET">
        <label >Référence :</label>
        <input type="text"  name="ref" > <?="<span style='color:red;'>$erreurref</span>"?><br><br>
        
        <label for="libelle">Libellé :</label>
        <input type="text"  name="lib" > <?=$erreurlib  ?><br><br>
        
        <label >Fournisseur :</label>
        <select  name="four[]" multiple >
            <option value="f1">Fournisseur 1</option>
            <option value="f2">Fournisseur 2</option>
            <option value="f3">Fournisseur 3</option>
        </select><br><br>
        
        
        <input type="checkbox"  name="pv[]" value="sfax">sfax  <br><br>
 
        <input type="checkbox"  name="pv[]" value="tunis">sousse    <br><br>
      
        <input type="checkbox"  name="pv[]" value="sousse">tunis<br><br>
        
        <label for="prix">Prix :</label>
        <input type="text"  name="prix" ><?=$erreurprix  ?><br><br>
        
        <label for="stock">Qt en stock :</label>
        <input type="text"  name="qt" ><?=$erreurqt  ?><br><br>
        
        <button type="submit">Valider</button>
    </form>
</body>
</html>



    <?php }





}
else{?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <h2>Formulaire d'Article</h2>
    <form method="GET">
        <label >Référence :</label>
        <input type="text"  name="ref" ><br><br>
        
        <label for="libelle">Libellé :</label>
        <input type="text"  name="lib" ><br><br>
        
        <label >Fournisseur :</label>
        <select  name="four[]" multiple >
            <option value="f1">Fournisseur 1</option>
            <option value="f2">Fournisseur 2</option>
            <option value="f3">Fournisseur 3</option>
        </select><br><br>
        
        
        <input type="checkbox"  name="pv[]" value="sfax">sfax<br><br>
 
        <input type="checkbox"  name="pv[]" value="tunis">sousse<br><br>
      
        <input type="checkbox"  name="pv[]" value="sousse">tunis<br><br>
        
        <label for="prix">Prix :</label>
        <input type="text"  name="prix" ><br><br>
        
        <label for="stock">Qt en stock :</label>
        <input type="text"  name="qt" ><br><br>
        
        <button type="submit">Valider</button>
    </form>
</body>
</html>

   
<?php
}?>




