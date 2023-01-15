// $('#search-form').submit(function(e) {
//     e.preventDefault();
//     $.ajax({
//         url : $('#search-form').attr('action'),
//         type:'GET',
//         headers: { 'HTTP_X_REQUESTED_WITH': 'xmlhttprequest' },
//         data : {
//             'search' : $('#search').val()
//         },
//         success: function(data, e) {
//             alert("SUCCESS")
//         },
//         error: function(data) {
//             alert("ERROR");
//         },
//     });
// })


// function nacitanie() {
//     $.ajax({
//         type: "GET",
//         url: '?c=hodnotenie&a=addComment',
//         success: function (data) {
//             $('.message').remove();
//             data.forEach(element => $('<div class="message">\n' +
//             '            <div class="name">' + element.nick + '</div>\n' +
//             '            <div style="padding: 1px 0 30px 41px;margin: 30px 5px 5px -37px;"> ' + element.text + ' </div>\n' +
//             '        </div>').insertAfter($('#form_komentare')));
//
//
//         }
//     });
//
// }
//
//
// $('#search-form').submit(function (e) {
//     e.preventDefault();
//     $.ajax({
//         type: "POST",
//         url: '?c=hodnotenie&a=addComment',
//         headers: { 'HTTP_X_REQUESTED_WITH': 'xmlhttprequest' },
//         data: $(this).serialize(),
//         success: function(data, e) {
//             alert("SUCCESS")
//         },
//         error: function(data) {
//             alert("ERROR");
//         },
//     });
// });

///SEARCH
// var request = null;
//
// $(document).ready(function () {
//     //min dlzka na zacanie hladania
//     var minLength = 2;
//
//     $("#live_search").keyup(function() {
//         //ked keyup, tak daj to textu
//         var oldValue = this;
//         var text = $(this).val();
//
//
//         if(text !== "") {
//             $("#searchresult").css("display","inline");
//             if(text.length >= minLength) {
//                 //Ak tam ostal request(minuly), tak ho zabije
//                 if(request != null)
//                     request.abort();
//                 request = $.ajax({
//                     url: '?c=domov&a=pouziv',
//                     method:"POST",
//                     data:{text:text},
//
//                     success:function (data) {
//
//                         if (text===$(oldValue).val()) {
//                             $("#searchresult").html(data);
//                         }
//
//                     }
//                 })
//             }
//         } else {
//             $("#searchresult").css("display","none");
//         }
//     });
// });

// $(document).ready(function() {
//
//     $("#show_more_comments").click(function () {
//         $.ajax({
//             url: '?c=Hodnotenie&a=endPoint',
//             method: "GET",
//             success: function (data) {
//                 alert("LOL");
//                 data.forEach(element => $)
//                 $("#comments").html(data);
//             }
//         })
//     });
//
//     // var commentCount = 2;
//     // $("#show_more_comments").click(function () {
//     //     commentCount += 2;
//     //     $("#comments").load("?c=Hodnotenie&a=skupIndividTrening",{
//     //         commentNewCount: commentCount
//     //     });
//     // });
// });



// $(document).ready(function() {
//     var commentCount = 2;
//     $("#show_more_comments").click(function () {
//         commentCount += 2;
//         $("#comments").load("?c=Hodnotenie&a=skupIndividTrening",{
//             commentNewCount: commentCount
//         });
//     });
// });

// $(document).ready(function() {
//     var commentCount = 2;
//     $("#show_more_comments").click(function () {
//         commentCount += 2;
//         $.get("?c=Hodnotenie&a=skupIndividTrening",function (data, status) {
//             $("#comments").html(data);
//             alert(status);
//         } )
//
//         // $("#comments").load("?c=Hodnotenie&a=skupIndividTrening",{
//         //     commentNewCount: commentCount
//         // });
//     });
// });

// $(document).ready(function() {
//     var commentCount = 3;
//     $("#show_more_comments").click(function (e) {
//         e.preventDefault();
//         $.ajax({
//             type:"POST",
//             url: "?c=Hodnotenie&a=skupIndividTrening",
//             data: commentCount,
//             success: function (data) {
//                 alert(data.message);
//                 $("#comments").html(data);
//             }
//         });
//         // commentCount += 2;
//         // $.get("?c=Hodnotenie&a=skupIndividTrening",function (data, status) {
//         //     $("#comments").html(data);
//         //     alert(status);
//         // } )
//
//         // $("#comments").load("?c=Hodnotenie&a=skupIndividTrening",{
//         //     commentNewCount: commentCount
//         // });
//     });
// });