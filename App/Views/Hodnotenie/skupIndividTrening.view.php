<?php

use App\Models\Hodnotenie;
/** @var App\Core\IAuthenticator $auth */
/** @var Hodnotenie[] $data */

$hodnotenia_ind_sku = $data['Ind_Sku_trening'];

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function convertDate($date) {
        var newDate = new Date($date);
        var options = {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        };
        return newDate.toLocaleDateString('sk-SK', options);
    }


    $(document).ready(function() {
        console.log("Nacitane");
        var offset = 2;

        $("#show_more_comments").click(function () {
            console.log("kliknute");
            $.ajax({
                url: '?c=Hodnotenie&a=endPoint',
                method: "GET",
                data: {
                    count: offset
                },
                success: function (data) {
                    console.log(data);
                    data.forEach(element => {
                        element.nickname = decodeURIComponent(escape(element.nickname));
                        element.text = decodeURIComponent(escape(element.text));


                        element.date = convertDate(element.date);


                        $(
                            '<div id="comments">\n' +
                                '<div class="card my-2">\n' +
                                    '<div class="card-body">\n' +
                                        '<h5 class="card-title">' + element.nickname + '</h5>\n' +
                                        '<h6 class="card-subtitle mb-2 text-muted">' + element.date + '</h6>\n' +
                                        '<p class="card-text">' + element.text + '</p>\n' +
                                    '</div>' +
                                '</div>' +
                            '</div>'
                        ).insertBefore($('#show_more_comments'));
                    });
                    offset += 2;
                }
            })
        });

    });



</script>

<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $.getJSON("?c=Hodnotenie&a=endPoint", function(data) {-->
<!--            console.log(data);-->
<!--            console.log(data.length);-->
<!--            console.log(data[0].id);-->
<!---->
<!--            var html = "";-->
<!--            for (var i = 0; i < data.length; i++) {-->
<!--                html += "<div>";-->
<!--                console.log(data[i].id);-->
<!--                html += "<h2>" + data[i].id + "</h2>";-->
<!--                html += "<p>" + data[i].text + "</p>";-->
<!--                html += "</div>";-->
<!--            }-->
<!--            $("#results").html(html);-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!---->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        var commentCount = 2;-->
<!--        $("#show_more_comments").click(function () {-->
<!--            commentCount += 2;-->
<!--            $("#comments").load("?c=Hodnotenie&a=skupIndividTrening",{-->
<!--                commentNewCount: commentCount-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->

<div id="results"></div>
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
    <?php if(!empty($hodnotenia_ind_sku)) { ?>
    <?php foreach ($hodnotenia_ind_sku as $hodnotenie) { ?>
    <div id="comments" >
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

<!--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--    <script>-->
<!---->
<!--        $("#show_more_comments").click(function () {-->
<!--            $.ajax({-->
<!--                url: '?c=Hodnotenie&a=endPoint',-->
<!--                method: "GET",-->
<!--                success: function (data) {-->
<!--                    alert("LOL");-->
<!--                    $("#comments").insertAfter("#comments");-->
<!--                    // $("#comments").html(data);-->
<!--                }-->
<!--            })-->
<!--        });-->
<!---->
<!--    </script>-->



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

