<?php

namespace App\Models;

class City extends Model{

    protected $name;
    protected $cp;

    //L'ajout de = null permet de rendre facultatif les arguments lors de la création de l'objet
    public function __construct($name = null, $cp=null)
    {
        $this -> name = $name;
        $this -> cp = $cp;

        $params = [
            'name' => $name,
            'cp'=> $cp
        ];
    parent ::__construct('city', $params);
    }

    

    public function findByCities(array $criteria)
    {
        $fields = [];
        $values = [];

        foreach ($criteria as $field => $value) {
            // Utilisation de LIKE pour la recherche partielle
            $fields[] = "UPPER($field) LIKE ?";
            $values[] = '%' . strtoupper($value) . '%';
        }

        $fieldsList = implode(' AND ', $fields);
        $result = $this->query("SELECT * FROM {$this->table} WHERE $fieldsList", $values)->fetchAll();

        return $result;
    }




    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of cp
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     */
    public function setCp($cp): self
    {
        $this->cp = $cp;

        return $this;
    }
}