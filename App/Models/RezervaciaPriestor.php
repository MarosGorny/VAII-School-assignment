<?php

namespace App\Models;

use App\Core\Model;

class RezervaciaPriestor extends Model
{
    protected $id;
    protected $den;
    protected $zacitok;
    protected $koniec;

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
    public function getZacitok()
    {
        return $this->zacitok;
    }

    /**
     * @param mixed $zacitok
     */
    public function setZacitok($zacitok): void
    {
        $this->zacitok = $zacitok;
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


}