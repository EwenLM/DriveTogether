<?php

namespace App\Controllers;

use App\Models\City;

$msg = null;


class CityController
{

    public function cityAdd()
    {

        if (isset($_POST['name'], $_POST['cp'])) {
            $name = $_POST['name'];
            $name = mb_strtoupper($name);
            $name = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);
            $name = preg_replace('/[^A-Z\s-]/', '', $name);
            $cp = $_POST['cp'];


            if (empty($name) || empty($cp)) {
                $msg = "Veuillez saisir tous les champs";
            } elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\s-]+$/', $name)) {
                $msg = "Nom de ville invalide";
            } elseif (strlen($cp) < 5 || !preg_match('/[0-9]+/', $cp)) {
                $msg = "Veuillez saisir un code postal à 5 chiffres";
            } else {
                $newCity = new City($name, $cp);
                $newCity->create($newCity);
                $msg = 'Ville ajoutée !';
            }
        }
        $_SESSION['msg'] = $msg;

        header("location: ../../admin");
    }

    //Fonction pour rechercher les villes correspondantes à un nom
    public function cityFind()
    {
        // Récupérez le terme de recherche depuis l'URL
        $searchTerm = $_GET['search'] ?? '';
    
        // Convertir en majuscules et retirer les accents
        $searchTerm = mb_strtoupper($searchTerm);
        $searchTerm = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $searchTerm);
        $searchTerm = preg_replace('/[^A-Z\s-]/', '', $searchTerm);
    
        $cityModel = new City(); 
    
        // Utilisation de la méthode findByCities pour récupérer les villes correspondant à la recherche
        $cities = $cityModel->findByCities(["name" => $searchTerm]);
    
        // Renvoyer les résultats au format JSON
        header('Content-Type: application/json');
        echo json_encode($cities);
    }
    
    

    
}
