<?php

namespace App\Controllers;

use App\Models\Car;

$msg = null;


class CarController
{
   

    public function carAdd()
    {

        $msg = null;
        // Vérifier si des données ont été soumises via POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer les données saisies dans le formulaire
            $brand = htmlspecialchars($_POST["brand"]);
            $model = htmlspecialchars($_POST["model"]);
            $color = htmlspecialchars($_POST["color"]);
            $number_seat = htmlspecialchars($_POST["number_seat"]);

            // Vérifier si tous les champs sont remplis
            if (empty($brand) || empty($model) || empty($color) || empty($number_seat)) {
                $msg = 'Veuillez saisir tous les champs';
            } elseif ( $number_seat < 1 || $number_seat > 7 ) {
                $msg = "Le nombre de sièges n'est pas valide";
            } else {
                // Créer une nouvelle instance de la classe Car avec les données saisies
                $userSession = $_SESSION['userSession'];
                $userId = $userSession['id_user'];
                $car = new Car($brand, $model, $color, $number_seat,  $userId);

                // Enregistrer la nouvelle voiture dans la base de données
                $car->create($car);

                $msg = "Voiture enregistrée avec succès !";
            }
        }

        $userSession = $_SESSION['userSession'];
        $idUser = $userSession['id_user'];
        
        header("location: ../user/$idUser/get");

        $_SESSION['msg'] = $msg;
    }


 


}





// Inclure la vue de la liste des voitures
// define('RACINE', dirname(__DIR__));
