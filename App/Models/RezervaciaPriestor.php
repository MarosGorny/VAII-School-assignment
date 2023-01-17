<?php

namespace App\Models;

use App\Core\Model;

class RezervaciaPriestor extends Model
{
    protected $id;
    protected $userID;
    protected $den;
    protected $zaciatok;
    protected $koniec;
    protected $date;
    protected $nazov;


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
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }


    /**
     * @return mixed
     */
    public function getDen()
    {
        return $this->den;
    }

    /**
     * @param mixed $den
     */
    public function setDen($den): void
    {
        $this->den = $den;
    }

    /**
     * @return mixed
     */
    public function getZaciatok()
    {
        return $this->zaciatok;
    }

    /**
     * @param mixed $zaciatok
     */
    public function setZacitok($zaciatok): void
    {
        $this->zaciatok = $zaciatok;
    }

    /**
     * @return mixed
     */
    public function getKoniec()
    {
        return $this->koniec;
    }

    /**
     * @param mixed $koniec
     */
    public function setKoniec($koniec): void
    {
        $this->koniec = $koniec;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getNazov()
    {
        return $this->nazov;
    }

    /**
     * @param mixed $nazov
     */
    public function setNazov($nazov): void
    {
        $this->nazov = $nazov;
    }


}