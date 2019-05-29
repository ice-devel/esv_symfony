<?php

class Stagiaire {
    private $id;
    private $createdAt;
    private $name;
    private $phone;
    private $birthday;

    /**
     * Stagiaire constructor.
     * @param $id
     * @param $createdAt
     * @param $name
     * @param $phone
     * @param $birthday
     */
    public function __construct($id, $createdAt, $name, $phone, $birthday)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->name = $name;
        $this->phone = $phone;
        $this->birthday = $birthday;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
}