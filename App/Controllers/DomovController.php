<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Pouzivatel;
use App\Models\RezervaciaPriestor;

/**
 * Class DomovController
 * Example class of a controller
 * @package App\Controllers
 */
class DomovController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function kontakty(): Response
    {
        return $this->html();
    }

    public function treningy(): Response {
        return $this->html();
    }

    public function priestory(): Response {
        return $this->html();
    }

    public function otazkyOdpovede(): Response {
        return $this->html();
    }

    public function pouzivatelia(): Response {
        //vytiahnut vsetky rezervacie
        $pouzivatelia = Pouzivatel::getAll(orderBy: "email");
        return $this->html(['pouzivatelia' => $pouzivatelia]);
    }
}