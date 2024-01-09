<?php

namespace App\entity;

class User
{
    private $id;
    private $name;
    private $username;
    private $email;
    private $password;
    private $image;
    private $linkedin;
    private $github;
    private $role_id;

    /**
     * @param $id
     * @param $name
     * @param $username
     * @param $email
     * @param $password
     * @param $role_id
     */
    public function __construct($id, $name, $username, $email, $password, $image , $linkedin , $github , $role_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
        $this->linkedin = $linkedin;
        $this->github = $github;
        $this->role_id = $role_id;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

       /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $password
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


       /**
     * @return mixed
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @param mixed $password
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin; 
    }
    


       /**
     * @return mixed
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * @param mixed $password
     */
    public function setGithub($github)
    {
        $this->github = $github;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * @param mixed $role_id
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }




}