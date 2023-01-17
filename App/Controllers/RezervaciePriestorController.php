<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Pouzivatel;
use App\Models\RezervaciaPriestor;
use App\Models\Trening;

class RezervaciePriestorController extends AControllerBase
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
        //vytiahnut vsetky rezervacie
        $rezervacie_pondelok = RezervaciaPriestor::getAll(whereClause: "den = 'Pondelok'" ,orderBy: "zaciatok");
        $rezervacie_utorok = RezervaciaPriestor::getAll(whereClause: "den = 'Utorok'");
        $rezervacie_streda = RezervaciaPriestor::getAll(whereClause: "den = 'Streda'");
        $rezervacie_stvrtok = RezervaciaPriestor::getAll(whereClause: "den = 'Stvrtok'");
        $rezervacie_piatok = RezervaciaPriestor::getAll(whereClause: "den = 'Piatok'");
        $pouzivatelia = Pouzivatel::getAll();
        return $this->html(['pondelok' => $rezervacie_pondelok,'utorok' => $rezervacie_utorok , 'streda' => $rezervacie_streda,
            'stvrtok' => $rezervacie_stvrtok, 'piatok' => $rezervacie_piatok,
            'pouzivatela' => $pouzivatelia
        ]);
    }

    public function store() {

        //ak ma hodnotu id, tak editujem, inak vytvram novy post
        $id = $this->request()->getValue('id');

        $rezervaciaPriestor = ( $id ? RezervaciaPriestor::getOne($id) : new RezervaciaPriestor());

        //text je podla html atributu name
        $rezervaciaPriestor->setDen($this->request()->getValue('den'));
        $rezervaciaPriestor->setNazov($this->request()->getValue('nazov'));
        $rezervaciaPriestor->setZacitok($this->request()->getValue('zaciatok'));
        $rezervaciaPriestor->setKoniec($this->request()->getValue('koniec'));

        $pouzivatelEmail = $this->request()->getValue('pouzivatel_email');

        $whereClause = "email = '$pouzivatelEmail'";
        $pouzivatel = Pouzivatel::getAll(whereClause: $whereClause,limit: 1);
        $pouzivatelId = $pouzivatel[0]->getId();
        $rezervaciaPriestor->setUserID($pouzivatelId);


        if($this->request()->getValue('zaciatok') >= $this->request()->getValue('koniec')) {
            return $this->html(['rezervacia' => $rezervaciaPriestor, 'sprava' => "** Zaciatok nemoze byt neskor ako koniec **"],viewName: 'create.form');
        } else
        {
            $rezervaciaPriestor->save();
            return $this->redirect("?c=rezervaciePriestor");
        }


    }

    public function delete() {

        $deleteGet = $this->request()->getValue('delete');
        if($deleteGet != null) {
            $id = $this->request()->getValue('id');

            $rezerviaciaNaVymazanie = RezervaciaPriestor::getOne($id);

            //ak tam je tak ju vymazem
            if($rezerviaciaNaVymazanie) {
                $rezerviaciaNaVymazanie->delete();
            }
        }

        return $this->redirect("?c=rezervaciePriestor");
    }

    public function edit() {
        //najprv si musim post vytiahnut
        $id = $this->request()->getValue('id');


        $rezervaciaNaEdit = RezervaciaPriestor::getOne($id); //zislo by sa dorobit, ze co ak mi id neexistuje?

        if($rezervaciaNaEdit == null) {
            return $this->redirect("?c=rezervaciePriestor");
        }

        return $this->html(['rezervacia' => $rezervaciaNaEdit,'sprava' => null], viewName: 'create.form');
    }

    public function create() {
        return $this->html(['rezervacia' => new RezervaciaPriestor(),'sprava' => null],viewName: 'create.form');
    }
}