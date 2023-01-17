//GET hodnotenia AJAX
$(document).ready(function () {
    $("#show_more_comments").click(function () {
        nacitajHodnotenia();
    });

});

function vymazRating() {
    stars.forEach((star) => {
        star.classList.remove('active');
    })
}

function convertDate($date) {
    var newDate = new Date($date);
    var options = {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    };
    return newDate.toLocaleDateString('sk-SK', options);
}

function submitHodnotenieCheck() {
    var nickname = document.getElementById('nickname-id').value;
    var text = document.getElementById('text-id').value;
    var rating = getActiveCount();

    if (!nickname || !text) {
        document.getElementById("form-message").innerHTML = "Musis vyplnit aj meno aj text.";
        return false;
    }
    if (rating === 0) {
        document.getElementById("form-message").innerHTML = "Este oznac hviezdicky :).";
        return false;
    }
    document.getElementById("form-message").innerHTML = "";
    return true;

}
