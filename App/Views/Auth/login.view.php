<?php
$layout = 'root';
/** @var Array $data */
?>

<script src="../../../public/js/showPassword.js"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body position-relative ">
                    <h2 class="card-title text-center">Prihlásenie</h2>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                        <div class="form-label-group mb-3">
                            <input name="login" type="email" id="email" class="form-control" placeholder="email"
                                   required autofocus>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Heslo" required>
                        </div>
                        <div >
                            <input type="checkbox" onclick="showHidePassword()"> Ukáž heslo
                        </div>
                        <button class="btn btn-primary btn" type="submit" name="submit">Prihlásiť</button>
                    </form>
                    <div class="text-center position-absolute " style="bottom: 6%; right: 6%">

                        <form method="post" action="<?= \App\Config\Configuration::REGISTER_URL ?>">
                        <button class="ml-4 btn btn-secondary btn-sm " type="submit">Registrovať sa
                        </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
