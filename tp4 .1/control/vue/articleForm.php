<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <h2>Formulaire d'Article</h2>
    <form action="../control/articlecontrol.php" method="get">
        <label >Référence :</label>
        <input type="text"  name="ref" value=<?php if(isset($_GET['ref'])) echo $_GET['ref']; ?>><br>
        
        <label for="libelle">Libellé :</label>
        <input type="text"  name="lib" value=<?php if(isset($_GET['lib'])) echo $_GET['lib']; ?>><br><br>
        
        <label >Fournisseur :</label>
        <select  name="four[]" multiple >
           <?php 
            include_once ("../model/Fournisseur.php");
        
      
           foreach ($l as $f) {
            echo "<option value".$f->id;
            if(isset($_GET[$f->id]) )echo " selected";
            echo ">".$f->nom."<option>";


            # code...
           }
           
           
           ?>



            
        </select><br><br>
        
        
        
        <label for="prix">Prix :</label>
        <input type="text"  name="prix" value=<?php if(isset($_GET['prix'])) echo $_GET['prix']; ?>><br><br>
        
        <label for="stock">Qt en stock :</label>
        <input type="text"  name="qt" value=<?php if(isset($_GET['qt'])) echo $_GET['qt']; ?> ><br><br>
        
        <button type="submit" >Valider</button>
           <table border=1>
           <tr><th>libelle</th><th>quantite</th><th>prix</th><th>fournissers</th></tr>
            <?php
              include_once ("../model/Article.php");
            
              foreach ($tabart as $art ) {
                echo $art;

        
              }



              



            ?>
         

           </table>
 
           <button type="submit" name="add">ajouter</button>
        <button type="submit" name="up" >modifier</button>
        <button type="submit" name="del">supprime</button>

   
    
</form>
<form action="../control/articlecontrol.php">
<h4>Filtrer</h4>

<label>Référence :</label>
<input type="text" name="ref2" value=<?php if(isset($_GET['ref2']) )   echo $_GET['ref2'] ; ?>><br><br>

<label for="libelle">Libellé :</label>
<input type="text" name="lib2"><br><br>

<label for="prixmax">Prix max :</label>
<input type="text" name="prixmax"><br><br>

<label for="prixmin">Prix min :</label>
<input type="text" name="prixmin"><br><br>

<button type="submit" name="ch">Chercher</button>

</form>

</body>
</html>
       
           
          













