(function($){

	$(window).load(function() { // on window initial load

		$(document).on('click', 'ul.boxed a[href^="#"]', function (event) {
		    event.preventDefault();

		    $('html, body').animate({
		        scrollTop: $($.attr(this, 'href')).offset().top
		    }, 500);
		});

    // -------------
    // Start all AOS
    //setTimeout(function() { AOS.refresh(); }, 500);


    // ------------
    // Any elements with this class, will be prepended within its Parental area!
		jQuery('.push-to-front').each(function() {
		    jQuery(this).prependTo(jQuery(this).parent());
		});

		// --------------------
		// uniform card heights
				var maxHeight = 0;
				$(".grid-card .inner-wrap").each(function(){
				   if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
				});
				$(".grid-card .inner-wrap").height(maxHeight);


		// ---------------------
		// text sidebar override

  });


	$(document).ready(function(){ // on window ready after


		// ---------------------
		// text sidebar override
		$("body.single-bulletins #btn-print").html("<i class='fas fa-print'></i> &nbsp; Print this Bulletin");
		$("body.single-bulletins #btn-share").html("<i class='fas fa-share'></i> &nbsp; Share this Bulletin");
		$("body.single-events #btn-print").html("<i class='fas fa-print'></i> &nbsp; Print this Event");
		$("body.single-events #btn-share").html("<i class='fas fa-share'></i> &nbsp; Share this Event");
		$("#btn-share").click(function(e){
			$("#share-box").fadeToggle('fast');
		});

		// ----
		// menu
 		$(".menu-toggle-btn").click(function(e){

				$(this).toggleClass('open');
				$('#mobile-menu').toggleClass('open');
				$('body, html').toggleClass('locked');

				if ( $(this).hasClass('open') ) {
					$(this).attr("aria-expanded","true");
				} else {
					$(this).attr("aria-expanded","false");
				}

		});

		$(".locker").click(function(){
		    $(".menu-toggle-btn").trigger('click');
		});

		// ------
		// search
		$("#search-btn").click(function(e){
			$("#search-modal").fadeToggle();
		});

		$("#search-modal .close").click(function(e){
			$("#search-modal").fadeToggle();
		});


    // ------------
    // Home Page : initiate first tab

    $("#ex1 a").click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });


    // -------------
    // Start all AOS
    // AOS.init();


		// ----------
		// Home slide

		$('#section--home-slider').slick({
			dots: false,
			arrows: false,
		  infinite: true,
			speed: 1000,
			autoplay: true,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
	  });


		// ----------
		// Grid Cards all same height

		var maxHeight = 0;
		$(".grid-card .inner-wrap").each(function(){
		   if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
		});
		$(".grid-card .inner-wrap").height(maxHeight);



		// ---------
		// Accordions in page content

		$('.accordion-title').click(function(e) {
			$(this).next('.accordion-content').slideToggle();
			$(this).toggleClass('opened');
		});




    /* -----------
    // Window resize for full screen video always
		$(window).resize( function(){
			var theWidth = $(window).width();
			var theHeight = $(window).height();
			var newWidth = (theHeight*3.57777778);
			var newHeight = (theWidth/3.47777778);

			if ( (theWidth > 1280) && (newHeight > theHeight )) {
				$('.fullvid').css({'width':theWidth, 'height':newHeight});
			}

			if ( (theHeight > 720) && (newWidth > theWidth )) {
				$('.fullvid').css({'height':theHeight, 'width':newWidth});
			}

		}).resize();
    */


    // ------------
    // Push to front
		$('.push-to-front').each(function() {
		    $(this).prependTo($(this).parent());
		});


    /* -------------
    // Sticky Header
    $(window).scroll(function(){
			var theHeight1 = $(window).height();

	    if ($(window).scrollTop() >= theHeight1 ) {
	        $('.header').addClass('fixed-header');
	        $('body').addClass('fixed-header-on');
	    }
	    else {
	        $('.header').removeClass('fixed-header');
	        $('body').removeClass('fixed-header-on');
	    }
		});
    */


    // -----------
    // Close modal by clicking on Modal
	  $( ".modal-wrap" ).click(function() {
			$(this).fadeOut(800);
		});


    // ----------
    // Close button inside Modal closes the Modal
		$( "span.close" ).click(function() {
			$(this).parent().parent().parent().parent().hide();
		});


    // ----------
    // Hamburger click : Slide open the menu
		$( ".mobile-menu-btn" ).click(function() {
			$('div.mobile-menu').addClass('slide-open');
			$('div.u-contain').addClass('move-right');
			//$('body').addClass('fixed');
		});


    // ---------
    // Hamburger Menu : Close button inside Removes classes
		$( ".mobile-menu-close, .menu-links-contain a" ).click(function() {
			$('div.mobile-menu').removeClass('slide-open');
			$('div.u-contain').removeClass('move-right');
			//$('body').removeClass('fixed');
		});


    // --------
    // Hover fade effect; add class & on any child items
		$(".grid-hover-siblings").hover(
			function () {
				$(this).siblings().find('.opacity-layer').addClass('opacity-3');
			},
			function () {
				$(this).siblings().find('.opacity-layer').removeClass('opacity-3');
			}
		);


	  /* ------
    // Set a timer to run at an action (or onLoad)
		setTimeout(function() {
		      $('').fadeOut(800);
		}, 1200); 					//	1.2 seconds after elapses
		*/


    // ------
    // Parallax functions
    // just set a few items as Parallax to use
    /*
    $(window).scroll(function(e){
		  parallax();
		});
		function parallax(){
		  var scrolled = $(window).scrollTop();
		  $('.parallax').css('margin-top',-(scrolled*0.55)+'px');
		  $('.parallax-2').css('margin-top',-(scrolled*0.31)+'px');
		  $('.parallax-3').css('margin-top',+(scrolled*0.11)+'px');
		}
    */


    // ------
		// Add smooth scrolling to all anchor links

    /*
	    $("a").on('click', function(event) {

		    if (this.hash !== "") {
		      // Prevent default anchor click behavior
		      event.preventDefault();

		      // Store hash
		      var hash = this.hash;

		      // Using jQuery's animate() method to add smooth page scroll
		      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		      $('html, body').animate({
		        scrollTop: $(hash).offset().top
		      }, 800, function(){

		        // Add hash (#) to URL when done scrolling (default click behavior)
		        window.location.hash = hash;
		      });
		    } // End if
	    });
     */

		 // smooth scroll
	 	$(document).on('click', 'ul.boxed a[href^="#"]', function (event) {
	 			event.preventDefault();

	 			$('html, body').animate({
	 					scrollTop: $($.attr(this, 'href')).offset().top
	 			}, 500);
	 	});

	});

})(jQuery);
