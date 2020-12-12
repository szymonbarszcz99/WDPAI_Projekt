<?php


class Bookstore
{
    private $id;
    private $name;
    private $address;
    private $telephone;
    private $site;
    private $opening_hours_id;
    private $description;
    private $photos;

    public function __construct($id,$name,$address,$telephone,$site,$opening_hours_id,$description,$photos)
    {
        $this->id=$id;
        $this->name=$name;
        $this->address=$address;
        $this->telephone=$telephone;
        $this->site=$site;
        $this->opening_hours_id=$opening_hours_id;
        $this->description=$description;
        $this->photos=$photos;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;
    }

    public function getOpeningHours(): array
    {
        return $this->opening_hours;
    }

    public function setOpeningHours(array $opening_hours)
    {
        $this->opening_hours = $opening_hours;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPictures(): array
    {
        return $this->pictures;
    }

    public function setPictures(array $pictures)
    {
        $this->pictures = $pictures;
    }

}