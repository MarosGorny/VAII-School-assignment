
<form method="post" action="?c=rezervaciePriestor&a=store">
    <?php /** @var \App\Models\RezervaciaPriestor $data */
    if ($data->getId()) { ?>
        <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
    <?php } ?>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Den</label>
        <select class="form-control" id="exampleFormControlSelect1" name="den">

            <?php
            $array = array("Pondelok","Utorok","Streda","Stvrtok","Piatok");
            foreach ($array as $item) {
                    if($data->getDen() == $item) {
                        echo "<option selected>$item</option>";
                    } else {
                        echo "<option>$item</option>";
                    }
            }
            ?>
        </select>
        <label for="exampleFormControlSelect2">Zaciatok</label>
        <select class="form-control" id="exampleFormControlSelect2" name="zaciatok">

            <?php

            for ($i = 8; $i <= 21 ;$i++) {
                if($data->getZaciatok() == $i) {
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

            for ($i = 9; $i <= 22 ;$i++) {
                if($data->getKoniec() == $i) {
                    echo "<option selected value=\"$i\">$i:00</option>";
                } else {
                    echo "<option value=\"$i\">$i:00</option>";
                }
            }
            ?>
        </select>
        <input type="submit" name="Odoslat">
    </div>
</form>