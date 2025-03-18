<?php
include_once("../connexion.php");

class Article {
    private $reference;
    private $libelle;
    private $quatite;
    private $prix;
    private $fournisser; // If you meant 'fournisseurs', fix spelling here

    function __construct($reference, $libelle, $quatite, $prix, $fournisser) {
        $this->reference = $reference;
        $this->libelle = $libelle;
        $this->quatite = $quatite;
        $this->prix = $prix;
        $this->fournisser = $fournisser;
    }

    public function __get($attr) {
        if (!isset($this->$attr)) return "erreur";
        else return ($this->$attr);
    }

    public function __set($attr, $value) {
        $this->$attr = $value;
    }

    public function __isset($attr) {
        return isset($this->$attr);
    }//recherche +cliquer sur fournisseur 

    public function __toString() {
        $s = "<tr><td>" . $this->libelle . "</td><td>" . $this->prix . "</td><td>" . $this->quatite . "</td><td><select multiple>";
        foreach ($this->fournisser as $f) {
            $s .= $f;
        }
        $s .= "</select></td>
        <td><a href='../control/articleControl.php?del=supprimer&ref=".$this->reference."'>Supprimer</a></td><td><a href='../vue/articleForm.php?ref=".$this->reference."'>Edit</a></td></tr>";
        return $s;
    }

    public static function getAll() {
        $a = array();
        $tabfr = array();
        $cnx = connexpdo();
        $rqprep = $cnx->prepare("SELECT * FROM article");
        $rqprep->execute();

        while ($row = $rqprep->fetch(PDO::FETCH_NUM)) {
            $tabfr = Fournisseur::getfrbyrf($row[0]);
            $a[] = new Article($row[0], $row[1], $row[2], $row[3], $tabfr);
        }

        return $a;
    }

    public static function insert($art) {
        $cnx = connexpdo();

        $rqtprep = $cnx->prepare("INSERT INTO article (ref, lib, prix, quantite) VALUES (?, ?, ?, ?)");
        $rqtprep->bindParam(1, $art->reference, PDO::PARAM_STR);
        $rqtprep->bindParam(2, $art->libelle, PDO::PARAM_STR);
        $rqtprep->bindParam(3, $art->prix, PDO::PARAM_INT);
        $rqtprep->bindParam(4, $art->quatite, PDO::PARAM_INT);

        $rqtprep->execute();
        $rqtprep2 = $cnx->prepare("INSERT INTO `art-for` (ref, id) VALUES (:ref, :id)");
        /* $rqtprep2 hors boucle car apres prepaation juste on change les paraametre n fois */
        $rqtprep2->bindParam(":ref", $reff, PDO::PARAM_STR);
        $rqtprep2->bindParam(":id", $idd, PDO::PARAM_INT);
        foreach ($art->fournisser as $f) {
            $reff=$art->reference;
            $idd=$f->id;
          
            $rqtprep2->execute();
        }

    }

    public static function update($ref, $lib, $prix, $quatite, $frs) {
        $cnx = connexpdo();
    

        $rqtsql = $cnx->prepare("UPDATE article SET lib = ?, prix = ?, quantite = ? WHERE ref = ?");
        $rqtsql->bindParam(1, $lib, PDO::PARAM_STR);
        $rqtsql->bindParam(2, $prix, PDO::PARAM_INT);
        $rqtsql->bindParam(3, $quatite, PDO::PARAM_INT);
        $rqtsql->bindParam(4, $ref, PDO::PARAM_STR);
        $rqtsql->execute();
    
        $rqtsql2 = $cnx->prepare("DELETE FROM `art-for` WHERE ref = ?");
        $rqtsql2->bindParam(1, $ref, PDO::PARAM_STR);
        $rqtsql2->execute();
    
        
        $rqtsql3 = $cnx->prepare("INSERT INTO `art-for` (ref, id) VALUES (:ref, :id)");
        $rqtsql3->bindParam(":ref", $ref, PDO::PARAM_STR);
        $rqtsql3->bindParam(":id", $id, PDO::PARAM_INT);
        foreach ($frs as $f) {
            $id = $f->id;
    
           
            $rqtsql3->execute();
        }
        
    }

    public static function delete($ref) {
        $cnx = connexpdo();
        $rqtsql = "DELETE FROM article WHERE ref = '" . $ref . "'";
        $cnx->exec($rqtsql);

        $rqtsql2 = "DELETE FROM `art-for` WHERE ref = '" . $ref . "'";
        $cnx->exec($rqtsql2);

      
    }
}
?>