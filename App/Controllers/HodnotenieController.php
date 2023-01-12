<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Hodnotenie;

class HodnotenieController extends AControllerBase
{
    public function index(): Response
    {

        //$hodnotenia_skupina = Hodnotenie::getAll(whereClause: "topic = 'Sku_trening'");

        return $this->html();
    }

    public function skupIndividTrening(): Response
    {
        $hodnotenia_individual = Hodnotenie::getAll(whereClause: "topic = 'Ind_trening'");
        return $this->html(['Ind_trening' => $hodnotenia_individual]);
    }

    public function addComment() {
        //TODO dorobit topic aby sa spravne pridal a spravny view
        return $this->html(['hodnotenie' => new Hodnotenie(),'topic' => null],viewName: 'create.form');
    }
}