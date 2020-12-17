<?php


class openingHours
{
    private $mon;
    private $tue;
    private $wed;
    private $thur;
    private $fri;
    private $sut;
    private $sun;

    /**
     * openingHours constructor.
     * @param $mon
     * @param $tue
     * @param $wed
     * @param $thur
     * @param $fri
     * @param $sat
     * @param $sun
     */
    public function __construct($mon, $tue, $wed, $thur, $fri, $sat, $sun)
    {
        $this->mon = $mon;
        $this->tue = $tue;
        $this->wed = $wed;
        $this->thur = $thur;
        $this->fri = $fri;
        $this->sat = $sat;
        $this->sun = $sun;
    }

    /**
     * @return mixed
     */
    public function getMon()
    {
        return $this->mon;
    }

    /**
     * @param mixed $mon
     */
    public function setMon($mon): void
    {
        $this->mon = $mon;
    }

    /**
     * @return mixed
     */
    public function getTue()
    {
        return $this->tue;
    }

    /**
     * @param mixed $tue
     */
    public function setTue($tue): void
    {
        $this->tue = $tue;
    }

    /**
     * @return mixed
     */
    public function getWed()
    {
        return $this->wed;
    }

    /**
     * @param mixed $wed
     */
    public function setWed($wed): void
    {
        $this->wed = $wed;
    }

    /**
     * @return mixed
     */
    public function getThur()
    {
        return $this->thur;
    }

    /**
     * @param mixed $thur
     */
    public function setThur($thur): void
    {
        $this->thur = $thur;
    }

    /**
     * @return mixed
     */
    public function getFri()
    {
        return $this->fri;
    }

    /**
     * @param mixed $fri
     */
    public function setFri($fri): void
    {
        $this->fri = $fri;
    }

    /**
     * @return mixed
     */
    public function getSat()
    {
        return $this->sat;
    }

    /**
     * @param mixed $sat
     */
    public function setSat($sat): void
    {
        $this->sut = $sat;
    }

    /**
     * @return mixed
     */
    public function getSun()
    {
        return $this->sun;
    }

    /**
     * @param mixed $sun
     */
    public function setSun($sun): void
    {
        $this->sun = $sun;
    }

}