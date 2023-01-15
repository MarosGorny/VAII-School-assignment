<?php ///** @var Array $data */

use App\Models\Pouzivatel;
///** @var App\Core\IAuthenticator $auth */
/** @var Pouzivatel[] $data */

//$pouzivatelia = $data['pouzivateliaHladat'];
$pouzivatelia = $data['pouzivatelia'];
?>


<section class="container-fluid px-0">
    <div class="row  justify-content-around mt-2">
        <div class="text-center home-block">

            <ol class="list-group list-group-numbered">
                <?php
                foreach ($pouzivatelia as $pouzivatel) { ?>
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
            <button type="button" class="btn btn-success mt-2">Potvrdiť zmeny</button>


       </div>
        <div class="text-left home-block top-0">

            <input type="text" class="form-control top-0" id="live_search" autocomplete="off"
                   placeholder="Search">
            <div id="searchresult"></div>

        </div>

    </div>


</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var request = null;

    $(document).ready(function () {
        //min dlzka na zacanie hladania
        var minLength = 2;

        $("#live_search").keyup(function() {
            //ked keyup, tak daj to textu
            var oldValue = this;
            var text = $(this).val();


            if(text !== "") {
                $("#searchresult").css("display","inline");
                if(text.length >= minLength) {
                    //Ak tam ostal request(minuly), tak ho zabije
                    if(request != null)
                        request.abort();
                    request = $.ajax({
                        url: '?c=domov&a=pouziv',
                        method:"POST",
                        data:{text:text},

                        success:function (data) {

                            if (text===$(oldValue).val()) {
                                $("#searchresult").html(data);
                            }

                        }
                    })
                }
            } else {
                $("#searchresult").css("display","none");
            }
        });
    });
</script>


