<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Hodnotenie;
use App\Models\Pouzivatel;
use App\Models\Trening;

class HodnotenieController extends AControllerBase
{
    public function authorize(string $action)
    {
        switch ($action) {
            case "delete":
            case "store":
            case "edit":
            case "saveReview":
                return $this->app->getAuth()->isLogged();
        }
        return true;
    }


    public function index(): Response
    {
        return $this->html();
    }

    public function edit() {

        if($this->request()->isAjax()) {
            $newNickname = $this->request()->getValue('newNickname');
            $newComment = $this->request()->getValue('newComment');
            $commentId = $this->request()->getValue('commentId');

            if($newComment != null && $newNickname != null) {
                $hodnotenie = Hodnotenie::getOne($commentId);
                $hodnotenie->setText($newComment);
                $hodnotenie->setNickname($newNickname);
                $hodnotenie->save();

                $response =['status' => 'success', 'message' => 'Hodnotenie úspešne aktualizované',"newNickname" => $newNickname, 'newComment' => $newComment];
            } else {
                $response =['status' => 'error', 'message' => 'Chyba pri aktualizovaní hodnotenia',"newNickname" => $newNickname, 'newComment' => $newComment];
            }

            return $this->json($response);
        }


    }

    public function delete() {

        if($this->request()->isAjax()) {
            $id = $this->request()->getValue('id');
            $hodnotenieNaVymazanie = Hodnotenie::getOne($id);
            if (!empty($hodnotenieNaVymazanie)) {
                $hodnotenieNaVymazanie->delete();
                return $this->json(['success' => true, 'message' => 'Hodnotenie vymazané úspešne.']);
            } else {
                return $this->json(['success' => false, 'message' => 'Chyba pri vymazávaní hodnotenia.']);
            }

        } else {
            $deleteGet = $this->request()->getValue('delete');
            $urlParam = $this->request()->getValue('urlParam');
            if($deleteGet != null) {
                $id = $this->request()->getValue('id');

                $hodnotenieNaVymazanie = Hodnotenie::getOne($id);

                if($hodnotenieNaVymazanie) {
                    $hodnotenieNaVymazanie->delete();
                }
            }
            if($urlParam != null) {
                $redirectValue = "?c=hodnotenie&a=$urlParam";
            } else {
                $redirectValue = "?c=domov";
            }

            return $this->redirect($redirectValue);
        }
    }

    public function store() {

        //ak ma hodnotu id, tak editujem, inak vytvram novy post
        $id = $this->request()->getValue('id');

        $hodnotenie = ( $id ? Hodnotenie::getOne($id) : new Hodnotenie());

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
        $ind = 1;
        $sku = 2;


        $hodnotenia_ind_sku = Hodnotenie::getAll(whereClause: "treningID = '$ind' OR treningID = '$sku'", limit: 3, orderBy: 'date DESC');
        $trening_ind = Trening::getOne($ind);
        //TODO dorobit aby som passol aj druhy trening a radiobutton pri submite hodnotenia podla toho aky trening
        return $this->html(['Hodnotenie' => $hodnotenia_ind_sku, 'Trening' => $trening_ind,'param' => "skupIndividTrening"],viewName: 'vsetkyTreningy');
    }

    public function silovyTrening(): Response
    {
        $sil = 3;
        $topicWhere = "treningId = '$sil'";
        $hodnotenia_silovy = Hodnotenie::getAll(whereClause: $topicWhere, limit: 3, orderBy: 'date DESC');
        $trening_silovy = Trening::getOne($sil);
        return $this->html(['Hodnotenie' => $hodnotenia_silovy,'Trening' => $trening_silovy,'param' => "silovyTrening"],viewName: 'vsetkyTreningy');
    }

    public function kondicnyTrening(): Response
    {
        $kon = 4;
        $topicWhere = "treningId = '$kon'";
        $hodnotenia_silovy = Hodnotenie::getAll(whereClause: $topicWhere, limit: 3, orderBy: 'date DESC');
        $trening_silovy = Trening::getOne($kon);
        return $this->html(['Hodnotenie' => $hodnotenia_silovy,'Trening' => $trening_silovy,'param' => "kondicnyTrening"],viewName: 'vsetkyTreningy');
    }

    public function funkcnyTrening(): Response
    {
        $fun = 4;
        $topicWhere = "treningId = '$fun'";
        $hodnotenia_silovy = Hodnotenie::getAll(whereClause: $topicWhere, limit: 3, orderBy: 'date DESC');
        $trening_silovy = Trening::getOne($fun);
        return $this->html(['Hodnotenie' => $hodnotenia_silovy,'Trening' => $trening_silovy,'param' => "funkcnyTrening"],viewName: 'vsetkyTreningy');
    }

    public function getTwoMoreReviews():Response {

        if($this->request()->isAjax()) {
            $count = $this->request()->getValue('count');
            $id = $this->request()->getValue('id');
            $topicWhere = "treningId = '$id'";
            return $this->json(Hodnotenie::getAll( whereClause: $topicWhere,limit: 2,offset: $count,orderBy: "date DESC"));
        } else {
            return $this->json(Hodnotenie::getAll(orderBy: "date DESC"));
        }
    }

    public function saveReview(): Response {
        $id = $this->request()->getValue('id');
        if($this->request()->isAjax()) {

            $nickname = $this->request()->getValue('nickname');
            $email = $this->request()->getValue('email');
            $text = $this->request()->getValue('text');
            $rating = $this->request()->getValue('rating');
            $userEmail = $_SESSION['user'];

            $whereClause = "email = '$userEmail'";
            $userID = Pouzivatel::getAll(whereClause: $whereClause);
            $treningID = Trening::getOne($id);



            $hodnotenie = new Hodnotenie();

            $hodnotenie->setUserID($userID[0]->getId());
            $hodnotenie->setTreningID($treningID->getId());
            $hodnotenie->setNickname($nickname);
            $hodnotenie->setUserEmail($userEmail);
            $hodnotenie->setText($text);
            $hodnotenie->setRating($rating);
            $hodnotenie->setDate(date("Y-m-d"));

            $hodnotenie->save();
        }
        return $this->json("");
    }

}