

    const add1Button = document.querySelector('#add1Button');
    const minus1Button = document.querySelector('#minus1Button');
    const resetButton = document.querySelector('#reset');
    const obsadenostDisplay = document.querySelector('#obsadenostPocetDisplay');
    const kapacitaDisplay = document.querySelector('#obsadenostMaxKapacitaDisplay');
    const maxKapacitaInput = document.querySelector('#maxKapacitaInput');
    const trening1 = document.querySelector('#aktualizujTrening1');

    let obsadenost = Number(obsadenostDisplay.textContent);
    let maxKapacita = Number(kapacitaDisplay.textContent);
    let jePlny;
    let jePrazdny;

    updateStates();

    add1Button.addEventListener("click", function () {
        if (!jePlny) {
            obsadenost += 1;
            jePrazdny = false;
            if (obsadenost >= maxKapacita) {
                jePlny = true;
            }
        }
        updateStates()
    })

    minus1Button.addEventListener("click", function () {
        if (!jePrazdny) {
            obsadenost -= 1;
            jePlny = false;
            if (obsadenost <= 0) {
                jePrazdny = true;
            }
        }
        updateStates()
    })

    maxKapacitaInput.addEventListener('change', function () {
        maxKapacita = parseInt(this.value);
        if (maxKapacita >= 0 && maxKapacita <= 20) {
            kapacitaDisplay.textContent = maxKapacita;
        }

    })

    function updateStates() {
        if (maxKapacitaInput) {
            maxKapacitaInput.value = Number(kapacitaDisplay.textContent);
        }

        obsadenostDisplay.textContent = obsadenost;
        if (obsadenost <= 0) {
            jePrazdny = true;
            removeColors();
        } else if (obsadenost >= maxKapacita) {
            jePlny = true;
            addRedColor();
        } else {
            removeColors()
        }
    }

    function removeColors() {
        obsadenostDisplay.classList.remove("plnyTrening");
        kapacitaDisplay.classList.remove("plnyTrening");
    }

    function addRedColor() {
        obsadenostDisplay.classList.add("plnyTrening");
        kapacitaDisplay.classList.add("plnyTrening");
    }

    resetButton.addEventListener('click', function () {
        jePrazdny = true;
        jePlny = false;
        obsadenost = 0;
        obsadenostDisplay.textContent = obsadenost;
        obsadenostDisplay.classList.remove("plnyTrening");
        kapacitaDisplay.classList.remove("plnyTrening");
    })


    function updateTraining() {
        let pocet = document.getElementById("obsadenostPocetDisplay").innerHTML;
        document.getElementById("pocet1").value = pocet;
        alert(pocet);
    }

    trening1.addEventListener('click', function () {
        let pocet = document.getElementById("obsadenostPocetDisplay").innerHTML;
        let maxKapacita = document.getElementById('obsadenostMaxKapacitaDisplay').innerHTML;
        document.getElementById("pocet1").value = pocet;
        document.getElementById("kapacita1").value = maxKapacita;
        document.getElementById('maxKapacita').value = maxKapacita;
    })

    trening1.addEventListener('submit', function () {
        let pocet = document.getElementById("obsadenostPocetDisplay").innerHTML;
        document.getElementById("pocet1").value = pocet;
        alert(pocet);
    })


