<?php
    use App\Models\RezervaciaPriestor;
    /** @var App\Core\IAuthenticator $auth */
    /** @var RezervaciaPriestor[] $data */
?>
<div>
    <a href="?c=rezervaciePriestor&a=create" class="btn btn-success mt-2">Vytvor rezervaciu</a>
</div>

<?php
foreach($data as $rezervaciaPriestor) {

    ?><div class="card text-center my-3" style="width: 15%">
    <div class="card-body">
        <p class="card-text" >
            <?php echo $rezervaciaPriestor->getDen() ?>
            <div class="text-left">
                <?php echo $rezervaciaPriestor->getZaciatok() .":00" . " - " . $rezervaciaPriestor->getKoniec() .":00" ?>
                <a href="?c=rezervaciePriestor&a=delete&id=<?php echo $rezervaciaPriestor->getId() ?>" class="btn btn-danger">X</a>
            </div>
    </div>
    </div>
<?php } ?>

