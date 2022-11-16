<?php
    use App\Models\RezervaciaPriestor;
    /** @var App\Core\IAuthenticator $auth */
    /** @var RezervaciaPriestor[] $data */

    $rezervacie_pondelok = $data['pondelok'];
    $rezervacie_utorok = $data['utorok'];
    $rezervacie_streda = $data['streda'];
    $rezervacie_stvrtok = $data['stvrtok'];
    $rezervacie_piatok = $data['piatok'];

?>


<div class="row" >
    <div class="col-xl-1 col-lg-1 col-md-12 col-12 ">
        <?php if ($auth->isLogged()) { ?>
            <a href="?c=rezervaciePriestor&a=create" class="btn btn-success mt-2">Vytvor rezervaciu</a>
        <?php }?>
    </div>
    <div class="col-xl-2 col-lg-5 col-md-6 col-sm-12">
        <h1 class="text-center mt-2">PONDELOK</h1>
        <?php
        foreach($rezervacie_pondelok as $rezervaciaPriestor) { ?>
        <div class="card text-center my-3 ">
            <div class="card-body">
                <p class="card-text text-left m-0" >
                    <?php echo $rezervaciaPriestor->getDen() ?>
                <div class="text-left row">
                    <div class="col-7">
                        <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                    </div>
                    <div class="col-5 text-right">
                        <?php if ($auth->isLogged()) { ?>
                            <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">UPRAV</a>
                            <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="col-xl-2 col-lg-5 col-md-6 col-sm-12">
        <h1 class="text-center mt-2">UTOROK</h1>
        <?php
        foreach($rezervacie_utorok as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left row">
                        <div class="col-6">
                            <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        </div>
                        <div class="col-6 text-right">
                            <?php if ($auth->isLogged()) { ?>
                                <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">UPRAV</a>
                                <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-xl-2 col-lg-5 offset-lg-1 offset-xl-0 col-md-6 col-sm-12">
        <h1 class="text-center mt-2">STREDA</h1>
        <?php
        foreach($rezervacie_streda as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left row">
                        <div class="col-6">
                            <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        </div>
                        <div class="col-6 text-right">
                            <?php if ($auth->isLogged()) { ?>
                                <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">UPRAV</a>
                                <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-xl-2 col-lg-5 col-md-6 col-sm-12">
        <h1 class="text-center mt-2">STVRTOK</h1>
        <?php
        foreach($rezervacie_stvrtok as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left row">
                        <div class="col-6">
                            <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        </div>
                        <div class="col-6 text-right">
                            <?php if ($auth->isLogged()) { ?>
                                <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">UPRAV</a>
                                <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-xl-2 col-lg-10 offset-lg-1 offset-xl-0 col-md-12 col-sm-12">
        <h1 class="text-center mt-2">PIATOK</h1>
        <?php
        foreach($rezervacie_piatok as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left row">
                        <div class="col-6">
                            <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        </div>
                        <div class="col-6 text-right">
                            <?php if ($auth->isLogged()) { ?>
                                <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">UPRAV</a>
                                <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


</div>






