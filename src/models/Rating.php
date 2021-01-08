<?php


class Rating
{
    private $id;
    private $bookstoreId;
    private $numberOfRates;
    private $sumOfRates;

    public function __construct($id, $bookstoreId, $numberOfRates, $sumOfRates)
    {
        $this->id = $id;
        $this->bookstoreId = $bookstoreId;
        $this->numberOfRates = $numberOfRates;
        $this->sumOfRates = $sumOfRates;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getBookstoreId()
    {
        return $this->bookstoreId;
    }

    public function setBookstoreId($bookstoreId): void
    {
        $this->bookstoreId = $bookstoreId;
    }

    public function getNumberOfRates()
    {
        return $this->numberOfRates;
    }

    public function setNumberOfRates($numberOfRates): void
    {
        $this->numberOfRates = $numberOfRates;
    }

    public function getSumOfRates()
    {
        return $this->sumOfRates;
    }

    public function setSumOfRates($sumOfRates): void
    {
        $this->sumOfRates = $sumOfRates;
    }

}