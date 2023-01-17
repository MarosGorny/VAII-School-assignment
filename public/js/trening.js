
$(document).ready(function () {
    $("button[name='submit-signIn']").click(function (e) {
        e.preventDefault();
        var button = this;
        var trainingId = $(this).data('training-id');
        var pouzivatelEmail = $(this).data('pouzivatel-email')
        $.ajax({
            type: "POST",
            url: "?c=trening&a=prihlasSa",
            data: {
                training_id: trainingId,
                pouzivatel_email: pouzivatelEmail
            },
            success: function (response) {
                if (response.success) {
                    // TODO Treba doriesit aby to znova fungovalo aj ked sa to vymeni
                    // $("button[name='submit-signIn']").replaceWith(
                    //     "<button name='submit-signOut' type='submit' class='btn btn-outline-danger btn-lg btn-block rounded-0' data-training-id='" + trainingId + "' data-pouzivatel-email='" + pouzivatelEmail + "'>Odhlásiť sa</i></button>"
                    // );
                    location.reload();
                }
                alert(response.message);
            }
        });
    });

    $("button[name='submit-signOut']").click(function (e) {
        e.preventDefault();
        var button = this;
        var trainingId = $(this).data('training-id');
        var pouzivatelEmail = $(this).data('pouzivatel-email')
        $.ajax({
            type: "POST",
            url: "?c=trening&a=odhlasSa",
            data: {
                training_id: trainingId,
                pouzivatel_email: pouzivatelEmail
            },
            success: function (response) {
                if (response.success) {
                    // TODO Treba doriesit aby to znova fungovalo aj ked sa to vymeni
                    // $("button[name='submit-signOut']").replaceWith(
                    //     "<button name='submit-signIn' type='submit' class='btn btn-secondary btn-lg btn-block rounded-0' data-training-id='" + trainingId + "' data-pouzivatel-email='" + pouzivatelEmail + "'>Prihlásiť sa</i></button>"
                    // );
                    location.reload();
                }
                alert(response.message);
            }
        });
    });
});