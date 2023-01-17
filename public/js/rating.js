

function changeColor(element) {

    var initialRole = $(element).val();
    element.onchange = function() {

        var pouzivatelId = $(element).closest('li').data('pouzivatel-id');
        var newRole = $(element).val();
        var doIt = true;
        if (newRole === "Admin") {
            doIt = confirm("Naozaj chces zmenit pouzivatela na admina?");
            if (!doIt) {
                $(element).val(initialRole);
            }
        }
        if (doIt) {
            $.ajax({
                type: "POST",
                url: '?c=domov&a=changeRole',
                data: {
                    pouzivatel_id: pouzivatelId,
                    role: newRole
                },
                success: function (response) {
                    $("[data-pouzivatel-id=" + pouzivatelId + "] select").val(newRole);
                }
            });
            element.parentElement.style.backgroundColor = 'orange';
        }
    };


}


    // $(document).ready(function(){
    //     $('.pouzivatelia').change(function(){
    //         var pouzivatelId = $(this).closest('li').data('pouzivatel-id');
    //         var newRole = $(this).val();
    //         $.ajax({
    //             type: "POST",
    //             url: '?c=domov&a=changeRole',
    //             data: {
    //                 pouzivatel_id: pouzivatelId,
    //                 role: newRole },
    //             success: function(response) {
    //                 console.log(response);
    //             }
    //         });
    //     });
    // });


var stars = document.querySelectorAll('.star a');
var submitBtn = document.querySelector('#hodnotenie');

//nastavi vsetky hviezdy evenlistnere click
//
stars.forEach((item,index1) => {
    item.addEventListener('click',() => {
        stars.forEach((star, index2) => {
            index1 >= index2 ? star.classList.add('active') : star.classList.remove('active');
            document.getElementById("hodnotenie").value = getActiveCount().toString();
        })
        })
    }
)

function getActiveCount() {
    return document.querySelectorAll('.active').length;
}


