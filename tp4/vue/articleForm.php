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
        <input type="text"  name="ref" ><br><br>
        
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
        
        <button type="submit">Valider</button>
    </form>
   
        <table border=1>
            <tr><th>ref</th><th>lib</th><th>prix</th><th>quantite</th></tr>
        <?php 
           
            include_once ("../model/Article.php");
           $l=Article::getAll();
           foreach ($l as $f) {
            echo $f;

            # code...
           }
           
           
           ?>



            
       
        </table>
        <br><br>
          
        
</body>
</html>