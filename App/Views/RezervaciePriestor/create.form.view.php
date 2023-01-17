<form method="post" action="?c=rezervaciePriestor&a=store">
    <?php
    $rezervacia_data = $data['rezervacia'];
    $sprava_data = $data['sprava'];


    use App\Core\IAuthenticator;

    /** @var IAuthenticator $auth */
    /** @var \App\Models\RezervaciaPriestor $rezervacia_data */
    /** @var String $sprava_data */
    if ($rezervacia_data->getId()) {
        ?>
        <input type="hidden" name="id" value="<?php echo $rezervacia_data->getId() ?>">

    <?php } ?>
<!--    TODO dorobit telefonne cislo?-->
<!--    <div class="form-group">-->
<!--        <label for="emailAddress">Email adresa</label>-->
<!--        <input type="email" class="form-control" id="emailAddress" name="email" placeholder="name@example.com">-->
<!--    </div>-->
    <div class="form-group">
        <label for="nazov-form">Názov</label>
        <input type="text" class="form-control" id="nazov-form" name="nazov" placeholder="Názov aktivity">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Deň</label>
        <select class="form-control" id="exampleFormControlSelect1" name="den">
            <?php
            $array = array("Pondelok", "Utorok", "Streda", "Stvrtok", "Piatok");
            foreach ($array as $item) {
                if ($rezervacia_data->getDen() == $item) {
                    echo "<option selected>$item</option>";
                } else {
                    echo "<option>$item</option>";
                }
            }
            ?>
        </select>
        <label for="exampleFormControlSelect2">Začiatok</label>
        <div class="text-left text-danger font-weight-lighter font-italic">
            <?= @$sprava_data ?>
        </div>
        <select class="form-control" id="exampleFormControlSelect2" name="zaciatok">
            <?php
                for ($i = 8; $i <= 21; $i++) {
                    if ($rezervacia_data->getZaciatok() == $i) {
                        echo "<option selected value=\"$i\">$i:00</option>";
                    } else {
                        echo "<option value=\"$i\">$i:00</option>";
                    }
                }
            ?>
        </select>
        <label for="exampleFormControlSelect3">Koniec</label>
        <select class="form-control" id="exampleFormControlSelect3" name="koniec">
            <?php
                for ($i = 9; $i <= 22; $i++) {
                    if ($rezervacia_data->getKoniec() == $i) {
                        echo "<option selected value=\"$i\">$i:00</option>";
                    } else {
                        echo "<option value=\"$i\">$i:00</option>";
                    }
                }
            ?>
        </select>
        <input type="hidden" name="pouzivatel_email" value="<?php echo $auth->getLoggedUserId() ?>">
        <input type="submit" name="Odoslat" value="Odoslať">
    </div>
</form>