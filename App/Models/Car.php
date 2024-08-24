<?php

namespace App\Models; 


class Car extends Model
{
    // Propriétés
    protected $id_car;
    protected $brand;
    protected $model;
    protected $color;
    protected $number_seat;
    protected $id_user;

    //L'ajout de = null permet de rendre facultatif les arguments lors de la création de l'objet
    public function __construct($brand=null,$model=null,$color=null,$number_seat=null, $id_user = null){


    //tableau comprennant le nom des colonnes de la table et les valeurs à insérer 
    $params = [
        'brand' => $brand,
        'model' => $model,
        'color' => $color,
        'number_seat' => $number_seat,
        'id_user' => $id_user
    ];
        parent::__construct('car', $params);
    }


    /**
     * Get the value of brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     */
    public function setBrand($brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of numberSeat
     */
    public function getNumberSeat()
    {
        return $this->number_seat;
    }

    /**
     * Set the value of number_seat
     */
    public function setNumberSeat($number_seat): self
    {
        $this->number_seat = $number_seat;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id_car;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id_car = $id;

        return $this;
    }

    /**
     * Get the value of model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     */
    public function setModel($model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     */
    public function setColor($color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of id_user
     */
    public function getId1()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     */
    public function setId1($id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}