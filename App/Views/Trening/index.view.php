<?php
/** @var App\Core\IAuthenticator $auth */
/** @var App\Models\Trening[] $data */

$trening1 = null;

foreach ($data as $trening) {
    if ($trening->getId() == 1)
        $trening1 = $trening;
}

?>

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
                    <p class="pt-0 mt-0"> <small>Počet prihlasených: <span id="obsadenostPocetDisplay">
                            <?php echo $trening1->getAktualnyPocet();  ?> </span> / <span id="obsadenostMaxKapacitaDisplay">
                            <?php echo $trening1->getMaximalnaKapacita(); ?>
                        </span> </small>
                    </p>


                    <?php if ($auth->isLogged()) { ?>
                        <div class="text-right">
                            <a class="btn btn-success" href="javascript:void(0);" id="add1Button" role="button">+1</a>
                            <a class="btn btn-danger" href="javascript:void(0);" id="minus1Button" role="button">-1</a>
                            <a class="btn btn-warning" href="javascript:void(0);" id="reset" role="button">Vynuluj</a>
                        </div>
                        <div class="text-right py-1">
                            <label for="maxKapacitaInput">Maximalna kapacita:</label>
                            <input type="number" id="maxKapacitaInput" value="" min="0" max="20">
                        </div>
                        <div class="text-right">
                            <form method="post" action="?c=trening&a=update">
                                <input type="hidden" id="trening1" name="id" value="1">
                                <input type="hidden" id="pocet1" name="pocet" value="NOT_SET">
                                <input type="hidden" id="kapacita1" name="kapacita" value="NOT_SET">
                                <input class="btn btn-success" id="aktualizujTrening1"  value="Potvrd zmenu" type="submit" name="aktualizuj">
                            </form>
                        </div>





                    <?php } ?>
                    <p class="lead">Individuálne tréningy s naším trénerom si viete dohodnúť aj ako skupinka.</p>
                    <h2>Samostatné individuálne tréningy</h2>
                    <p class="lead">Výhodou pri osobných tréningoch je, že v priestore sa nachádzate iba vy a tréner.</p>
                </div>
                <a class="btn btn-secondary btn-lg btn-block rounded-0" href="#" role="button">Prihlásiť sa</a>
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
                    <p class="lead">Silove treningy su vyborne na nabratie sily a zvacsanie svalov.</p>
                </div>
                <a class="btn btn-secondary btn-lg btn-block rounded-0" href="#" role="button">Prihlásiť sa</a>
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
                    <p class="lead">Kondicne treningy su vhodne na chudnutie, rysovanie tela alebo zlepsenie si kondicky.</p>
                </div>
                <a class="btn btn-secondary btn-lg btn-block rounded-0" href="#" role="button">Prihlásiť sa</a>
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
                    <p class="lead">Funkcne treningy sluzia na lepsiu stabilitu a koordinaciu celeho tela.</p>
                </div>
                <a class="btn btn-secondary btn-lg btn-block rounded-0" href="#" role="button">Prihlásiť sa</a>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 d-none d-md-flex d-lg-flex home-block order-md-1">
            <img class="img-fluid"
                 src="../../../public/photos/stojka.jpg"
                 alt="Trainer with clients">
        </div>
    </div>
</section>