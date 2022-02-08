<?php
//5. Créé (A) comme il n'existe : donc On va créer dans Models/Reservation.php la class
//6.

//On va récupérer toutes les données de manière sécurisé donc toutes les données seront privés
class Reservation
{
    private $_id;
    private $_titre;
    private $_description;
    private $_debut;
    private $_fin;
    private $_id_utilisateur;

    //CONSTRUCTEUR                  //en réf dans models/Model.php de protected function getAll($table,$obj)
                                    //voir dans le while
    public function __construct(array $data)
    {
        $this->hydrate($data); 
                //Le principe de l'hydratation consiste à remplir un objet, donc l'instance d'une classe, avec les variables lui permettant d'être "remplie". Cela permet par exemple d'éviter d'avoir à remplir manuellement chaque champ de chaque objet lorsque l'on lit les données dans la base.
                //L'hydratation est le processus de "remplissage" d'une structure d'objet avec des données. Hydrater un objet c'est remplir une ou plusieurs de ces variables(attributs) avec des données. Donc çà correspond a une sélection !*
                //https://www.dynamic-mess.com/php/php-bdd-objet-hydrate-6-33/
    }

    //renvoie les différents setter pour mettre à jour les données (privés) qu'on va récupérer sur certaines condition pour une sécurité maximum
    //HYDRATATION
    public function hydrate(array $data)
    {
        //parcourir les données data
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
                $this->$method($value);
        }
    }


    //SETTERS
    public function setId($id)
    {
        $id = (int) $id;

        if($id > 0)
            $this->_id = $id;
        //Donc si cette condition là est respecté alors l'attribut en privé sera mise à jour sinon NON
    }
        //Vérifie avec le SetTitre donc vérifie si le titre est une chaine de caractère donc MAJ sinon NON
    public function setTitre($titre)
    {
        if(is_string($titre))
            $this->_titre = $titre;
    }
    public function setDescription($description)
    {
        if(is_string($description))
            $this->_description = $description;
    }
    public function setDebut($debut)
    {
        $this->_debut = $debut;
    }
    public function setFin($fin)
    {
        $this->_fin = $fin;
    }
        //Est-ce que c'est nécessaire ou pas ?
    public function setIdUtilisateur($id_utilisateur)
    {
        $this->_id_utilisateur = $id_utilisateur;
    }

    //GETTER : pour récupérer les données comme ce sont des attributs privés
    public function getId()
    {
        return $this->_id;
    }
    public function getTitre()
    {
        return $this->_titre;
    }
    public function getDescription()
    {
        return $this->_description;
    }
    public function getDebut()
    {
        $this->_debut;
    }
    public function getFin()
    {
        return $this->_fin;
    }
    public function getId_utilisateur()
    {
        return $this->_id_utilisateur;
    }

    //Maintenant pour afficher tout cela on va donc créer le controlleur
}