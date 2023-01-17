<?php

namespace App\Models;

use App\Core\Model;

class PrihlaseniPouzivatelia extends Model
{
    protected $id;
    protected $treningID;
    protected $userID;

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
    public function getTreningID()
    {
        return $this->treningID;
    }

    /**
     * @param mixed $treningID
     */
    public function setTreningID($treningID): void
    {
        $this->treningID = $treningID;
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
}