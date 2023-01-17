<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Hodnotenie;
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
            case "update":
                return $this->app->getAuth()->isLogged();
        }
        return true;
    }



    public function index(): Response
    {
        $trenings = Trening::getAll(orderBy: 'id');
        if ($trenings == null) {
            // TODO Treba osetrit
            return $this->redirect("?c=trening");
        }

        return $this->html($trenings);
    }

    public function update() {

        $id = $this->request()->getValue('id');
        $postToEdit = Trening::getOne($id); //zislo by sa dorobit, ze co ak mi id neexistuje?

        if ($postToEdit == null) {
            return $this->redirect("?c=trening");
        }

        //text je podla toho ako sme ho nastavili v name
        //<input type="text" name="text">
        $postToEdit->setAktualnyPocet($this->request()->getValue('pocet'));
        $postToEdit->setMaximalnaKapacita($this->request()->getValue('kapacita'));
        $postToEdit->save();
        return $this->redirect("?c=trening");
    }




}