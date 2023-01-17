<?php
$layout = 'empty';
use App\Models\Pouzivatel;
/** @var Pouzivatel[] $data */

$pouzivateliaHladat = $data['pouzivateliaHladat'];
?>

<ol class="list-group list-group-numbered pt-4">
    <?php
    foreach ($pouzivateliaHladat as $pouzivatel) { ?>
        <li  class="list-group-item" data-pouzivatel-id="<?php echo $pouzivatel->getId(); ?>" ><?php echo "[". $pouzivatel->getId()."]" .$pouzivatel->getEmail();?>
            <select onclick="changeColor(this)"  class="form-select form-select-sm pouzivatelia" id="pouzivatelia" aria-label=".form-select-sm example">
                <?php
                $array = array("Admin","Trener","Klient");
                $userRole = $pouzivatel->getRole();

                foreach ($array as $index=>$role) {
                    if($role == $userRole) {
                        echo "<option value=\"$role\" selected>$role</option>";
                    } else {
                        echo "<option value=\"$role\" >$role</option>";
                    }
                }
                ?>
            </select>
        </li>
    <?php  }?>
</ol>



