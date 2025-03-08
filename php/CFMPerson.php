<?php

class CFMPerson 
{
    // Properties
    private $firstname;
    private $lastname;
    private $email;
    private $addressline1;
    private $addressline2;
    private $city;
    private $state;
    private $zipcode;
    private $mainphone;
    private $mobilephone;
    private $image;
    private $membershiptype;
    private $familymembers;
    private $username;
    private $password;
    private $status;
    private $roles;
    private $ispublic;
    private $recieveemail;
    private $recievememberrenewal;
    private $recievegroupmessage;
    
    function setFirstName($value) : void
    {
        $this->firstname = $value;
    }

    function getFirstName(): mixed
    {
        return $this->firstname;
    }

    function setLastName($value) : void
    {
        $this->lastname = $value;
    }

    function getlastName(): mixed
    {
        return $this->lastname;
    }

    function setEmail($value) : void
    {
        $this->email = $value;
    }

    function getEmail(): mixed
    {
        return $this->email;
    }

    function setAddressLine1($value) : void
    {
        $this->addressline1 = $value;
    }

    function getAddressLine1(): mixed
    {
        return $this->addressline1;
    }

    function setAddressLine2($value) : void
    {
        $this->addressline2 = $value;
    }

    function getAddressLine2(): mixed
    {
        return $this->addressline2;
    }

    function setCity($value) : void
    {
        $this->city = $value;
    }

    function getCity(): mixed
    {
        return $this->city;
    }

    function setState($value) : void
    {
        $this->state = $value;
    }

    function getState(): mixed
    {
        return $this->state;
    }

    function setZipCode($value) : void
    {
        $this->zipcode = $value;
    }

    function getZipCode(): mixed
    {
        return $this->zipcode;
    }

    function setMainPhone($value) : void
    {
        $this->mainphone = $value;
    }

    function getMainPhone(): mixed
    {
        return $this->mainphone;
    }

    function setMobilePhone($value) : void
    {
        $this->mobilephone = $value;
    }

    function getMobilePhone(): mixed
    {
        return $this->mobilephone;
    }

    function setMembershipType($value) : void
    {
        $this->membershiptype = $value;
    }

    function getMembershipType(): mixed
    {
        return $this->membershiptype;
    }

    function setFamilyMembers($value) : void
    {
        $this->familymembers = $value;
    }
    
    function getFamilyMembers(): mixed
    {
        return $this->familymembers;
    }

    function setUserName($value) : void
    {
        $this->username = $value;
    }
    
    function getUserName(): mixed
    {
        return $this->username;
    }

    function setPassword($value) : void
    {
        $this->password = $value;
    }
    
    function getPassword(): mixed
    {
        return $this->password;
    }

    function setStatus($value) : void
    {
        $this->status = $value;
    }
    
    function getStatus(): mixed
    {
        return $this->status;
    }

    function setRoles($value) : void
    {
        $this->roles = $value;
    }
    
    function getRoles(): mixed
    {
        return $this->roles;
    }

    function setIsPublic($value) : void
    {
        $this->ispublic = $value;
    }
    
    function getIsPublic(): mixed
    {
        return $this->ispublic;
    }

    function setReceiveEmail($value) : void
    {
        $this->recieveemail = $value;
    }
    
    function getReceiveEmail(): mixed
    {
        return $this->recieveemail;
    }

    function setReceiveMemberRenewal($value) : void
    {
        $this->recievememberrenewal = $value;
    }
    
    function getReceiveMemberRenewal(): mixed
    {
        return $this->recievememberrenewal;
    }

    function setReceiveGroupMessage($value) : void
    {
        $this->recievegroupmessage = $value;
    }
    
    function getReceiveGroupMessage(): mixed
    {
        return $this->recievegroupmessage;
    }

    function Save(): void
    {

    }

    function Load() : void
    {

    }
}