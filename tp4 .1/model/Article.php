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
    }

    public function __toString() {
        $s = "<tr><td>" . $this->libelle . "</td><td>" . $this->prix . "</td><td>" . $this->quatite . "</td><td><select multiple>";
        foreach ($this->fournisser as $f) {
            $s .= $f;
        }
        $s .= "</select></td></tr>";
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

    public function insert() {
        $cnx = connexpdo();

        $rqtprep = $cnx->prepare("INSERT INTO article (ref, lib, prix, quantite) VALUES (:ref, :lib, :prix, :quantite)");
        $rqtprep->bindParam(":ref", $this->reference, PDO::PARAM_STR);
        $rqtprep->bindParam(":lib", $this->libelle, PDO::PARAM_STR);
        $rqtprep->bindParam(":prix", $this->prix, PDO::PARAM_INT);
        $rqtprep->bindParam(":quantite", $this->quatite, PDO::PARAM_INT);

        $rqtprep->execute();

        foreach ($this->fournisser as $f) {
            $rqtprep2 = $cnx->prepare("INSERT INTO `art-for` (ref, id) VALUES (:ref, :id)");
            $rqtprep2->bindParam(":ref", $this->reference, PDO::PARAM_STR);
            $rqtprep2->bindParam(":id", $f->id, PDO::PARAM_INT);
            $rqtprep2->execute();
        }

        header("location:../vue/articleForm.php");
    }

    public function update() {
        $cnx = connexpdo();

        $rqtsql = $cnx->prepare("UPDATE article SET lib = :lib, prix = :prix, quantite = :quantite WHERE ref = :ref");
        $rqtsql->bindParam(":lib", $this->libelle, PDO::PARAM_STR);
        $rqtsql->bindParam(":prix", $this->prix, PDO::PARAM_INT);
        $rqtsql->bindParam(":quantite", $this->quatite, PDO::PARAM_INT);
        $rqtsql->bindParam(":ref", $this->reference, PDO::PARAM_STR);

        $rqtsql->execute();

        $rqtsql2 = $cnx->prepare("UPDATE `art-for` SET fr = :frr WHERE ref = :reff");

        foreach ($this->fournisser as $f) {
            $rqtsql2->bindParam(":frr", $f->id, PDO::PARAM_INT);
            $rqtsql2->bindParam(":reff", $this->reference, PDO::PARAM_STR);
            $rqtsql2->execute();
        }

        header("location:../vue/articleForm.php");
    }

    public function delete() {
        $cnx = connexpdo();
        $rqtsql = "DELETE FROM article WHERE ref = '" . $this->reference . "'";
        $cnx->exec($rqtsql);

        $rqtsql2 = "DELETE FROM `art-for` WHERE ref = '" . $this->reference . "'";
        $cnx->exec($rqtsql2);

        header("location:../vue/articleForm.php");
    }
}
?>