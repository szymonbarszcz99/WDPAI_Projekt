<?php


class Bookstore
{
    private $id;
    private $name;
    private $rate;
    private $address;
    private $telephone;
    private $webpage;
    private $opening_hours_id;
    private $description;
    private $photos;

    public function __construct($id,$name,$rate,$address,$telephone,$webpage,$opening_hours_id,$description,$photos)
    {
        $this->id=$id;
        $this->name=$name;
        $this->rate=$rate;
        $this->address=$address;
        $this->telephone=$telephone;
        $this->webpage=$webpage;
        $this->opening_hours_id=$opening_hours_id;
        $this->description=$description;
        $this->photos=$photos;
    }

    public function getId(){
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRate(){
        return $this->rate;
    }

    public function setRate($rate){
        $this->rate=$rate;
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

    public function getWebpage()
    {
        return $this->webpage;
    }

    public function setWebpage($webpage)
    {
        $this->site = $webpage;
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

    public function getPhotos()
    {
        return $this->photos;
    }

    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

}