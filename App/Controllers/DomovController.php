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

        //Metody ktore sa ukazu ked sa odhlasim/prihlasim
        switch ($action) {
            case "delete":
            case "create":
            case "store":
            case "edit":
            case"getUsers" :
                return $this->app->getAuth()->isLogged();
            case "pouzivatelia":
            case "changeRole":
                return $this->app->getAuth()->isAdmin();
        }
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

    public function pouzivatelia(): Response {
        $pouzivatelia = Pouzivatel::getAll(orderBy: "email");
        return $this->html(['pouzivatelia' => $pouzivatelia]);
    }

    public function getUsers(): Response {
        $pouzivateliaHladat = null;

        if($this->request()->isAjax()) {
            $input = $this->request()->getValue('text');

            $pouzivateliaHladat = Pouzivatel::getAll(whereClause: "email LIKE '{$input}%' OR id LIKE'{$input}%'",orderBy: "email");
            if(empty($pouzivateliaHladat)) {
                echo "<h6 class='text-danger text-center mt-3'>Žiadne dáta sa nenašli</h6>";?><?php
            }

            if(!empty($pouzivateliaHladat)) {
                return $this->html(['pouzivateliaHladat' => $pouzivateliaHladat]);
            } else {
                return $this->json(['success' => false]);
            }
        }

        return $this->html(['pouzivateliaHladat' => $pouzivateliaHladat]);
    }

    public function changeRole(): Response {
        $pouzivateliaHladat = null;

        if($this->request()->isAjax()) {
            $userId = $this->request()->getValue('pouzivatel_id');
            $role = $this->request()->getValue('role');

            if($role != null && $userId != null) {
                $pouzivatel = Pouzivatel::getOne($userId);

                $pouzivatel->setRole($role);
                $pouzivatel->save();
                return $this->json(['success' => true,'message' => "Používateľská rola zmenená"]);

            }

            return $this->json(['success' => false]);
        }

        return $this->html(['pouzivateliaHladat' => $pouzivateliaHladat]);
    }
}