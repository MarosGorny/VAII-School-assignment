<?php
    use App\Models\RezervaciaPriestor;
    /** @var App\Core\IAuthenticator $auth */
    /** @var RezervaciaPriestor[] $data */
?>
<div>
    <h1>Priestory</h1>
    <a href="?c=rezervaciePriestor&a=create" class="btn btn-success">Vytvor rezervaciu</a>
    <p>Ahoj ahoj </p>
</div>

<?php
foreach($data as $rezervaciaPriestor) {

    ?><div class="card text-center my-3" style="width: 200px">
    <div class="card-body">
        <!--        <h5 class="card-title">Card title</h5>-->
        <p class="card-text">
            <?php echo $rezervaciaPriestor->getDen() ?>
        </p>
    </div>
    </div>
<?php } ?>

