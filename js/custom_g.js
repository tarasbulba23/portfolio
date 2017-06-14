$( window ).load(function() {

    var $container = $('.portfolio-container');
    $container.isotope({
    	filter: '*',
    });

    $('.portfolio-filter a').on('click', function () {
    	$('.portfolio-filter .active').removeClass('active');
    	$(this).addClass('active');

    	var selector = $(this).attr('data-filter');
    	$container.isotope({
    			filter: selector,
    			animationOptions: {
    					duration: 500,
    					animationEngine: "jquery"
    			}
    	});
    	return false;
    });

});
