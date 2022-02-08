<?php
class ControllerAccueil
{
            //ce sera un nouvel objet de la class Models/ResrevationSalle
            //Donc ce sera une nouvelle instance de ResrevationSalle pour accéder aux fonctions  et donc on le met en privé
    private $_ReservationSalle;
    private $_view;

    //
    public function __construct($url)
            //RAPPEL dans le ROUTER on a récupérer la variable url 
    {      //Donc le constructeur se lance et on récup l'url
        if(isset($url) && count($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->reservations(); 
    }

    private function reservations()
    {
        $this->_reservationSalle = new reservationSalle;
        $reservations = $this->_reservationSalle->getReservations();

        require_once('views/viewsAccueil.php');
    }

}