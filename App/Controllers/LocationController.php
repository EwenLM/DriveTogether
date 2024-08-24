<?php

namespace App\Controllers;

use App\Models\Location;
use App\Models\City;

class LocationController {
    public function locationAdd($location_start, $locationCity) {
        $city = new City();
        $result = $city->findBy(['name' => $locationCity]);

        if (!empty($result)) {
            $cityId = $result[0]['id_city'];  // Accéder au premier résultat
            $existingLocation = $this->locationFindBy($location_start);

            if (!empty($existingLocation)) {
                // Location existe déjà
                return $existingLocation[0]['id_location'];
            } else {
                // Ajout de la location
                $newLocationStart = new Location($location_start, $cityId);
                $newLocationStart->create($newLocationStart);
                $newLocationResult = $this->locationFindBy($location_start);
                return $newLocationResult[0]['id_location'];
            }
        } 
    }

    public function locationFindBy($location_name) {
        $location = new Location();
        $result = $location->findBy(['address' => $location_name]);
        return $result;
    }
}

