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
        $trening_ind = Trening::getOne('Ind_trening');
        //TODO dorobit aby som passol aj druhy trening a radiobutton pri submite hodnotenia podla toho aky trening
        return $this->html(['Hodnotenie' => $hodnotenia_ind_sku, 'Trening' => $trening_ind],viewName: 'vsetkyTreningy');
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

    public function saveReview(): Response {
        $topic = $this->request()->getValue('topic');
        if($this->request()->isAjax()) {

            $nickname = $this->request()->getValue('nickname');
            $email = $this->request()->getValue('email');
            $text = $this->request()->getValue('text');
            $rating = $this->request()->getValue('rating');


            $id = $this->request()->getValue('id');

            $hodnotenie = new Hodnotenie();

            //text je podla html atributu name
            $hodnotenie->setNickname($nickname);
            $hodnotenie->setUserEmail($_SESSION['user']);
            $hodnotenie->setText($text);
            $hodnotenie->setRating($rating);
            $hodnotenie->setTopic($topic);
            $hodnotenie->setDate(date("Y-m-d"));

            $hodnotenie->save();
        }
        if($topic == "Ind_trening" || $topic == "Sku_trening") {
            return $this->json("");
        } else {
            return $this->json("");
        }



    }

}