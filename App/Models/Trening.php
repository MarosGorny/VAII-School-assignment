<?php

namespace App\Models;

use App\Core\Model;

class Trening extends Model
{
    protected $id;
    protected $aktualnyPocet;
    protected $maximalnaKapacita;

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

    public function navysPocet() {
        $this->aktualnyPocet++;
    }

    public function znicPocet() {
        $this->aktualnyPocet--;
    }



}