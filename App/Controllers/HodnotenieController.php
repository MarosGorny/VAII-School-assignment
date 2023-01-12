<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Hodnotenie;

class HodnotenieController extends AControllerBase
{
    public function index(): Response
    {



        return $this->html();
    }

    public function skupIndividTrening(): Response
    {
        $hodnotenia_ind_sku = Hodnotenie::getAll(whereClause: "topic = 'Ind_trening' OR topic = 'Sku_trening'");
        return $this->html(['Ind_Sku_trening' => $hodnotenia_ind_sku]);
    }

    public function silovyTrening(): Response
    {
        $hodnotenia_silovy = Hodnotenie::getAll(whereClause: "topic = 'Sil_trening'");
        return $this->html(['Sil_trening' => $hodnotenia_silovy]);
    }

    public function kondicnyTrening(): Response
    {
        $hodnotenia_kondicny = Hodnotenie::getAll(whereClause: "topic = 'Kon_trening'");
        return $this->html(['Kon_trening' => $hodnotenia_kondicny]);
    }

    public function funkcnyTrening(): Response
    {
        $hodnotenia_funkcny = Hodnotenie::getAll(whereClause: "topic = 'Fun_trening'");
        return $this->html(['Fun_trening' => $hodnotenia_funkcny]);
    }

    public function addComment() {
        //TODO dorobit topic aby sa spravne pridal a spravny view
        return $this->html(['hodnotenie' => new Hodnotenie(),'topic' => null],viewName: 'create.form');
    }
}