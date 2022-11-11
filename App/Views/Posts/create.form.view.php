<!--Chcem davat post method aby to nezahltilo urlku a davam akciu-->
<form method="post" action="?c=posts&a=store">
    <?php /** @var \App\Models\Post $data */
    if ($data->getId()) { ?>
    <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
    <?php } ?>
    <label>
        Text:
        <input type="text" name="text" value="<?php echo $data->getText() ?>">
    </label>
    <input type="submit" name="Odoslat">
</form>
