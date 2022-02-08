<?php
//3.Crée dans le dossier Models/Model.php (pour contenir les méthodes communes aux autres classes)
//4.On va maintenant dans models/ReservationSalle.php pour créer la class ReservationSalle qui a à la fois le même nom et le même fichier

//Elle va contenir les différentes méthodes communes aux autres classes
    // ex : réupérer toutes les infos d'une table de la bdd (puis il faudra juste modifier le nom de la table qu'on veut)
//on crée une classe abstraite car elle ne pourra pas être instancier

abstract class Model
{
     private static $_bdd;

    //INSTANCIE LA CONNEXION A LA BDD
    private static function setBdd()
     {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;chrset=utf8','root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
     }

    //méthode pour récupérer la connexion à la bdd
    //RECUPERE LA CONNEXION A LA BDD
    protected function getBdd()
    {   //vérifie si l'attribut  est null donc appelle la méthode private static
        if(self::$_bdd == null)
            self::setBdd();
        return self::$_bdd;
    }

    //méthode pour récupérer toutes les données d'une table
                            //nom de la table + le nom de l'objet créé
    protected function getAll($table, $obj)
    {
        $var = [];
            //Prépare la requ
        $req = $this->getBdd()->prepare('SELECT * FROM ' .$table. ' ORDER BY id desc');
            //exécute la requête
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
    $req->closeCursor();
    }
}

