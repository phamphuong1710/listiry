( function ( $ ) {
	var pull = $( '.menu-toggle' );
	var menu = $( '.main-menu' );
	$(pull).on( 'click' , function(){
		menu.slideToggle();
		$('li.menu-item-has-children>a').on('click',function(event){

		event.preventDefault()

		$(this).parent().find('ul').first().toggle(300);

		$(this).parent().siblings().find('ul').hide(200);

		//Hide menu when clicked outside
		$(this).parent().find('ul').mouseleave(function(){  
			var thisUI = $(this);
				$('html').click(function(){
					thisUI.hide();
					$('html').unbind('click');
			});
		});
	} );
	var w = $(window).width();
	$(window).resize( function() {
		if (w>990 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	} );

	console.log(w);




	});



	$('.thumbnail-single-fw').find('.wp-post-image').addClass('fw');



	var next_time = document.getElementById('comming_soon_date');
	if ( next_time || next_time != null ) {
		var str = next_time.value;
		var countDownDate= new Date(str).getTime();
		// alert(countDownDate);
		var countdownfunction = setInterval(function() {
			var now = new Date().getTime();
			var distance = countDownDate - now;
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			 var day = document.getElementById('day');
			if( day || day!=null){
				// alert('helo');
				document.getElementById('day').innerHTML = days;
				document.getElementById('hours').innerHTML = hours;
				document.getElementById('minutes').innerHTML = minutes;
				document.getElementById('seconds').innerHTML = seconds;
				if (distance < 0) {
					clearInterval(countdownfunction);
					document.getElementById('day').innerHTML = 0;
					document.getElementById('hours').innerHTML = 0;
					document.getElementById('minutes').innerHTML = 0;
					document.getElementById('seconds').innerHTML = 0;
				}
			}

		}, 1000);
	}

} )(jQuery);
