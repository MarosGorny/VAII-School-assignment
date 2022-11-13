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
<div>
    <a href="?c=rezervaciePriestor&a=create" class="btn btn-success mt-2">Vytvor rezervaciu</a>
</div>


<div class="row" >
    <div class="col-2 offset-1">
        <?php
        foreach($rezervacie_pondelok as $rezervaciaPriestor) { ?>
        <div class="card text-center my-3 ">
            <div class="card-body">
                <p class="card-text text-left m-0" >
                    <?php echo $rezervaciaPriestor->getDen() ?>
                <div class="text-left">
                    <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                    <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                    <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">/</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="col-2">
        <?php
        foreach($rezervacie_utorok as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left">
                        <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                        <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">/</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-2">
        <?php
        foreach($rezervacie_streda as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left">
                        <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                        <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">/</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-2">
        <?php
        foreach($rezervacie_stvrtok as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left">
                        <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                        <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">/</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-2">
        <?php
        foreach($rezervacie_piatok as $rezervaciaPriestor) { ?>
            <div class="card text-center my-3 ">
                <div class="card-body">
                    <p class="card-text text-left m-0" >
                        <?php echo $rezervaciaPriestor->getDen() ?>
                    <div class="text-left">
                        <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                        <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
                        <a href="?c=rezervaciePriestor&a=edit&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-warning">/</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


</div>






