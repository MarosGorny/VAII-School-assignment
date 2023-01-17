
    const icon = document.getElementById("arrow-up");

    window.addEventListener("scroll", function() {
        if (window.pageYOffset > 0) {
            icon.style.visibility = "visible";
        } else {
            icon.style.visibility = "hidden";
        }
    });

    icon.addEventListener("click", function() {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });


    function displayTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        if (seconds === 0) {
            document.getElementById("time").innerHTML = "GYM TIME";
            document.getElementById("time").classList.add("zoom");
        } else {
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            if (minutes < 10) {
                minutes = "0" + minutes;
            }

            if (hours < 10) {
                hours = "0" + hours;
            }
            document.getElementById("time").innerHTML = hours + ":" + minutes + ":" + seconds;
            document.getElementById("time").classList.remove("zoom");
        }

    }

    setInterval(displayTime, 1000);
