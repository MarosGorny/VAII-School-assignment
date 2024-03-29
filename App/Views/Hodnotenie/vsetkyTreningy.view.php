<?php

use App\Models\Hodnotenie;
use App\Models\Trening;
use App\Core\IAuthenticator;

/** @var IAuthenticator $auth */
/** @var $data */
/** @var Hodnotenie[] $hodnotenia */
/** @var Trening[] $hodnotenia */
/** @var String $param_url */

$hodnotenia = $data['Hodnotenie'];
$trening = $data['Trening'];
$param_url = $data['param'];

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../../../public/js/vsetkyTreningy.js"></script>

<script>
    var offset = 3;

    function nacitajHodnotenia($zhora = false) {
        $.ajax({
            url: '?c=Hodnotenie&a=getTwoMoreReviews',
            method: "GET",
            data: {
                count: offset,
                id: '<?php echo $trening->getId() ?>'
            },
            success: function (data) {

                if (data.length !== 0) {
                    data.forEach(element => {

                        element.nickname = decodeURIComponent(escape(element.nickname));
                        element.text = decodeURIComponent(escape(element.text));


                        element.date = convertDate(element.date);

                        let $comments = $(`
                            <div id="comments">
                                <div class="card my-2">
                                    <div class="card-body">
                                        <h5 class="card-title">${element.nickname}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">${element.rating}/5 - ${element.date}</h6>
                                        <p class="card-text">${element.text}</p>
                                        <div class="text-right hodnotenie-delete">
                                            <form method="post" action="?c=hodnotenie&a=delete&id=${element.id}">
<!--                                                <button name="delete" value="delete" type="submit" class="btn btn-danger px-3">-->
<!--                                                    <i class="fa fa-trash-o"></i>-->
<!--                                                </button>-->
                                                <input type="hidden" id="trening-topic" name="topic" value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                        if (!$zhora) {
                            $comments.insertBefore($('#show_more_comments'));
                        } else {
                            $comments.insertAfter($('#hodnotenia-header'));
                        }

                    });
                    offset += data.length;
                    if (data.length < 2) {
                        document.getElementById("show_more_comments").style.display = "none";
                    }
                } else {
                    document.getElementById("show_more_comments").style.display = "none";
                }
            }
        })
    }





    //POST HODNOTENIE AJAX
    <?php if($auth->isLogged()) { ?>
    $(document).ready(function () {
        $('#hodnotenie-form').submit(function (e) {
            e.preventDefault();
            var nickname = $('#nickname-id').val();
            var text = $('#text-id').val();
            var submitButton = $('#hodnotenie-submit').val();
            var rating = getActiveCount();
            if (submitHodnotenieCheck()) {
                $.ajax({
                    type: 'POST',
                    url: '?c=Hodnotenie&a=saveReview',
                    data: {
                        nickname: nickname,
                        email: '<?php echo $auth->getLoggedUserName(); ?>',
                        text: text,
                        rating: rating,
                        id: '<?php echo $trening->getId() ?>'
                    },
                    success: function (response) {
                        $('#nickname-id').val('');
                        $('#text-id').val('');
                        vymazRating();
                        document.getElementById("form-message").innerHTML = "Hodnotenie sa odoslalo.";
                        nacitajHodnotenia();
                    }
                })
            }

        });
    });
    <?php } ?>

</script>

<!--<script src="../../../public/js/vyhladavaniePouzivatelov.js"></script>-->

<div id="results"></div>
<section class="container-fluid px-0">
    <div class="row align-items-center content">

        <div class="col-md-6 order-2 order-md-1 home-block text-left">
            <div class="col-10 col-lg-8  mb-5 mb-md-0 home-block home-page-text">
                <h2>Kedy?</h2>
                <p class="lead"><?php echo $trening->getTermin() ?></p>
                <h2>Čo k tomu potrebujem?</h2>
                <p class="lead"><?php echo $trening->getPotrebneVeci() ?></p>
            </div>
        </div>

        <div class="col-md-6 text-center order-1 order-md-2 ">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8  mb-5 mb-md-0 home-block home-page-text">
                    <?php if ($trening->getTopic() == 'Ind_trening' || $trening->getTopic() == 'Sku_trening') { ?>
                        <h1>Samostatné individuálne tréningy tréning</h1>
                        <p class="lead">Výhodou pri osobných tréningoch je, že v priestore sa nachádzate iba vy a
                            tréner.</p>
                        <h1>Skupinové tréningy</h1>
                        <p class="lead">Individuálne tréningy s naším trénerom si viete dohodnúť aj ako skupina.</p>
                    <?php } else { ?>
                        <h1><?php echo $trening->getNazov() ?></h1>
                        <p class="lead"><?php echo $trening->getOpis() ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="home-block home-page-text hodnotenie-div">
        <h1 id="#hodnotenia-header" class="text-center">Hodnotenia</h1>
    </div>

    <div id="comments">
        <?php if (!empty($hodnotenia)) { ?>
        <?php foreach ($hodnotenia as $hodnotenie) { ?>
            <div class="card my-2">
                <div class="card-body ">
                    <h5 class="card-title nickname-text"><?php echo $hodnotenie->getNickname(); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $hodnotenie->getRating(). "/5 - " . $hodnotenie->getDate(); ?></h6>
                    <p class="card-text comment-text"
                       data-id="<?php echo $hodnotenie->getId(); ?>"><?php echo $hodnotenie->getText(); ?></p>
                    <?php if ($auth->isAdmin() || ($auth->isLogged() && ($auth->getLoggedUserName() == $hodnotenie->getUserEmail()))) { ?>
                        <div class="text-right hodnotenie-delete">
                            <button class="btn btn-warning px-3 edit-comment"><i class="fa fa-pencil"></i></i></button>
                            <button class="btn btn-danger px-3 delete-comment-btn"><i class="fa fa-trash-o"></i>
                            </button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <a id="show_more_comments" class="infobtn mb-2 btn btn-outline-secondary btn-lg btn-block rounded-0" role="button">Načítaj
        viac hodnotení</a>
    <?php } else { ?>
        <p> Zatiaľ žiadne hodnotenia!</p>
    <?php } ?>
    </div>


    <?php if ($auth->isLogged()) { ?>
        <section class="container-fluid">
            <div class="my-0 py-0">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card">
                            <form id="hodnotenie-form" method="post">
                                <!--                            <form method="post" action="?c=Hodnotenie&a=store">-->
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <div>
                                            <!--                                        --><?php //echo $auth->getLoggedUserName(); ?>
                                            <input id="nickname-id" type="text" name="nickname" class="form-control"
                                                   placeholder="Tvoje meno" required">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer py-3 border-0">
                                    <div class="d-flex flex-start w-100">
                                        <div class="form-outline w-100">
                                        <textarea class="form-control" id="text-id" rows="4"
                                                  style="background: #fff;" name="text"></textarea>
                                            <h6 id="form-message" class='text-danger text-center mt-3'></h6>
                                            <p id="form-message"></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center content mt-0">
                                        <div class="text-center col-md-6 float-end mt-2 pt-1  ">
                                            <button id="hodnotenie-submit" type="submit" name="Odoslat"
                                                    class="btn btn-dark btn-sm">Odoslať hodnotenie!
                                            </button>
                                        </div>
                                        <input type="hidden" id="hodnotenie" name="rating" value="0">
                                        <div class="text-center col-md-0 col-sm-0 mx-auto row align-items-center content mt-0">
                                            <div class="container-star">
                                                <div class="star">
                                                    <a href="#bottom" class="bi-star-fill offset-2 col-2"></a>
                                                    <a href="#bottom" class="bi-star-fill col-2"></a>
                                                    <a href="#bottom" class="bi-star-fill col-2"></a>
                                                    <a href="#bottom" class="bi-star-fill col-2"></a>
                                                    <a href="#bottom" class="bi-star-fill col-2"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <a id="bottom"></a>
</section>

