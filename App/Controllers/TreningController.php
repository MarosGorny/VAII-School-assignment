<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Post;
use App\Models\RezervaciaPriestor;
use App\Models\Trening;

class TreningController extends AControllerBase
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
                return $this->app->getAuth()->isLogged();
        }
        return true;
    }

    public function index(): Response
    {
        $trenings = Trening::getAll(orderBy: 'id');
        return $this->html($trenings);
    }

    public function update() {

        $id = $this->request()->getValue('id');
        $postToEdit = Trening::getOne($id); //zislo by sa dorobit, ze co ak mi id neexistuje?
        //text je podla toho ako sme ho nastavili v name
        //<input type="text" name="text">
        $postToEdit->setAktualnyPocet($this->request()->getValue('pocet'));
        $postToEdit->setMaximalnaKapacita($this->request()->getValue('kapacita'));
        $postToEdit->save();
        return $this->redirect("?c=trening");
    }

    public function navysPocet() {
        //najprv si musim post vytiahnut
        $id = $this->request()->getValue('id');
        $postToEdit = Trening::getOne($id); //zislo by sa dorobit, ze co ak mi id neexistuje?
        $postToEdit->navysPocet();
        $postToEdit->save();


        return $this->redirect($postToEdit);
    }

    public function pridajKapacitu() {
        $id = $this->request()->getValue('id');
    }

}