<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Post;
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
        $rezervacie = RezervaciaPriestor::getAll();
        return $this->html($rezervacie);
        //return $this->html();
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
            echo "<script>alert('ZLE ');</script>";
            return $this->html($rezervaciaPriestor, viewName: 'create.form');
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

        return $this->html($rezervaciaNaEdit, viewName: 'create.form');
    }

    public function create() {
        return $this->html(new RezervaciaPriestor(),viewName: 'create.form');
    }
}