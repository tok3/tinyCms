/*
$(document).ready(function () {

    $(".limit-button").on("click", function () {
        $('.limit').css("display", "none");
        $(".repeat").css("display", "none");
        $("form").append(`<input class="datetime-local" type="datetime-local">`);
        $(".datetime-local").insertBefore(".begin");
        $(".begin").css("display", "flex");
    });
    $(".repeat-button").on("click", function () {
        $('.repeat').css("display", "none");
        $(".limit").css("display", "none");
        $("form").append(`<input class="text" type="text" placeholder="Please type the number of days to countdown.">`);
        $(".text").insertBefore(".begin");
        $(".begin").css("display", "flex");
    });

    $("form").on("submit", function (e) {
        e.preventDefault();

        const typeInput = $("input")[0].type;
        const userInput = $("input").val();
        let seconds;

        if (typeInput == "text") {
            if (userInput == "" || isNaN(userInput)) {
                alert("Please enter a valid date time");
            } else if (!isNaN(userInput)) {
                seconds = parseInt(userInput) * 86400;
                console.log(seconds);
            }
        } else {
            if (userInput == "") {
                alert("Please enter a valid date time");
            } else {
                const date = new Date(userInput);
                const now = new Date();
                seconds = parseInt((date.getTime() - now.getTime()) / 1000);
                console.log(seconds);
            }
        }

        if (!seconds || seconds < 0) {
            alert("Please enter a valid date time");
        } else {
            let days, hours, minutes;

            if (typeInput == "text") {
                days = Math.floor(seconds / (3600 * 24)) - 1;
                hours = 23;
                minutes = 59;
                seconds = 59;
            } else {
                days = Math.floor(seconds / (3600 * 24));
                seconds -= days * 3600 * 24;
                hours = Math.floor(seconds / 3600);
                seconds -= hours * 3600;
                minutes = Math.floor(seconds / 60);
                seconds -= minutes * 60;
            }

            $(`.${typeInput}`).remove();
            $("button.begin").css("display", "none");
            $("form").append(`<button class="stop">Stop Countdown</button>`);

            const validationPrint = (timeUnit) => {
                return timeUnit < 10 ? `0${timeUnit}` : timeUnit;
            };

            $("#seconds").text(validationPrint(seconds));
            $("#minutes").text(validationPrint(minutes));
            $("#hours").text(validationPrint(hours));
            $("#days").text(validationPrint(days));

            const changeTimeWithLimit = setInterval(() => {
                seconds -= 1;
                $("#seconds").text(validationPrint(seconds));
                if (seconds === 0 && minutes > 0) {
                    seconds = 60;
                    minutes -= 1;
                    $("#minutes").text(validationPrint(minutes));
                }
                if (seconds === 0 && minutes === 0 && hours > 0) {
                    seconds = 60;
                    minutes = 60;
                    hours -= 1;
                    $("#hours").text(validationPrint(hours));
                }
                if (seconds === 0 && minutes === 0 && hours === 0 && days > 0) {
                    seconds = 60;
                    minutes = 60;
                    hours = 24;
                    days -= 1;
                    $("#days").text(validationPrint(days));
                }
                if (seconds === 0 && minutes === 0 && hours === 0 && days === 0) {
                    clearInterval(changeTimeWithLimit);
                }
            }, 1000);

            $(".stop").on("click", function () {
                clearInterval(changeTimeWithLimit);
                console.log(`stop`);
                $(".limit").css("display", "block");
                $(".repeat").css("display", "block");
                $(this).remove();

                $("#seconds").text("00");
                $("#minutes").text("00");
                $("#hours").text("00");
                $("#days").text("00");
            });
        }
    });
});
*/

$(document).ready(function () {
    // Countdown-Ende von data-countdown-end Attribut abrufen
    const countdownEnd = $('[data-countdown-end]').data('countdown-end');

    if (countdownEnd) {
        const date = new Date(countdownEnd);
        const now = new Date();
        let seconds = parseInt((date.getTime() - now.getTime()) / 1000);

        if (isNaN(seconds) || seconds <= 0) {
            /*alert("Please enter a valid end date time");*/
        } else {
            startCountdown(seconds);
        }
    }


    function startCountdown(seconds, typeInput = "date") {
        let days, hours, minutes;

        if (typeInput === "text") {
            days = Math.floor(seconds / (3600 * 24)) - 1;
            hours = 23;
            minutes = 59;
            seconds = 59;
        } else {
            days = Math.floor(seconds / (3600 * 24));
            seconds -= days * 3600 * 24;
            hours = Math.floor(seconds / 3600);
            seconds -= hours * 3600;
            minutes = Math.floor(seconds / 60);
            seconds -= minutes * 60;
        }

        // Neue Bedingung hinzufügen, um die Klasse daysPlus hinzuzufügen, wenn days >= 100
        updateDaysClass(days);

        $(`.${typeInput}`).remove();
        $("button.begin").css("display", "none");
        // $("form").append(`<button class="stop">Stop Countdown</button>`);

        const validationPrint = (timeUnit) => {
            return timeUnit < 10 ? `0${timeUnit}` : timeUnit;
        };

        $("#seconds").text(validationPrint(seconds));
        $("#minutes").text(validationPrint(minutes));
        $("#hours").text(validationPrint(hours));
        $("#days").text(validationPrint(days));

        const changeTimeWithLimit = setInterval(() => {
            seconds -= 1;
            $("#seconds").text(validationPrint(seconds));
            if (seconds === 0 && minutes > 0) {
                seconds = 60;
                minutes -= 1;
                $("#minutes").text(validationPrint(minutes));
            }
            if (seconds === 0 && minutes === 0 && hours > 0) {
                seconds = 60;
                minutes = 60;
                hours -= 1;
                $("#hours").text(validationPrint(hours));
            }
            if (seconds === 0 && minutes === 0 && hours === 0 && days > 0) {
                seconds = 60;
                minutes = 60;
                hours = 24;
                days -= 1;
                $("#days").text(validationPrint(days));

                // Aktualisieren Sie die Klasse basierend auf den verbleibenden Tagen
                updateDaysClass(days);
            }
            if (seconds === 0 && minutes === 0 && hours === 0 && days === 0) {
                clearInterval(changeTimeWithLimit);
            }
        }, 1000);

        $(".stop").on("click", function () {
            clearInterval(changeTimeWithLimit);
            $(".limit").css("display", "block");
            $(".repeat").css("display", "block");
            $(this).remove();

            $("#seconds").text("00");
            $("#minutes").text("00");
            $("#hours").text("00");
            $("#days").text("00");

            // Entfernen Sie die Klasse daysPlus, wenn der Countdown gestoppt wird
            $(".item.first").removeClass("daysPlus");
        });
    }


    // Funktion zur Aktualisierung der Klasse basierend auf den Tagen
    function updateDaysClass(days) {
    return
        if (days >= 100) {
            $(".wrapper .item:first").addClass("daysPlus");
            $(".wrapper").addClass("wrapperMarginFix");
        } else {
            $(".wrapper .item:first").removeClass("daysPlus");
            $(".wrapper").removeClass("daysPlus");
        }
    }
});
