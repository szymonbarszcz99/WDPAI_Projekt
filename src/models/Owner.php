<?php


class Owner
{
    private $id;
    private $userId;
    private $bookstoreId;

    public function __construct($id, $userId, $bookstoreId)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->bookstoreId = $bookstoreId;
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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getBookstoreId()
    {
        return $this->bookstoreId;
    }

    /**
     * @param mixed $bookstoreId
     */
    public function setBookstoreId($bookstoreId): void
    {
        $this->bookstoreId = $bookstoreId;
    }


}