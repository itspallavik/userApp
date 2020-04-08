<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document(collection="users")
 */

class User
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $firstname;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $lastname;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $password;


    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $address;

    /**
     * @MongoDB\Field(type="int")
     * @Assert\NotBlank()
     * @Assert\Positive()
     */
    protected $phone;

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getFirstname(){
        return $this->firstname;
    }

    function setFirstname($firstName){
        $this->firstname = $firstName;
    }

    function getLastname(){
        return $this->lastname;
    }
    
    function setLastname($lastName){
        $this->lastname = $lastName;
    }

    function getEmail(){
        return $this->email;
    }
    
    function setEmail($email){
        $this->email = $email;
    }

    function getPassword(){
        return $this->password;
    }
    
    function setPassword($password){
        $this->password = $password;
    }

    function getAddress(){
        return $this->address;
    }
    
    function setAddress($address){
        $this->address = $address;
    }

    function getPhone(){
        return $this->phone;
    }
    
    function setPhone($phone){
        $this->phone = $phone;
    }
}