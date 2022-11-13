<?php
    use App\Models\RezervaciaPriestor;
    /** @var App\Core\IAuthenticator $auth */
    /** @var RezervaciaPriestor[] $data */
?>
<div>
    <a href="?c=rezervaciePriestor&a=create" class="btn btn-success mt-2">Vytvor rezervaciu</a>
</div>


<!--<div class="row" >-->
<!---->
<!--    <div class="col-2 offset-1 card text-center my-3 ">-->
<!--        <div class="card-body">-->
<!--            <p class="card-text" >-->
<!--                <div class="text-left">-->
<!--                </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-2 card text-center my-3 ">-->
<!--        <div class="card-body">-->
<!--            <p class="card-text" >-->
<!--            <div class="text-left">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-2 card text-center my-3 ">-->
<!--        <div class="card-body">-->
<!--            <p class="card-text" >-->
<!--            <div class="text-left">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-2 card text-center my-3 ">-->
<!--        <div class="card-body">-->
<!--            <p class="card-text" >-->
<!--            <div class="text-left">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-2 card text-center my-3 ">-->
<!--        <div class="card-body">-->
<!--            <p class="card-text" >-->
<!--            <div class="text-left">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



<?php
foreach($data as $rezervaciaPriestor) { ?>

<div class="row" >

    <div class="col-2 offset-1 card text-center my-3 ">
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

</div>

<?php } ?>



