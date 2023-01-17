//GET hodnotenia AJAX
$(document).ready(function () {
    $("#show_more_comments").click(function () {
        nacitajHodnotenia();
    });

});

/**
 * Vymže všetky aktívne hviezdičky z formulára na hodnotenia
 */
function vymazRating() {
    stars.forEach((star) => {
        star.classList.remove('active');
    })
}

/**
 * Formátuje dátum do SK formátu
 */
function convertDate($date) {
    var newDate = new Date($date);
    var options = {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    };
    return newDate.toLocaleDateString('sk-SK', options);
}

/**
 * Kontrola vstupov pri vypplnaní formulára na hodnotenie
 */
function submitHodnotenieCheck() {
    var nickname = document.getElementById('nickname-id').value;
    var text = document.getElementById('text-id').value;
    var rating = getActiveCount();

    if (!nickname || !text) {
        document.getElementById("form-message").innerHTML = "Musíš vyplnť meno aj text";
        return false;
    }
    if (rating === 0) {
        document.getElementById("form-message").innerHTML = "Musíš zvoliť hodnotenie od 1 po 5 hviezdičiek";
        return false;
    }
    document.getElementById("form-message").innerHTML = "";
    return true;

}

/**
 * AJAX
 * Upravovanie hodnotenia
 */
$(document).on('click', '.edit-comment', function () {
    var button = $(this);
    var commentId = $(this).closest('.card-body').find('.comment-text').data('id');
    var currentComment = $(this).closest('.card-body').find('.comment-text').text();
    var currentNickname = $(this).closest('.card-body').find('.nickname-text').text();
    var newNickname = prompt("Edit nickname:", currentNickname);
    if (newNickname != null && newNickname.length > 0) {
        var newComment = prompt("Edit comment:", currentComment);
        if (newComment != null) {
            $.ajax({
                type: "POST",
                url: "?c=hodnotenie&a=edit&id=" + commentId,
                data: {
                    newComment: newComment,
                    newNickname: newNickname,
                    commentId: commentId
                },
                success: function (response) {
                    button.closest('.card-body').find('.comment-text').text(newComment);
                    button.closest('.card-body').find('.nickname-text').text(newNickname);
                }
            });
        }
    }

});

/**
 * AJAX
 * Vymazanie hodnotenia
 */
$(document).ready(function () {
    $('.delete-comment-btn').on('click', function () {
        var commentId = $(this).closest('.card-body').find('.comment-text').data('id');
        if (isNaN(commentId) || commentId <= 0) {
            alert("Nespravne ID hodnotenia.");
            return;
        }
        if (!confirm("Naozaj chceš vymazať hodnotenie?")) {
            return;
        }
        var self = this;
        $.ajax({
            url: "?c=hodnotenie&a=delete&id=" + commentId,
            type: 'DELETE',
            data: {},
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    $(self).closest('.card').remove();
                } else {
                    alert(response.message);
                }
            }
        });
    });
});
