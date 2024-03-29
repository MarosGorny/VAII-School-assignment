
    const buttonsAdd = document.querySelectorAll('#add1Button');
    const buttonMinus = document.querySelectorAll('#minus1Button');
    const buttonsRest = document.querySelectorAll('#reset');

    const inputsMaxKapacity = document.querySelectorAll('#maxKapacitaInput');

    const submitButtons = document.querySelectorAll('#aktualizujTrening');


    /**
     * Pridanie jedného prihláseného používateľa (NIE do DB)
     * Akcia sa musí ešte potvrdiť
     */
    buttonsAdd.forEach(button => {
        button.addEventListener("click", function () {
            var closestParent = this.parentElement.parentElement;
            var obsadenostPocet = closestParent.querySelector("#obsadenostPocetDisplay");
            var kapacitaPocet = closestParent.querySelector("#obsadenostMaxKapacitaDisplay");



            if (parseInt(obsadenostPocet.innerHTML) < parseInt(kapacitaPocet.innerHTML)) {
                obsadenostPocet.innerHTML = parseInt(obsadenostPocet.innerHTML) + 1;
                if(parseInt(obsadenostPocet.innerHTML) >= parseInt(kapacitaPocet.innerHTML)) {
                    obsadenostPocet.classList.add("plnyTrening");
                    kapacitaPocet.classList.add("plnyTrening");
                } else {
                    obsadenostPocet.classList.remove("plnyTrening");
                    kapacitaPocet.classList.remove("plnyTrening");
                }
            }
        })
    });

    /**
     * Odobratie jedného prihláseného používateľa (NIE z DB)
     * Akcia sa musí ešte potvrdiť
     */
    buttonMinus.forEach(button => {
        button.addEventListener("click", function () {
            var closestParent = this.parentElement.parentElement;
            var obsadenostPocet = closestParent.querySelector("#obsadenostPocetDisplay");
            var kapacitaPocet = closestParent.querySelector("#obsadenostMaxKapacitaDisplay");

            if (parseInt(obsadenostPocet.innerHTML) > 0) {
                obsadenostPocet.innerHTML = parseInt(obsadenostPocet.innerHTML) - 1;
                if(parseInt(obsadenostPocet.innerHTML) < parseInt(kapacitaPocet.innerHTML) ) {
                    obsadenostPocet.classList.remove("plnyTrening");
                    kapacitaPocet.classList.remove("plnyTrening");
                }

            }
        })
    });


    /**
     * Vyresetovanie prihlasených používatelov (NIE v DB)
     * Akcia sa musí ešte potvrdiť
     */
    buttonsRest.forEach(button => {
        button.addEventListener('click', function () {
            var closestParent = this.parentElement.parentElement;
            var obsadenostPocet = closestParent.querySelector("#obsadenostPocetDisplay");
            var kapacitaPocet = closestParent.querySelector("#obsadenostMaxKapacitaDisplay");


            obsadenostPocet.innerHTML = '0';
            obsadenostPocet.classList.remove("plnyTrening");
            kapacitaPocet.classList.remove("plnyTrening");
        })
    });

    /**
     * Zmena kapacity tréningu
     * Akcia sa musí ešte potvrdiť
     */
    inputsMaxKapacity.forEach( input => {
        input.addEventListener('change', function () {
            var closestParent = this.parentElement.parentElement;
            var obsadenostPocet = closestParent.querySelector("#obsadenostPocetDisplay");
            var kapacitaPocet = closestParent.querySelector("#obsadenostMaxKapacitaDisplay");

            var maxKapacita = parseInt(this.value);
            if (maxKapacita >= 0 && maxKapacita <= 20) {
                kapacitaPocet.textContent = maxKapacita;
            }
            if(parseInt(obsadenostPocet.innerHTML) >= parseInt(kapacitaPocet.innerHTML) ) {
                obsadenostPocet.classList.add("plnyTrening");
                kapacitaPocet.classList.add("plnyTrening");
            } else {
                obsadenostPocet.classList.remove("plnyTrening");
                kapacitaPocet.classList.remove("plnyTrening");
            }


        })
    });


    function removeColors() {
        obsadenostDisplay.classList.remove("plnyTrening");
        kapacitaDisplay.classList.remove("plnyTrening");
    }

    function addRedColor() {
        obsadenostDisplay.classList.add("plnyTrening");
        kapacitaDisplay.classList.add("plnyTrening");
    }




    function updateTraining() {
        let pocet = document.getElementById("obsadenostPocetDisplay").innerHTML;
        document.getElementById("pocet1").value = pocet;
        alert(pocet);
    }

    /**
     * Potvrdenie a zmena
     *  - počtu prihlasených na tréningu
     *  - Maximálnej kapacity na trénngi
     */
    submitButtons.forEach(button => {
        button.addEventListener('click', function () {
            var closestParent = this.parentElement.parentElement.parentElement;
            var obsadenostPocet = closestParent.querySelector("#obsadenostPocetDisplay");
            var kapacitaPocet = closestParent.querySelector("#obsadenostMaxKapacitaDisplay");
            var hiddenInputPocet = closestParent.querySelector("#pocet");
            var hiddenInputKapacita = closestParent.querySelector("#kapacita");

            hiddenInputPocet.value = parseInt(obsadenostPocet.innerHTML);
            hiddenInputKapacita.value = parseInt(kapacitaPocet.innerHTML);

        })
    });



