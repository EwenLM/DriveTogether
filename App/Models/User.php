<?php

namespace App\Models;

class User extends Model
{
    protected $id;
    protected $mail;
    protected $last_name;
    protected $first_name;
    protected $password;
    protected $photo;
    protected $mobile;
    protected $role;
    protected $birth_date;
    protected $status;
    protected $gender;


    /**
     * Constructeur
     *
     * @param [type] $mail
     * @param [type] $last_name
     * @param [type] $first_name
     * @param [type] $password
     * @param [type] $birth_date
     * @param [type] $gender
     * @param $mobile
     */
    public function __construct($mail = null, $last_name = null, $first_name = null, $password = null,$mobile = null ,$birth_date = null, $gender = null )
    {
        $this->mail = $mail;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->password = $password;
        $this->birth_date = $birth_date;
        $this->gender = $gender;

        //Insertions des données dans le tableau params
        $params = [
            'mail' => $mail,
            'last_name' => $last_name,
            'first_name' => $first_name,
            'password' => $password,
            'mobile' => $mobile,
            'birth_date' => $birth_date
        ];

        parent::__construct('user_u', $params);
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     */
    public function setMail($mail): self
    {
        $this->mail = $mail;

        return $this;
    }



    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     */
    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of mobile
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set the value of mobile
     */
    public function setMobile($mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole($role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of birth_date
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set the value of birth_date
     */
    public function setBirthDate($birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     */
    public function setGender($gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName($last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     */
    public function setFirstName($first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }
}
