<?php 

namespace App\Models;

class Wish extends Model{
    protected $id_user;
    protected $id_journey_request;

    public function __construct($id_user =null, $id_journey_request=null)
    {
        $this -> id_user = $id_user;
        $this -> id_journey_request = $id_journey_request;

        $params = [
            'id_user' => $id_user, 
            'id_journey_request' => $id_journey_request
        ];

        parent:: __construct('wish', $params);
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
     * Get the value of id_journey_request
     */
    public function getIdJourneyRequest()
    {
        return $this->id_journey_request;
    }

    /**
     * Set the value of id_journey_request
     */
    public function setIdJourneyRequest($id_journey_request): self
    {
        $this->id_journey_request = $id_journey_request;

        return $this;
    }
}