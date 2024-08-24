<?php

namespace App\Models;

class JourneyRequest extends Model
{
    protected $hour_go;
    protected $flexibility;
    protected $id_location;
    protected $id_location_1;


    public function __construct($hour_go = null, $flexibility = null, $id_location = null, $id_location_1 = null)
    {
        $this->hour_go = $hour_go;
        $this->flexibility = $flexibility;
        $this->id_location = $id_location;
        $this->id_location_1 = $id_location_1;

        //tableau comprennant le nom des colonnes de la table et les valeurs à insérer 
        $params = [
            'hour_go' => $hour_go,
            'flexibility' => $flexibility,
            'id_location' => $id_location,
            'id_location' => $id_location_1

        ];

        parent::__construct('journey_request', $params);
    }


    /**
     * Get the value of hour_go
     */
    public function getHourGo()
    {
        return $this->hour_go;
    }

    /**
     * Set the value of hour_go
     */
    public function setHourGo($hour_go): self
    {
        $this->hour_go = $hour_go;

        return $this;
    }

    /**
     * Get the value of flexibility
     */
    public function getFlexibility()
    {
        return $this->flexibility;
    }

    /**
     * Set the value of flexibility
     */
    public function setFlexibility($flexibility): self
    {
        $this->flexibility = $flexibility;

        return $this;
    }

    /**
     * Get the value of id_location
     */
    public function getIdLocation()
    {
        return $this->id_location;
    }

    /**
     * Set the value of id_location
     */
    public function setIdLocation($id_location): self
    {
        $this->id_location = $id_location;

        return $this;
    }

    /**
     * Get the value of id_location_1
     */
    public function getIdLocation1()
    {
        return $this->id_location_1;
    }

    /**
     * Set the value of id_location_1
     */
    public function setIdLocation1($id_location_1): self
    {
        $this->id_location_1 = $id_location_1;

        return $this;
    }
}
