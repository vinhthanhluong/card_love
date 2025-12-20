jQuery(window).bind("load", function () {
    // SLIDER
    if (jQuery(".love-slider").length > 0) {
        $(".love-slider .love-slr").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 2000,
            fade: true,
            arrows: false,
            appendDots: $(".ilove-dots"),
        });
    }
    /*============== END - SLIDER ================*/
});

jQuery(document).ready(function () {
    "use strict";
    
    // Counter
    if (jQuery(".icounter .icounter-type1").length > 0) {
        const getData = jQuery(".icounter").attr("data-love");
        const [dataDay, dataMonth, dataYear] = getData.split("/");
        const past = new Date(`${dataYear}/${dataMonth}/${dataDay}`);
        const now = new Date();

        function padStart(value) {
            return String(value).padStart(2, "0");
        }

        // Years
        let years = now.getFullYear() - past.getFullYear();

        //Months
        let months = now.getMonth() - past.getMonth();
        if (months < 0) {
            years--;
            months += 12;
        }

        // Days
        let days = now.getDate() - past.getDate();
        if (days < 0) {
            months--;
            const lastMonth = new Date(
                now.getFullYear(),
                now.getMonth(),
                0
            ).getDate();
            days += lastMonth;
        }

        // Weeks
        const weeks = Math.floor(days / 7);
        days = days % 7;

        // Set Data
        jQuery(".icounter .icounter-first").text(getData);
        // Set Year Month Week Day
        jQuery(".iyear span").text(padStart(years));
        jQuery(".imonth span").text(padStart(months));
        jQuery(".iweek span").text(padStart(weeks));
        jQuery(".iday span").text(padStart(days));

        // Set Hours Minute Second
        setInterval(() => {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            jQuery(".ihours").text(padStart(hours));
            jQuery(".iminute").text(padStart(minutes));
            jQuery(".isecond").text(padStart(seconds));
        }, 1000);
    }

    if (jQuery(".icounter .icounter-type2").length > 0) {
        const daySumItem = jQuery(".iday-sum");
        const getData = jQuery(".icounter").attr("data-love");
        const [dataDay, dataMonth, dataYear] = getData.split("/");
        const past = new Date(`${dataYear}/${dataMonth}/${dataDay}`);
        const now = new Date();

        const diffMs = now - past;

        const oneDay = 1000 * 60 * 60 * 24;
        const daysTotal = Math.floor(diffMs / oneDay);

        daySumItem.text(daysTotal);
        daySumItem.attr("data-dayTotal", daysTotal);
    }
});
