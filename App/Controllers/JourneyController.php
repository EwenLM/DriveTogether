<?php

namespace App\Controllers;

use App\Models\Location;
use App\Controllers\LocationController;
use App\Models\Journey;

class JourneyController
{
    public function index($id)
    {
        $id;
        require_once RACINE . '/App/Views/journey.php';
    }


    public function journeyAdd()
    {
        $msg = null;

        if (isset($_POST['location_start'], $_POST['startCitySearch'], $_POST['location_end'], $_POST['arrivalCitySearch'], $_POST['hour_go'])) {

            $location_start = $_POST['location_start'];
            $startCity = $_POST['startCitySearch'];
            $location_end = $_POST['location_end'];
            $arrival_city = $_POST['arrivalCitySearch'];
            $hour_go = $_POST['hour_go'];

            //Vérification des champs
            if (empty($location_start) || empty($startCity) || empty($location_end) || empty($arrival_city) || empty($hour_go)) {
                $msg = "Veuillez saisir tous les champs";
            } elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\s-]+$/', $location_start)) {
                $msg = "Nom de point de rendez-vous de départ invalide";
            } elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\s-]+$/', $startCity)) {
                $msg = "Nom de point de ville de départ invalide";
            } elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\s-]+$/', $location_end)) {
                $msg = "Nom de point de rendez-vous d'arrivée invalide";
            } elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\s-]+$/', $arrival_city)) {
                $msg = "Nom de point de ville d'arrivée invalide";
            } else {
                // Enregistrement de la location de départ en bdd et restitution de l'id
                $newLocationStartController = new LocationController();
                $id_location_start = $newLocationStartController->locationAdd($location_start, $startCity);

                // Enregistrement de la location d'arrivée en bdd et restitution de l'id
                $newLocationEndController = new LocationController();
                $id_location_end = $newLocationEndController->locationAdd($location_end, $arrival_city);

                // Récupération des infos de l'utilisateur
                $sessionUser = $_SESSION['userSession'];
                $id_user = $sessionUser['id_user'];

                // Assurez-vous que l'utilisateur a une voiture assignée
                // $car = new Car();
                // $carResults = $car->findBy(['id_user' => $id_user]);
                // if (!empty($carResults)) {
                //     $id_car = $carResults[0]['id_car']; // Assurez-vous d'accéder au bon résultat
                // } else {
                //     throw new Exception("User does not have a car assigned");
                // }

                // Enregistrement du trajet en bdd
                $newJourney = new Journey($hour_go, $id_user, $id_location_start, $id_location_end, 1);
                $newJourney->create($newJourney);
                $msg = 'Trajet créé !';
            }
        }
        header("location: ../../home");

        $_SESSION['msg'] = $msg;
    }
}
