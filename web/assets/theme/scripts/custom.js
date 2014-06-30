$(function()
{
    $(".popup").each(function()
    {

        var popup = $(this);
        popup.find(".popup-close").click(function()
        {
            $(".layer").remove();
            popup.hide();

            return false;
        });
    });

    $(".popup-gallery").each(function()
    {


        var gallery = $(this);

        if (gallery.find(".gallery-slider li.selected").length == 0) gallery.find(".gallery-slider li:first").addClass("selected");

        gallery.find(".current-img").html('<img  src="'+gallery.find(".gallery-slider .selected a").attr("href")+'" alt="" />');

        gallery.find(".gallery-slider a").click(function()
        {
            updateCurrentImage($(this).attr("href"));

            gallery.find(".gallery-slider li.selected").removeClass("selected");
            $(this).parent().addClass("selected");



            return false;
        });
    });

    if ($('.slider-img').length > 0)
    {
        $('.slider-img').jcarousel({
            scroll: 1,
            wrap: "both"
        });

        $(".slider-img a").click(function()
        {

            updateCurrentImage($(this).find('img').attr('src'));

            var layer = $('<div class="layer" />');

            $("body").append(layer);

            $(".layer").height($("body").height() + 50).show();


            $("#gallery-popup").show();

            $(".gallery-slider").jcarousel({
                scroll: 1,
                wrap: "both"
            });

            return false;
        });
    }

    function updateCurrentImage(initalpopupimagepath){

        $("#current-image-div-id").html('');
        var img = $('<img/>');


        img.one('load', function(){
            $(img).wheelzoom();

            console.log(this);
            //this.trigger('load');
        }).attr('src', initalpopupimagepath).appendTo($("#current-image-div-id"));

    }

    $(".timepicker").each(function()
    {
        var timepicker = $(this);

        timepicker.find(".hasTimeDropdown").click(function()
        {
            timepicker.find(".timedropdown").toggle();
        });



        $(timepicker.find(".timedropdown .btn-success")).click(function()
        {
            $(timepicker.find(".timedropdown")).hide();

            var ampm = "am";
            var hours = timepicker.find( ".sliderhour .slider" ).slider( "value" );

            var minutes = timepicker.find( ".sliderminute .slider" ).slider( "value" );

            if (hours > 11) { hours -= 12; ampm = "pm"; if(hours == 0){hours = 12} }

            var time_inp = timepicker.find( ".hasTimeDropdown" );

            if(minutes < 10){
                minutes = "0"+minutes;
            }

            time_inp.val( hours + ":" + minutes + ampm );

            if(time_inp.attr('rel')){
                $(time_inp.attr('rel')).val(time_inp.val());

            }
            return false;
        });
    });
    try{
        $('.scrolled').jScrollPane(
            {
                showArrows: true,
                horizontalGutter: 8,
                verticalGutter: 8
            }
        );
    }catch(e){

    }

    try{


        $('.date-pick')

            .datePicker(
            {
                createButton:false,
                displayClose:true,
                closeOnSelect:false,
                selectMultiple:true
            }
        )
            .bind(
            'click',
            function()
            {
                $(this).dpDisplay();
                this.blur();
                return false;
            }
        )
            .bind(
            'dateSelected',
            function(e, selectedDate, $td, state)
            {
                console.log('You ' + (state ? '' : 'un') // wrap
                    + 'selected ' + selectedDate);

            }
        )
            .bind(
            'dpClosed',
            function(e, selectedDates)
            {
                console.log('You closed the date picker and the ' // wrap
                    + 'currently selected dates are:');
                console.log(selectedDates);
            }
        );

    }catch (e){

    }

    /* last update ----   */


});

