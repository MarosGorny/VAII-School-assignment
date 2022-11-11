<?php

use App\Models\Post;
/** @var App\Core\IAuthenticator $auth */
/** @var Post[] $data */
?>
<div>
<?php if ($auth->isLogged()) { ?>
    <a href="?c=posts&a=create" class="btn btn-success">Vytvor post</a>
<?php }?>
</div>

<?php
foreach($data as $post) {

?><div class="card text-center my-3" style="width: 200px">
    <?php if ($post->getImg()) { ?>
    <img src="<?php echo $post->getImg() ?>" class="card-img-top" alt="...">
    <?php } ?>
    <div class="card-body">
<!--        <h5 class="card-title">Card title</h5>-->
        <p class="card-text">
            <?php echo $post->getText() ?>
        </p>
        <?php if ($auth->isLogged()) { ?>
        <a href="?c=posts&a=delete&id=<?php echo $post->getId() ?>" class="btn btn-danger">Delete</a>
        <a href="?c=posts&a=edit&id=<?php echo $post->getId() ?>" class="btn btn-warning">Upravit</a>
        <a href="?c=posts&a=like&id=<?php echo $post->getId() ?>" class="btn btn-secondary">
            <?php echo  count($post->getLikes()) ?> likes
        </a>
        <?php } else { ?>
        <a href="#" class="btn btn-secondary">
            <?php echo  count($post->getLikes()) ?> likes
        </a>
        <?php }?>


    </div>
</div>
<?php } ?>