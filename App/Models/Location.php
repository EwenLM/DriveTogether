<?php

namespace App\Models;

class Location extends Model
{
    protected $address;
    protected $latitude;
    protected $longitude;
    protected $id_city;

    public function __construct($address = null, $id_city = null, $latitude = null, $longitude = null )
    {
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->id_city = $id_city;

        //tableau comprennant le nom des colonnes de la table et les valeurs à insérer 
        $params = [
            'address' => $address,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'id_city' => $id_city
        ];

        parent::__construct('location', $params);
    }


    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set the value of latitude
     */
    public function setLatitude($latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get the value of longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set the value of longitude
     */
    public function setLongitude($longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get the value of id_city
     */
    public function getIdCity()
    {
        return $this->id_city;
    }

    /**
     * Set the value of id_city
     */
    public function setIdCity($id_city): self
    {
        $this->id_city = $id_city;

        return $this;
    }
}
