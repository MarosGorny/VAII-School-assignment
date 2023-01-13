<?php

use App\Models\Hodnotenie;
/** @var App\Core\IAuthenticator $auth */
/** @var Hodnotenie[] $data */

$hodnotenia_ind_sku = $data['Fun_trening'];

?>


<section class="container-fluid px-0">
    <div class="row align-items-center content">

        <div class="col-md-6 order-2 order-md-1 home-block text-left">
            <div class="col-10 col-lg-8  mb-5 mb-md-0 home-block home-page-text">
                <h2>Kedy?</h2>
                <p class="lead">Kazdy Piatok o 15:00</p>
                <h2>Co k tomu potrbeujem?</h2>
                <p class="lead">Uterák, vodu a oblečenie v ktorom sa budete cítit príjemne</p>
            </div>
        </div>

        <div class="col-md-6 text-center order-1 order-md-2 ">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8  mb-5 mb-md-0 home-block home-page-text">
                    <h1>Silovy tréning</h1>
                    <p class="lead">Silove treningy su vyborne na nabratie sily a zvacsanie svalov.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="home-block home-page-text">
        <h1>Hodnotenia</h1>
    </div>
    <?php foreach ($hodnotenia_ind_sku as $hodnotenie) { ?>
    <p class="card-text text-left m-0" >
        <?php echo $hodnotenie->getText(); }?>



    <?php if ($auth->isLogged()) { ?>
    <section class="container-fluid">
        <div class="my-0 py-0">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-body" >
                            <div class="d-flex flex-start align-items-center">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer py-3 border-0">
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                                    <textarea class="form-control" id="textAreaExample" rows="4"
                                              style="background: #fff;"></textarea>
                                    <label class="form-label" for="textAreaExample">Message</label>
                                </div>
                            </div>

                            <div class="row align-items-center content mt-0">
                                <div class=" col-md-6 float-end mt-2 pt-1">
                                    <button type="button" class="btn btn-primary btn-sm">Post comment</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                                </div>

                                <div class="col-sm-6 mx-auto row align-items-center content mt-0">
                                    <div class="container-star">
                                        <div class ="star">
                                            <a href="#bottom" class="bi-star-fill offset-2 col-2"></a>
                                            <a href="#bottom" class="bi-star-fill col-2"></a>
                                            <a href="#bottom" class="bi-star-fill col-2"></a>
                                            <a href="#bottom" class="bi-star-fill col-2"></a>
                                            <a href="#bottom" class="bi-star-fill col-2"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a id="bottom"></a>
    <?php }?>





</section>

