
/**
 * AJAX
 * Ak používateľ(admin) klikne na zmenu role, zmení sa farba a aj daná rola
 *
 */
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


var stars = document.querySelectorAll('.star a');
var submitBtn = document.querySelector('#hodnotenie');


/**
 * Po označení hviezdičky vo formulári, označí tiež všetky hviezdy ktoré sú pred ňou
 */
stars.forEach((item,index1) => {
    item.addEventListener('click',() => {
        stars.forEach((star, index2) => {
            index1 >= index2 ? star.classList.add('active') : star.classList.remove('active');
            document.getElementById("hodnotenie").value = getActiveCount().toString();
        })
        })
    }
)

/**
 * Vráti počet zaznačených hviezdičiek v hodnotení
 */
function getActiveCount() {
    return document.querySelectorAll('.active').length;
}


