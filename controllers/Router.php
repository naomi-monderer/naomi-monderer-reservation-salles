<?php
//1. Création du Routeur 
//2. Quand finit on va lancer le routeur dans la page index 

class Router 
{
    private $_controller;
    private $_view;

    //la requête du Routeur : la gestion selon l'action de l'utilisateur
    public function routeReq()
    {   //pour charger automatiquement les classes
        try
        {
            /*crée une instance de classe donc on doit recquérire fichier de la classe en question DONC splautoloadregister
            = ddétecter le nom de l'instance de classe qu'on fera et va charger le point php
            */
            //CHARGEMENT AUTOMATIQUE DES CLASSES
                //détecte le nom
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });
            //!\ l'autoloader charge juste pour les classes du dossier "models" donc il faut créer par la suite une classe spéciale pour l'autoload afin qu'il puisse charger toutes les classes
            
            $url = '';
            
            //on va définir ce qu'on va inclure comme fichier en fonctiondes différentes actions des users
                //LE CONTROLEUR EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if(isset($_GET['url']))
            //si il y a un paramètre GET Url
            {   //utilise fonction explode pour récupérer tous les paramètres de manière séparés de l'url
                $url = explode('/', filter_var($_GET['url'], 
                //le filtre var control le get donc pour sécuriser ce qu'on récupère
                FILTER_SANITIZE_URL));

                                //la 1ère lettre en majuscule
                                    //tout le reste en minuscule
                                                //iurl 0 est le 1er paramètre
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "Controllers/".$controllerClass.".php";
                

                //vérifie si le fichier existe
                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    //l'attribut privé créé au début
                    $this->_controller = new $controllerClass($url);
                }
                else 
                    throw new Exception('Page introuvable');
            }
            else 
            {
                require_once('controllers.ControllerAccueil.php');
                                            //ce sera l'instance de ControllerAccueil
                $this->_controller = new ControllerAccueil($url);
            }
        }
        //GESTION DES ERREURS
        catch(Exception $e)
        {                   //récup les messages
            $errorMsg = $e->getMessage();
            require_once('views/viewError.php');
        }
    }


}