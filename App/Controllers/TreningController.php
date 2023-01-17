<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Hodnotenie;
use App\Models\Pouzivatel;
use App\Models\PrihlaseniPouzivatelia;
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

    public function prihlasSa() : Response {
        if($this->request()->isAjax()) {
            $treningId = $this->request()->getValue('training_id');
            $pouzivatelEmail = $this->request()->getValue('pouzivatel_email');

            $trening = Trening::getOne($treningId);
            $whereClause = "email = '$pouzivatelEmail'";
            $pouzivatel = Pouzivatel::getAll(whereClause: $whereClause,limit: 1);
            $pouzivatelId = $pouzivatel[0]->getId();

            $whereClause = "userID = '$pouzivatelId' AND treningID = '$treningId'";
            if(!empty(PrihlaseniPouzivatelia::getAll(whereClause: $whereClause))) {
                return $this->json(['success' => false, 'message' => 'Already present.']);
            }

            if(!empty($trening) && !empty($pouzivatel)) {
                $prihlasenie = new PrihlaseniPouzivatelia();
                $prihlasenie->setTreningID($treningId);
                $prihlasenie->setUserID($pouzivatelId);
                $prihlasenie->save();

                return $this->json(['success' => true, 'message' => 'Signed up successfully.']);
            }


             return $this->json(['success' => false, 'message' => 'Signed up unsuccessfully.']);


        } else {
            return $this->index();
        }

    }




}