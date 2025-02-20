<?php 
$erreurref="";
$erreurlib="";
$erreurprix="";
$erreurqt="";
$erreurfr="";
$fr=Array();
$pv=Array();



if (isset($_GET['ref'])&& isset($_GET['lib'])  && isset($_GET['prix'])&& isset($_GET['qt']))
{ 
    $ref=$_GET['ref'];
    $lib=$_GET['lib'];
   if (isset($_GET['pv'])) $pv=$_GET['pv'];

    $prix=$_GET['prix'];
    $qt=$_GET['qt'];
   if (isset($_GET['four'])) $fr = $_GET['four'];
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
        if(empty($fr)or !isset($fr)) $erreurfr="tu dois choisir un fournisseur";
        if(empty($pv)or !isset($pv)) $erreurpv="tu dois choisir un fournisseur";
        
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
        <input type="text"  name="ref" value="<?= $ref ?>"> <?="<span style='color:red;'>$erreurref</span>"?><br><br>
        
        <label for="libelle">Libellé :</label>
        <input type="text"  name="lib" value="<?= $lib ?>"> <?=$erreurlib  ?><br><br>
        
        <label >Fournisseur :</label>
        <select  name="four[]" multiple ><?=$erreurfr ?>
            <option value="f1" <?php if(in_array("f1",$fr)) echo("selected") ?>>Fournisseur 1</option>
            <option value="f2" <?php if(in_array("f2",$fr)) echo("selected") ?>>Fournisseur 2</option>
            <option value="f3"<?php if(in_array("f3",$fr)) echo("selected") ?>>Fournisseur 3</option>
        </select><br><br>
        
        
        <input type="checkbox"  name="pv[]" value="sfax"<?php if(in_array("sfax",$pv)) echo("checked") ?> >sfax  <?=$erreurpv  ?><br><br>
 
        <input type="checkbox"  name="pv[]" value="tunis" <?php if(in_array("tunis",$pv)) echo("checked") ?>>tunis    <br><br>
      
        <input type="checkbox"  name="pv[]" value="sousse"<?php if(in_array("sousse",$pv)) echo("checked") ?>>sousse<br><br>
        
        <label for="prix">Prix :</label>
        <input type="text"  name="prix" value="<?= $prix ?>"><?=$erreurprix  ?><br><br>
        
        <label for="stock">Qt en stock :</label>
        <input type="text"  name="qt" value="<?= $qt ?>" ><?=$erreurqt  ?><br><br>
        
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
            <option value="f1" selected>Fournisseur 1</option>
            <option value="f2">Fournisseur 2</option>
            <option value="f3">Fournisseur 3</option>
        </select><br><br>
        
        
        <input type="checkbox"  name="pv[]" value="sfax" checked>sfax<br><br>
 
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




