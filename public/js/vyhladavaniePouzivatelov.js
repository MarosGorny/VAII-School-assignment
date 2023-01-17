var request = null;

$(document).ready(function () {
    var minLength = 1;
    $("#live_search").keyup(function () {
        var oldValue = this;
        var text = $(this).val();

        if (text !== "") {
            if(text.length >= minLength) {
                $("#searchresult").css("display", "inline");
                console.log("xxx");
                //Ak tam ostal request(minuly), tak ho zabije
                if (request != null)
                    request.abort();
                console.log("???")
                request = $.ajax({

                    url: '?c=domov&a=getUsers',
                    method: "POST" ,
                    data: {text: text},


                    success: function (data) {
                        console.log(data);
                        if (text === $(oldValue).val()) {
                            $("#searchresult").html(data);
                        }
                    }


                })
                console.log(request);
            }
        } else {
            $("#searchresult").css("display", "none");
        }
    });
});