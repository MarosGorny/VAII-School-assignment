<?php
/** @var App\Core\IAuthenticator $auth */
/** @var $data */
/** @var App\Models\Trening[] $treningy */
/** @var App\Models\PrihlaseniPouzivatelia[] $treningy */
/** @var $userID */


$treningy = array(null);
$prihlasenia['Sil_trening'] = false;
$prihlasenia['Kon_trening'] = false;
$prihlasenia['Fun_trening'] = false;

foreach ($data[0] as $trening) {
    $treningy[] = $trening;
}

if($auth->isLogged()) {
    foreach ($data[1] as $pouzivatel) {
        if($pouzivatel->getEmail() == $auth->getLoggedUserId());
        $userID = $pouzivatel->getId();
        break;
    }

    foreach ($data[2] as $zaznam) {
        if($zaznam->getUserID() == $userID) {
            if($zaznam->getTreningID() == 3) {
                $prihlasenia['Sil_trening'] = true;
            } else if($zaznam->getTreningID() == 4) {
                $prihlasenia['Kon_trening'] = true;
            } else if($zaznam->getTreningID() == 5) {
                $prihlasenia['Fun_trening'] = true;
            }
        }

    }
}




?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("button[name='submit-signIn']").click(function(e){
            e.preventDefault();
            var button = this;
            var trainingId = $(this).data('training-id');
            var pouzivatelEmail = $(this).data('pouzivatel-email')
            $.ajax({
                type: "POST",
                url: "?c=trening&a=prihlasSa",
                data: {
                    training_id: trainingId,
                    pouzivatel_email: pouzivatelEmail
                },
                success: function(response) {
                    if(response.success) {
                        // TODO Treba doriesit aby to znova fungovalo aj ked sa to vymeni
                        // $("button[name='submit-signIn']").replaceWith(
                        //     "<button name='submit-signOut' type='submit' class='btn btn-outline-danger btn-lg btn-block rounded-0' data-training-id='" + trainingId + "' data-pouzivatel-email='" + pouzivatelEmail + "'>Odhlásiť sa</i></button>"
                        // );
                        location.reload();
                    }
                    alert(response.message);
                }
            });
        });

        $("button[name='submit-signOut']").click(function(e){
            e.preventDefault();
            var button = this;
            var trainingId = $(this).data('training-id');
            var pouzivatelEmail = $(this).data('pouzivatel-email')
            $.ajax({
                type: "POST",
                url: "?c=trening&a=odhlasSa",
                data: {
                    training_id: trainingId,
                    pouzivatel_email: pouzivatelEmail
                },
                success: function(response) {
                    if(response.success) {
                        // TODO Treba doriesit aby to znova fungovalo aj ked sa to vymeni
                        // $("button[name='submit-signOut']").replaceWith(
                        //     "<button name='submit-signIn' type='submit' class='btn btn-secondary btn-lg btn-block rounded-0' data-training-id='" + trainingId + "' data-pouzivatel-email='" + pouzivatelEmail + "'>Prihlásiť sa</i></button>"
                        // );
                        location.reload();
                    }
                    alert(response.message);

                }
            });
        });

    });

</script>


<section class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-lg-6 home-block">
            <img class="img-fluid"
                 src="../../../public/photos/osobnyTrener.jpg"
                 alt="Trainer with client">
        </div>
        <div class="col-lg-6 home-block">
            <div id="headingGroup" class="text-center d-none d-lg-block">
                <h1 class="">TRÉNINGY</h1>
                <h1 class="">TRÉNINGY</h1>
                <h1 class="">TRÉNINGY</h1>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid px-0">
    <div class="row align-items-center content">

        <div class="col-md-8 text-center">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8  mb-0 home-block home-page-text">





                    <h2 class="mb-0 pb-0 ">Skupinové tréningy</h2>


                    <p class="lead">Individuálne tréningy s naším trénerom si viete dohodnúť aj ako skupinka.</p>
                    <h2>Samostatné individuálne tréningy</h2>
                    <p class="lead">Výhodou pri osobných tréningoch je, že v priestore sa nachádzate iba vy a tréner.</p>
                </div>
                <a class="infobtn btn btn-outline-secondary btn-lg btn-block rounded-0" href="?c=hodnotenie&a=skupIndividTrening" role="button">Informácie</a>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 d-none d-md-flex d-lg-flex home-block ">
            <img class="img-fluid float-right"
                 src="../../../public/photos/osobnyTrenerSkupina.jpg"
                 alt="Box punch">
        </div>

    </div>

    <div class="row align-items-center content">

        <div class="col-md-8 text-center order-1 order-md-2 home-block">
            <div class="row justify-content-center ">
                <div class="col-10 col-lg-8 mb-0 home-page-text">
                    <h2>Silove treningy</h2>
                    <p class="pt-0 mt-0"> <small>Počet prihlasených: <span id="obsadenostPocetDisplay">
                            <?php echo $treningy[3]->getAktualnyPocet();  ?> </span> / <span id="obsadenostMaxKapacitaDisplay">
                            <?php echo $treningy[3]->getMaximalnaKapacita(); ?>
                        </span> </small>
                    </p>


                    <?php if ($auth->isAdmin() ) { ?>
                        <div class="text-right">
                            <a class="btn btn-success" href="javascript:void(0);" id="add1Button" role="button">+1</a>
                            <a class="btn btn-danger" href="javascript:void(0);" id="minus1Button" role="button">-1</a>
                            <a class="btn btn-warning" href="javascript:void(0);" id="reset" role="button">Vynuluj</a>
                        </div>
                        <div class="text-right py-1">
                            <label for="maxKapacitaInput">Maximalna kapacita:</label>
                            <input type="number" id="maxKapacitaInput" value="<?php echo $treningy[3]->getMaximalnaKapacita() ?>" min="0" max="20">
                        </div>
                        <div class="text-right">
                            <form method="post" action="?c=trening&a=update">
                                <input type="hidden" id="trening" name="id" value="3">
                                <input type="hidden" id="pocet" name="pocet" value="NOT_SET">
                                <input type="hidden" id="kapacita" name="kapacita" value="NOT_SET">
                                <input class="btn btn-success" id="aktualizujTrening"  value="Potvrd zmenu" type="submit" name="aktualizuj">
                            </form>
                        </div>
                    <?php } ?>
                    <p class="lead">Silove treningy su vyborne na nabratie sily a zvacsanie svalov.</p>
                </div>
                <?php if($auth->isLogged()) {?>
                    <?php if($prihlasenia['Sil_trening'] ) { ?>
                        <button name="submit-signOut" type="submit" class="btn btn-outline-danger btn-lg btn-block rounded-0"
                                data-training-id="<?php echo $treningy[3]->getId(); ?>"
                                data-pouzivatel-email="<?php echo $auth->getLoggedUserId(); ?>"
                        >Odhlásiť sa</i></button>
                    <?php } else { ?>
                        <button name="submit-signIn" type="submit" class="btn btn-secondary btn-lg btn-block rounded-0"
                                data-training-id="<?php echo $treningy[3]->getId(); ?>"
                                data-pouzivatel-email="<?php echo $auth->getLoggedUserId(); ?>"
                        >Prihlásiť sa</i></button>
                    <?php } ?>
                <?php } ?>

                <a class="infobtn btn btn-outline-secondary btn-lg btn-block rounded-0" href="?c=hodnotenie&a=silovyTrening" role="button">Informácie</a>


            </div>
        </div>
        <div class="col-md-4 col-lg-4 d-none d-md-flex d-lg-flex home-block order-md-1">
            <img class="img-fluid"
                 src="../../../public/photos/benchpress.jpg"
                 alt="Trainer with clients">
        </div>
    </div>

    <div class="row align-items-center content">

        <div class="col-md-8 text-center">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8  mb-0 home-block home-page-text">
                    <h2>Kondicne treningy</h2>
                    <p class="pt-0 mt-0"> <small>Počet prihlasených: <span id="obsadenostPocetDisplay">
                            <?php echo $treningy[4]->getAktualnyPocet();  ?> </span> / <span id="obsadenostMaxKapacitaDisplay">
                            <?php echo $treningy[4]->getMaximalnaKapacita(); ?>
                        </span> </small>
                    </p>


                    <?php if ($auth->isAdmin()) { ?>
                        <div class="text-right">
                            <a class="btn btn-success" href="javascript:void(0);" id="add1Button" role="button">+1</a>
                            <a class="btn btn-danger" href="javascript:void(0);" id="minus1Button" role="button">-1</a>
                            <a class="btn btn-warning" href="javascript:void(0);" id="reset" role="button">Vynuluj</a>
                        </div>
                        <div class="text-right py-1">
                            <label for="maxKapacitaInput">Maximalna kapacita:</label>
                            <input type="number" id="maxKapacitaInput" value="<?php echo $treningy[4]->getMaximalnaKapacita() ?>" min="0" max="20">
                        </div>
                        <div class="text-right">
                            <form method="post" action="?c=trening&a=update">
                                <input type="hidden" id="trening" name="id" value="4">
                                <input type="hidden" id="pocet" name="pocet" value="NOT_SET">
                                <input type="hidden" id="kapacita" name="kapacita" value="NOT_SET">
                                <input class="btn btn-success" id="aktualizujTrening"  value="Potvrd zmenu" type="submit" name="aktualizuj">
                            </form>
                        </div>
                    <?php } ?>
                    <p class="lead">Kondicne treningy su vhodne na chudnutie, rysovanie tela alebo zlepsenie si kondicky.</p>
                </div>
                <?php if($auth->isLogged()) {?>
                    <?php if($prihlasenia['Kon_trening'] ) { ?>
                        <button name="submit-signOut" type="submit" class="btn btn-outline-danger btn-lg btn-block rounded-0"
                                data-training-id="<?php echo $treningy[4]->getId(); ?>"
                                data-pouzivatel-email="<?php echo $auth->getLoggedUserId(); ?>"
                        >Odhlásiť sa</i></button>
                    <?php } else { ?>
                        <button name="submit-signIn" type="submit" class="btn btn-secondary btn-lg btn-block rounded-0"
                                data-training-id="<?php echo $treningy[4]->getId(); ?>"
                                data-pouzivatel-email="<?php echo $auth->getLoggedUserId(); ?>"
                        >Prihlásiť sa</i></button>
                    <?php } ?>
                <?php } ?>
                <a class="infobtn btn btn-outline-secondary btn-lg btn-block rounded-0" href="?c=hodnotenie&a=kondicnyTrening" role="button">Informácie</a>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 d-none d-md-flex d-lg-flex home-block">
            <img class="img-fluid"
                 src="../../../public/photos/paste.jpg"
                 alt="Training room">
        </div>
    </div>

    <div class="row align-items-center content">

        <div class="col-md-8 text-center order-1 order-md-2 ">
            <div class="row justify-content-center ">
                <div class="col-10 col-lg-8 mb-0 home-page-text">
                    <h2>Funkcne treningy</h2>
                    <p class="pt-0 mt-0"> <small>Počet prihlasených: <span id="obsadenostPocetDisplay">
                            <?php echo $treningy[5]->getAktualnyPocet();  ?> </span> / <span id="obsadenostMaxKapacitaDisplay">
                            <?php echo $treningy[5]->getMaximalnaKapacita(); ?>
                        </span> </small>
                    </p>


                    <?php if ($auth->isAdmin()) { ?>
                        <div class="text-right">
                            <a class="btn btn-success" href="javascript:void(0);" id="add1Button" role="button">+1</a>
                            <a class="btn btn-danger" href="javascript:void(0);" id="minus1Button" role="button">-1</a>
                            <a class="btn btn-warning" href="javascript:void(0);" id="reset" role="button">Vynuluj</a>
                        </div>
                        <div class="text-right py-1">
                            <label for="maxKapacitaInput">Maximalna kapacita:</label>
                            <input type="number" id="maxKapacitaInput" value="<?php echo $treningy[5]->getMaximalnaKapacita() ?>" min="0" max="20">
                        </div>
                        <div class="text-right">
                            <form method="post" action="?c=trening&a=update">
                                <input type="hidden" id="trening" name="id" value="5">
                                <input type="hidden" id="pocet" name="pocet" value="NOT_SET">
                                <input type="hidden" id="kapacita" name="kapacita" value="NOT_SET">
                                <input class="btn btn-success" id="aktualizujTrening"  value="Potvrd zmenu" type="submit" name="aktualizuj">
                            </form>
                        </div>
                    <?php } ?>
                    <p class="lead">Funkcne treningy sluzia na lepsiu stabilitu a koordinaciu celeho tela.</p>
                </div>
                <?php if($auth->isLogged()) {?>
                    <?php if($prihlasenia['Fun_trening'] ) { ?>
                        <button name="submit-signOut" type="submit" class="btn btn-outline-danger btn-lg btn-block rounded-0"
                                data-training-id="<?php echo $treningy[5]->getId(); ?>"
                                data-pouzivatel-email="<?php echo $auth->getLoggedUserId(); ?>"
                        >Odhlásiť sa</i></button>
                    <?php } else { ?>
                        <button name="submit-signIn" type="submit" class="btn btn-secondary btn-lg btn-block rounded-0"
                                data-training-id="<?php echo $treningy[5]->getId(); ?>"
                                data-pouzivatel-email="<?php echo $auth->getLoggedUserId(); ?>"
                        >Prihlásiť sa</i></button>
                    <?php } ?>
                <?php } ?>
                <a class="infobtn btn btn-outline-secondary btn-lg btn-block rounded-0" href="?c=hodnotenie&a=funkcnyTrening" role="button">Informácie</a>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 d-none d-md-flex d-lg-flex home-block order-md-1">
            <img class="img-fluid"
                 src="../../../public/photos/stojka.jpg"
                 alt="Trainer with clients">
        </div>
    </div>
</section>

