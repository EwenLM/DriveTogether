<?php

namespace App\Models;

class Book extends Model{

    protected $id_user;
    protected $id_journey;
    protected $seat_taken;

    //L'ajout de = null permet de rendre facultatif les arguments lors de la création de l'objet
    public function __construct($id_user = null, $id_journey =null, $seat_taken =null)
    {
        $this -> id_user = $id_user;
        $this -> id_journey = $id_journey;
        $this -> seat_taken = $seat_taken;

        //tableau comprennant le nom des colonnes de la table et les valeurs à insérer 
        $params = [
            'id_user'=> $id_user,
            'id_journey' => $id_journey,
            'seat_taken'=> $seat_taken
        ];

        parent :: __construct('book', $params);
    }

    
    /**
     * Get the value of id_journey
     */
    public function getIdJourney()
    {
        return $this->id_journey;
    }

    /**
     * Set the value of id_journey
     */
    public function setIdJourney($id_journey): self
    {
        $this->id_journey = $id_journey;

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
     * Get the value of seat_taken
     */
    public function getSeatTaken()
    {
        return $this->seat_taken;
    }

    /**
     * Set the value of seat_taken
     */
    public function setSeatTaken($seat_taken): self
    {
        $this->seat_taken = $seat_taken;

        return $this;
    }
}