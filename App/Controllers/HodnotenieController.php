<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Hodnotenie;
use App\Models\RezervaciaPriestor;

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
        $hodnotenia_ind_sku = null;
        if($this->request()->isAjax()) {
            $commentNewCount = $this->request()->getValue('commentNewCount');
            $hodnotenia_ind_sku = Hodnotenie::getAll(whereClause: "topic = 'Ind_trening' OR topic = 'Sku_trening'", limit: $commentNewCount);

            return $this->html(['Ind_Sku_trening' => $hodnotenia_ind_sku],viewName: 'hodnotenia');
        } else {
            $hodnotenia_ind_sku = Hodnotenie::getAll(whereClause: "topic = 'Ind_trening' OR topic = 'Sku_trening'", limit: 2);
        }

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

    public function addComment(): Response {


//        echo "Hello";
        if($this->request()->isAjax()) {
            echo '<script>alert("AJAX")</script>';
        } else {
            echo '<script>alert("NOT AJAX")</script>';
        }
        return $this->html();

        //TODO dorobit topic aby sa spravne pridal a spravny view
        //zakomentoval som len kvoli ajaxu hore
        //return $this->html(['hodnotenie' => new Hodnotenie(),'topic' => null],viewName: 'create.form');
    }

    public function showComments(): Response {
        if($this->request()->isAjax()) {
            $commentNewCount = $this->request()->getValue('commentNewCount');
            $hodnotenia_ind_sku = Hodnotenie::getAll(whereClause: "topic = 'Ind_trening' OR topic = 'Sku_trening'", limit: $commentNewCount);

            if(!empty($hodnotenia_ind_sku)) { ?>
                <?php foreach ($hodnotenia_ind_sku as $hodnotenie) { ?>
                    <div>
                    <div id="comments" class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $hodnotenie->getNickname();?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $hodnotenie->getDate();?></h6>
                            <p class="card-text"><?php echo $hodnotenie->getText(); ?></p>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <button id="show_more_comments">Show more comments</button>
            <?php } else { ?>
                <p> There are no comments !</p>
            <?php }
            return $this->html(['Ind_Sku_trening' => $hodnotenia_ind_sku]);
        }
        return $this->html();
    }
}