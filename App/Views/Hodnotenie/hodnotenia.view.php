<?php

/** @var App\Core\IAuthenticator $auth */
/** @var Hodnotenie[] $data */

$hodnotenia_ind_sku = $data['Ind_Sku_trening'];

?>

<?php
    if(!empty($hodnotenia_ind_sku)) { ?>
<?php foreach ($hodnotenia_ind_sku as $hodnotenie) { ?>
    <div>
    <div class="card my-2">
        <div class="card-body">
            <h5 class="card-title"><?php echo $hodnotenie->getNickname();?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $hodnotenie->getDate();?></h6>
            <p class="card-text"><?php echo $hodnotenie->getText(); ?></p>
        </div>
    </div>
<?php } ?>
    </div>
    <button id="show_more_comments">Show more comments</button>
<?php } else { ?>
    <p> There are no comments !</p>
<?php } ?>

<?php if ($auth->isLogged()) { ?>
    <section class="container-fluid">
        <div class="my-0 py-0">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <form method="post" action="?c=Hodnotenie&a=store">
                            <div class="card-body" >
                                <div class="d-flex flex-start align-items-center">
                                    <div>
                                        <?php echo $auth->getLoggedUserName(); ?>
                                        <input type="text" name="nickname" placeholder="Tvoje meno" required>
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer py-3 border-0">
                                <div class="d-flex flex-start w-100">
                                    <div class="form-outline w-100">
                                        <textarea class="form-control" id="textAreaExample" rows="4"
                                                  style="background: #fff;" name="text"></textarea>
                                        <label class="form-label" for="textAreaExample">Message</label>
                                    </div>
                                </div>

                                <div class="row align-items-center content mt-0">
                                    <div class=" col-md-6 float-end mt-2 pt-1">
                                        <button type="submit" name="Odoslat" class="btn btn-primary btn-sm">Post comment</button>
                                        <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                                    </div>
                                    <input type="hidden" id="hodnotenie" name="rating" value="0">
                                    <div class="col-sm-6 mx-auto row align-items-center content mt-0">
                                        <div class="container-star">
                                            <div class ="star">
                                                <a href="#" class="bi-star-fill offset-2 col-2"></a>
                                                <a href="#" class="bi-star-fill col-2"></a>
                                                <a href="#" class="bi-star-fill col-2"></a>
                                                <a href="#" class="bi-star-fill col-2"></a>
                                                <a href="#" class="bi-star-fill col-2"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </section>
<?php }?>
