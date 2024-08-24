<?php

namespace App\Models;

class Message extends Model{
    protected $text;
    protected $id_journey;
    protected $id_user;


    
    public function __construct($text = null, $id_journey =null, $id_user =null)
    {
        $this-> text = $text;
        $this -> id_journey = $id_journey;
        $this -> id_user = $id_user;

        
    //tableau comprennant le nom des colonnes de la table et les valeurs à insérer 
        $params = [
            'text'=>$text,
            'id_journey'=>$id_journey,
            'id_user'=>$id_user
        ];

        parent:: __construct('message', $params);
    }

    

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     */
    public function setText($text): self
    {
        $this->text = $text;

        return $this;
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
}