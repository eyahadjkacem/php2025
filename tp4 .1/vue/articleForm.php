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
        <input type="text"  name="lib" ><br><br>
        
        <label >Fournisseur :</label>
        <select  name="four[]" multiple >
           <?php 
            include_once ("../model/Fournisseur.php");
        
           $l=Fournisseur::getAll();
           foreach ($l as $f) {
            echo $f;

            # code...
           }
           
           
           ?>



            
        </select><br><br>
        
        
        
        <label for="prix">Prix :</label>
        <input type="text"  name="prix" ><br><br>
        
        <label for="stock">Qt en stock :</label>
        <input type="text"  name="qt" ><br><br>
        
        <button type="submit" name="add">ajouter</button>
        <button type="submit" name="up" >modifier</button>
        <button type="submit" name="del">supprime</button>
           <table border=1>
           <tr><th>libelle</th><th>quantite</th><th>prix</th><th>fournissers</th></tr>
            <?php
              include_once ("../model/Article.php");
              $tabart=Article::getAll();
              foreach ($tabart as $art ) {
                echo $art;

        
              }



              



            ?>
         

           </table>


    </form>
</body>
</html>