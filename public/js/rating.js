
function changeColor(element) {
    element.style.backgroundColor = 'orange';
}


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


