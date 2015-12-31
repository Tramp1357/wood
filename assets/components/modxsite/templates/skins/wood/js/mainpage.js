$(document).ready(function(){
	$('#camera_wrap').camera({
		thumbnails: false,
		pagination: false,
		navigation: false,
		loaderOpacity:.4,
		loaderStroke:3,
		loaderPadding:10,
		pieDiameter:20,
		time:5000
	});

	$('.eh1').equalHeights();

	$('.owl-carousel').owlCarousel({
		loop:true,
		autoplay:true,
		nav:true,
		navText:['',''],
		responsive:{
			0:{
				items:3
			},
			500:{
				items:6
			}
		}
	})
});

