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
		
		gallery.find(".current-img").html('<img id="image1" src="'+gallery.find(".gallery-slider .selected a").attr("href")+'" alt="" />');
		
		gallery.find(".gallery-slider a").click(function()
		{
			gallery.find(".current-img").html('<img id="image1"  src="'+$(this).attr("href")+'" alt="" />');
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

            var initalpopupimagepath = $(this).find('img').attr('src');
            $(".current-img").html('<img id="image1" src="'+ initalpopupimagepath+'">');

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


(function($) {
    $("#image1").imgViewer({
        onClick: function( e, self ) {
            var pos = self.cursorToImg( e.pageX, e.pageY);
            $("#position").html(e.pageX + " " + e.pageY + " " + pos.x + " " + pos.y);
        }
    });
    function test(e, self) {
        var pos = self.cursorToImg( e.pageX, e.pageY);
        $("#position2").html(e.pageX + " " + e.pageY + " " + pos.x + " " + pos.y);
    }
    var img = $("#image2").imgViewer();
    img.imgViewer("option", "onClick", test);

    $("#image3").imgViewer({
        onClick: function( e, self ) {
            var pos = self.cursorToImg( e.pageX, e.pageY);
            $("#position3").html(e.pageX + " " + e.pageY + " " + pos.x + " " + pos.y);
        }
    });
    $("#image4").imgViewer();
})(jQuery);


