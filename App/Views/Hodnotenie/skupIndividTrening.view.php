<?php

use App\Models\Hodnotenie;
/** @var App\Core\IAuthenticator $auth */
/** @var Hodnotenie[] $data */

$hodnotenia_ind_sku = $data['Ind_Sku_trening'];

?>


<section class="container-fluid px-0">
    <div class="row align-items-center content">

        <div class="col-md-6 order-2 order-md-1 home-block text-left">
            <div class="col-10 col-lg-8  mb-5 mb-md-0 home-block home-page-text">
                <h2>Kedy?</h2>
                <p class="lead">Po dohode s trénerom</p>
                <h2>Co k tomu potrbeujem?</h2>
                <p class="lead">Uterák, vodu a oblečenie v ktorom sa budete cítit príjemne</p>
            </div>
        </div>

        <div class="col-md-6 text-center order-1 order-md-2 ">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8  mb-5 mb-md-0 home-block home-page-text">
                    <h1>Individuálny tréning</h1>
                    <p class="lead">Výhodou pri osobných tréningoch je, že v priestore sa nachádzate iba vy a tréner.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="home-block home-page-text">
        <h1>Hodnotenia</h1>
    </div>
    <?php foreach ($hodnotenia_ind_sku as $hodnotenie) { ?>
    <div>
        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title"><?php echo $hodnotenie->getNickname();?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $hodnotenie->getDate();?></h6>
                <p class="card-text"><?php echo $hodnotenie->getText(); ?></p>
<!--                <a href="#" class="card-link">Card link</a>-->
<!--                <a href="#" class="card-link">Another link</a>-->
            </div>
        </div>
        <?php } ?>
    </div>




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





</section>

