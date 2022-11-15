
const p1Button = document.querySelector('#p1Button');
const p2Button = document.querySelector('#p2Button');
const resetButton = document.querySelector('#reset');
const p1Display = document.querySelector('#p1Display');
const p2Display = document.querySelector('#p2Display');
const maxKapacitaInput = document.querySelector('#maxKapacita');
const trening1 = document.querySelector('#aktualizujTrening1');

let p1Score = Number(p1Display.textContent)
let winningScore = Number(p2Display.textContent);
let isGameFull = false;
let isGameEmpty = true;

// TODO Nastavit staty uz podla toho ze ako to je. Treba refactor

document.getElementById("maxKapacita").value = Number(p2Display.textContent);

p1Button.addEventListener("click",function () {
    isGameEmpty = false;

    if(!isGameFull) {
        p1Score += 1;
        if(p1Score >= winningScore) {
            isGameFull = true;
            p1Display.classList.add("plnyTrening");
            p2Display.classList.add("plnyTrening");
        }
        p1Display.textContent = p1Score;
    }
})

p2Button.addEventListener("click",function () {
    isGameFull = false;
    p2Display.classList.remove("plnyTrening");
    p1Display.classList.remove("plnyTrening");

    if(!isGameEmpty) {
        p1Score -= 1;
        if(p1Score <= 0) {
            isGameEmpty = true;
        }
        p1Display.textContent = p1Score;
    }
})

maxKapacitaInput.addEventListener('change', function() {
    winningScore = parseInt(this.value);
    p2Display.textContent = winningScore;
})

resetButton.addEventListener('click', function() {
    isGameEmpty = true;
    isGameFull = false;
    p1Score = 0;
    p1Display.textContent = p1Score;
    p1Display.classList.remove("plnyTrening");
    p2Display.classList.remove("plnyTrening");
})


function updateTraining() {
    let pocet = document.getElementById("p1Display").innerHTML;
    document.getElementById("pocet1").value = pocet;
    alert(pocet);
}

trening1.addEventListener('click',function() {
    let pocet = document.getElementById("p1Display").innerHTML;
    let maxKapacita = document.getElementById('p2Display').innerHTML;
    document.getElementById("pocet1").value = pocet;
    document.getElementById("kapacita1").value = maxKapacita;
    document.getElementById('maxKapacita').value = maxKapacita;
})

trening1.addEventListener('submit',function() {
    let pocet = document.getElementById("p1Display").innerHTML;
    document.getElementById("pocet1").value = pocet;
    alert(pocet);
})


