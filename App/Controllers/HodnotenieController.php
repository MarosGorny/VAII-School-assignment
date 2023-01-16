<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Hodnotenie;
use App\Models\RezervaciaPriestor;
use App\Models\Trening;

class HodnotenieController extends AControllerBase
{
    public function index(): Response
    {

        return $this->html();
    }

    public function store() {

        //ak ma hodnotu id, tak editujem, inak vytvram novy post
        $id = $this->request()->getValue('id');

        $hodnotenie = ( $id ? Hodnotenie::getOne($id) : new Hodnotenie());

        //text je podla html atributu name
        $hodnotenie->setText($this->request()->getValue('text'));
        $hodnotenie->setNickname($this->request()->getValue('nickname'));
        $hodnotenie->setTopic('Ind_trening');
        $hodnotenie->setRating($this->request()->getValue('rating'));
        $hodnotenie->setDate(date("Y-m-d"));
        $hodnotenie->setUserEmail($_SESSION['user']);



        $hodnotenie->save();

        return $this->redirect("?c=hodnotenie&a=skupIndividTrening");



    }


    public function skupIndividTrening(): Response
    {
        $hodnotenia_ind_sku = Hodnotenie::getAll(whereClause: "topic = 'Ind_trening' OR topic = 'Sku_trening'", limit: 3, orderBy: 'date DESC');
        return $this->html(['Ind_Sku_trening' => $hodnotenia_ind_sku]);
    }

    public function silovyTrening(): Response
    {
        $topicWhere = "topic = 'Sil_trening'";
        $hodnotenia_silovy = Hodnotenie::getAll(whereClause: $topicWhere, limit: 3, orderBy: 'date DESC');
        $trening_silovy = Trening::getOne('Sil_trening');
        return $this->html(['Hodnotenie' => $hodnotenia_silovy,'Trening' => $trening_silovy],viewName: 'vsetkyTreningy');
    }

    public function kondicnyTrening(): Response
    {
        $topicWhere = "topic = 'Kon_trening'";
        $hodnotenia_silovy = Hodnotenie::getAll(whereClause: $topicWhere, limit: 3, orderBy: 'date DESC');
        $trening_silovy = Trening::getOne('Kon_trening');
        return $this->html(['Hodnotenie' => $hodnotenia_silovy,'Trening' => $trening_silovy],viewName: 'vsetkyTreningy');
    }

    public function funkcnyTrening(): Response
    {
        $topicWhere = "topic = 'Fun_trening'";
        $hodnotenia_silovy = Hodnotenie::getAll(whereClause: $topicWhere, limit: 3, orderBy: 'date DESC');
        $trening_silovy = Trening::getOne('Fun_trening');
        return $this->html(['Hodnotenie' => $hodnotenia_silovy,'Trening' => $trening_silovy],viewName: 'vsetkyTreningy');
    }

    public function getTwoMoreReviews():Response {

        if($this->request()->isAjax()) {
            $count = $this->request()->getValue('count');
            return $this->json(Hodnotenie::getAll(limit: 2,offset: $count,orderBy: "date DESC"));
        } else {
            return $this->json(Hodnotenie::getAll(orderBy: "date DESC"));
        }
    }

}