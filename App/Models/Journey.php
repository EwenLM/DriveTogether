<?php

namespace App\Models;

class Journey extends Model{

    protected $hour_go;
    protected $number_of_place;
    protected $id_user;
    protected $id_location_start;
    protected $id_location_end;
    protected $id_car;

    public function __construct($hour_go=null , $id_user = null, $id_location_start = null, $id_location_end = null, $id_car= null, $number_of_place= null){
        $this -> hour_go = $hour_go;
        $this -> number_of_place = $number_of_place;
        $this -> id_user  = $id_user;
        $this -> id_location_start = $id_location_start;
        $this -> id_location_end = $id_location_end;
        $this -> id_car = $id_car;

        $params = [
            'hour_go' => $hour_go,
            'number_of_place' => $number_of_place,
            'id_user' => $id_user,
            'id_location'=> $id_location_start,
            'id_location_1' => $id_location_end,
            'id_car' => $id_car
        ];
        
        parent:: __construct('journey', $params);
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
     * Get the value of number_of_place
     */
    public function getNumberOfPlace()
    {
        return $this->number_of_place;
    }

    /**
     * Set the value of number_of_place
     */
    public function setNumberOfPlace($number_of_place): self
    {
        $this->number_of_place = $number_of_place;

        return $this;
    }

    /**
     * Get the value of id_user
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     */
    public function setIdUser($id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_location_start
     */
    public function getIdLocationStart()
    {
        return $this->id_location_start;
    }

    /**
     * Set the value of id_location_start
     */
    public function setIdLocationStart($id_location_start): self
    {
        $this->id_location_start = $id_location_start;

        return $this;
    }

    /**
     * Get the value of id_location_end
     */
    public function getIdLocationEnd()
    {
        return $this->id_location_end;
    }

    /**
     * Set the value of id_location_end
     */
    public function setIdLocationEnd($id_location_end): self
    {
        $this->id_location_end = $id_location_end;

        return $this;
    }

    /**
     * Get the value of id_car
     */
    public function getIdCar()
    {
        return $this->id_car;
    }

    /**
     * Set the value of id_car
     */
    public function setIdCar($id_car): self
    {
        $this->id_car = $id_car;

        return $this;
    }
}
