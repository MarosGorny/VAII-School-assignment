<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\RezervaciaPriestor;

class RezervaciePriestorController extends AControllerBase
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

    public function index(): Response
    {
        //vytiahnut vsetky rezervacie
        $rezervacie = RezervaciaPriestor::getAll(orderBy: "den,zaciatok");
        return $this->html($rezervacie);
    }

    public function store() {

        //ak ma hodnotu id, tak editujem, inak vytvram novy post
        $id = $this->request()->getValue('id');

        $rezervaciaPriestor = ( $id ? RezervaciaPriestor::getOne($id) : new RezervaciaPriestor());

        //text je podla html atributu name
        $rezervaciaPriestor->setDen($this->request()->getValue('den'));
        $rezervaciaPriestor->setZacitok($this->request()->getValue('zaciatok'));
        $rezervaciaPriestor->setKoniec($this->request()->getValue('koniec'));


        if($this->request()->getValue('zaciatok') >= $this->request()->getValue('koniec')) {
            return $this->html(['rezervacia' => $rezervaciaPriestor, 'sprava' => "** Zaciatok nemoze byt neskor ako koniec **"],viewName: 'create.form');
        } else
        {
            $rezervaciaPriestor->save();
            return $this->redirect("?c=rezervaciePriestor");
        }


    }

    public function delete() {

        $id = $this->request()->getValue('id');

        $rezerviaciaNaVymazanie = RezervaciaPriestor::getOne($id);

        //ak tam je tak ju vymazem
        if($rezerviaciaNaVymazanie) {
            $rezerviaciaNaVymazanie->delete();
        }
        return $this->redirect("?c=rezervaciePriestor");
    }

    public function edit() {
        //najprv si musim post vytiahnut
        $id = $this->request()->getValue('id');


        $rezervaciaNaEdit = RezervaciaPriestor::getOne($id); //zislo by sa dorobit, ze co ak mi id neexistuje?

        return $this->html(['rezervacia' => $rezervaciaNaEdit,'sprava' => null], viewName: 'create.form');
    }

    public function create() {
        return $this->html(['rezervacia' => new RezervaciaPriestor(),'sprava' => null],viewName: 'create.form');
    }
}