<?php

use App\Models\Pouzivatel;

/** @var Pouzivatel[] $data */

$pouzivatelia = $data['pouzivatelia'];
?>


<section class="container-fluid px-0 text-center">
    <div class="row  justify-content-around mt-2">
        <div class="text-center home-block pl-4 ml-md-3 ml-lg-0">
            <h2> Všetci používatelia</h2>
            <ol class="list-group list-group-numbered">
                <?php foreach ($pouzivatelia as $pouzivatel) { ?>
                    <li class="list-group-item"
                        data-pouzivatel-id="<?php echo $pouzivatel->getId(); ?>"><?php echo "[" . $pouzivatel->getId() . "]" . $pouzivatel->getEmail(); ?>
                        <select onclick="changeColor(this)" class="form-select form-select-sm pouzivatelia"
                                id="pouzivatelia" aria-label=".form-select-sm example">
                            <?php
                            $array = array("Admin", "Trener", "Klient");
                            $userRole = $pouzivatel->getRole();

                            foreach ($array as $index => $role) {
                                if ($role == $userRole) {
                                    echo "<option value='$role' selected>$role</option>";
                                } else {
                                    echo "<option value='$role'>$role</option>";
                                }
                            }
                            ?>
                        </select>
                    </li>
                <?php } ?>
            </ol>
        </div>
        <div class="search-div text-left home-block ">
            <input type="text" class="form-control top-0 mt-4 pt-sm-3 mt-md-0" id="live_search" autocomplete="off"
                   placeholder="Zadaj userId alebo email">
            <div id="searchresult"></div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../../../public/js/vyhladavaniePouzivatelov.js"></script>

