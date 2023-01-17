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
            case "odhlasSa":
            case "prihlasSa":
                return $this->app->getAuth()->isLogged();
        }
        return true;
    }



    public function index(): Response
    {
        $data[] = Trening::getAll(orderBy: 'id');
        $data[] = Pouzivatel::getAll();
        $data[] = PrihlaseniPouzivatelia::getAll();
        if ($data[0] == null || $data[1] == null) {
            return $this->redirect("?c=trening");
        }

        return $this->html($data);
    }

    public function update() {

        $id = $this->request()->getValue('id');
        $postToEdit = Trening::getOne($id);
        if ($postToEdit == null) {
            return $this->redirect("?c=trening");
        }

        $postToEdit->setAktualnyPocet($this->request()->getValue('pocet'));
        $postToEdit->setMaximalnaKapacita($this->request()->getValue('kapacita'));
        $postToEdit->save();
        return $this->redirect("?c=trening");
    }

    public function odhlasSa() : Response {
        if($this->request()->isAjax()) {
            $treningId = $this->request()->getValue('training_id');
            $pouzivatelEmail = $this->request()->getValue('pouzivatel_email');

            $trening = Trening::getOne($treningId);
            $whereClause = "email = '$pouzivatelEmail'";
            $pouzivatel = Pouzivatel::getAll(whereClause: $whereClause,limit: 1);
            $pouzivatelId = $pouzivatel[0]->getId();

            $whereClause = "userID = '$pouzivatelId' AND treningID = '$treningId'";
            $zaznam = PrihlaseniPouzivatelia::getAll(whereClause: $whereClause);
            if(empty($zaznam)) {
                return $this->json(['success' => false, 'message' => 'Tréning sa nenašiel.']);
            }

            if(!empty($trening) && !empty($pouzivatel)) {
                $zaznam[0]->delete();

                $trening->setAktualnyPocet($trening->getAktualnyPocet()-1);
                $trening->save();

                return $this->json(['success' => true, 'message' => 'Úspešne odhlasený.']);
            }


            return $this->json(['success' => false, 'message' => 'Niečo nie je v poriadku.']);


        } else {
            return $this->index();
        }
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
                return $this->json(['success' => false, 'message' => 'Už si prihlásený.']);
            }
            if($trening->getAktualnyPocet() >= $trening->getMaximalnaKapacita() ) {
                return $this->json(['success' => false, 'message' => 'Plná kapacita.']);
            }

            if(!empty($trening) && !empty($pouzivatel)) {
                $prihlasenie = new PrihlaseniPouzivatelia();
                $prihlasenie->setTreningID($treningId);
                $prihlasenie->setUserID($pouzivatelId);
                $prihlasenie->save();

                $trening->setAktualnyPocet($trening->getAktualnyPocet()+1);
                $trening->save();

                return $this->json(['success' => true, 'message' => 'Úspešne prihlásený.']);
            }


             return $this->json(['success' => false, 'message' => 'Prihlásanie sa nepodarilo.']);


        } else {
            return $this->index();
        }

    }




}