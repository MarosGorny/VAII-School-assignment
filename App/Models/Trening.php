<?php

namespace App\Models;

use App\Core\Model;

class Trening extends Model
{
    protected $id;
    protected $aktualnyPocet;
    protected $maximalnaKapacita;
    protected $topic;
    protected $opis;
    protected $termin;
    protected $potrebneVeci;
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
    public function getAktualnyPocet()
    {
        return $this->aktualnyPocet;
    }

    /**
     * @param mixed $aktualnyPocet
     */
    public function setAktualnyPocet($aktualnyPocet): void
    {
        $this->aktualnyPocet = $aktualnyPocet;
    }

    /**
     * @return mixed
     */
    public function getMaximalnaKapacita()
    {
        return $this->maximalnaKapacita;
    }

    /**
     * @param mixed $maximalnaKapacita
     */
    public function setMaximalnaKapacita($maximalnaKapacita): void
    {
        $this->maximalnaKapacita = $maximalnaKapacita;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic): void
    {
        $this->topic = $topic;
    }

    /**
     * @return mixed
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param mixed $opis
     */
    public function setOpis($opis): void
    {
        $this->opis = $opis;
    }

    /**
     * @return mixed
     */
    public function getTermin()
    {
        return $this->termin;
    }

    /**
     * @param mixed $termin
     */
    public function setTermin($termin): void
    {
        $this->termin = $termin;
    }

    /**
     * @return mixed
     */
    public function getPotrebneVeci()
    {
        return $this->potrebneVeci;
    }

    /**
     * @param mixed $potrebneVeci
     */
    public function setPotrebneVeci($potrebneVeci): void
    {
        $this->potrebneVeci = $potrebneVeci;
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