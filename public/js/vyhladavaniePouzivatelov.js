/**
 * AJAX
 * Live vyhľadávanie používateľov
 */
var request = null;
$(document).ready(function () {
    var minLength = 1;
    $("#live_search").keyup(function () {
        var oldValue = this;
        var text = $(this).val();

        if (text !== "") {
            if(text.length >= minLength) {
                $("#searchresult").css("display", "inline");
                //Ak tam ostal request(minuly), tak ho zabije
                if (request != null)
                    request.abort();
                request = $.ajax({

                    url: '?c=domov&a=getUsers',
                    method: "POST" ,
                    data: {text: text},


                    success: function (data) {
                        if (text === $(oldValue).val()) {
                            $("#searchresult").html(data);
                        }
                    }
                })
            }
        } else {
            $("#searchresult").css("display", "none");
        }
    });
});