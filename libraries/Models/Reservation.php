<?php
namespace Models;
require_once('database.php');
require_once('Models.php');

class Reservation extends Model
{
    public $titre;
    public $description;
    public $debut;
    public $fin;
    public $id_utilisateurs;

   
    public function Insert($titre,$description,$debut,$fin,$id_utilisateurs)
    {
         
    }
}
?>