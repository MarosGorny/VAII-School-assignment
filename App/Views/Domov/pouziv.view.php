<?php

use App\Models\Pouzivatel;
///** @var App\Core\IAuthenticator $auth */
/** @var Pouzivatel[] $data */

$pouzivateliaHladat = $data['pouzivateliaHladat'];
//$pouzivatelia = $data['pouzivatelia'];
?>
<!---->
<!--<section class="container-fluid px-0">-->
<!--    <div class="row align-items-center justify-content-around mt-2">-->
<!--        <div class="text-center home-block">-->

            <ol class="list-group list-group-numbered pt-4">
                <?php
                foreach ($pouzivateliaHladat as $pouzivatel) { ?>
                    <li onchange="changeColor(this)" class="list-group-item"><?php echo $pouzivatel->getEmail();?>
                        <select class="form-select form-select-sm pouzivatelia" id="pouzivatelia" aria-label=".form-select-sm example">
                            <?php
                            $array = array("Admin","Trener","Klient");
                            $userRole = $pouzivatel->getRole();

                            foreach ($array as $index=>$role) {
                                if($role == $userRole) {
                                    echo "<option value=\"$role\" selected>$role</option>";
                                } else {
                                    echo "<option value=\"$role\" >$role</option>";
                                }
                            }
                            ?>
                        </select>
                    </li>
                <?php  }?>
            </ol>
<!--            <button type="button" class="btn btn-success mt-2">Potvrdiť zmeny</button>-->
<!---->
<!---->
<!--        </div>-->
<!--        <div class="text-left home-block">-->
<!---->
<!--            <input type="text" class="form-control" id="live_search" autocomplete="off"-->
<!--                   placeholder="Search">-->
<!--            <div id="searchresult"></div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!---->
<!--</section>-->
<!---->


