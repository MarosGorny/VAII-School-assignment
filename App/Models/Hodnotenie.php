<?php

namespace App\Models;

use App\Core\Model;

class Hodnotenie extends Model
{
    protected $id;
    protected $userID;
    protected $treningID;
    protected $text;
    protected $userEmail;
    protected $topic;
    protected $nickname;
    protected $rating;
    protected $date;


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
    public function getTreningID()
    {
        return $this->treningID;
    }

    /**
     * @param mixed $TreningID
     */
    public function setTreningID($TreningID): void
    {
        $this->treningID = $TreningID;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return utf8_decode($this->text);
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = utf8_encode($text);
        //$this->text = $text;
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
    public function getNickname()
    {
        return utf8_encode($this->nickname);
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname): void
    {
        $this->nickname = utf8_encode($nickname);
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {

        return date("d.m.Y", strtotime($this->date));
        //return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }
}