<?php
//4.On va maintenant dans models/ReservationSalle.php pour créer la class ReservationSalle qui a à la fois le même nom et le même fichier
//5. Créé (A) comme il n'existe : donc On va créer dans Models/Reservation.php la class

    //!\ pour l'autoload il faut que le fichier et la class ont le même nom
        //pour que l'autoload puisse retrouver le fichier php par rapport au nom de la classe
class ReservationSalle extends Model
{
    public function getReservation()
    {                       //nom de la table //nom d'un objet : (cf Model.php) (A)
        return $this->getAll('reservations', 'Reservation');
    }
}