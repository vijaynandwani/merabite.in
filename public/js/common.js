$(document).ready(function() {
	/* Search */
	$('.button-search').bind('click', function() {
		location = 'search.html';
	});
	
	
	/* Ajax Cart */
	$(document).on('click', '#cart > .heading a', function() {
        if ($('#cart').hasClass('active')) {
            $('#cart').removeClass('active');
        } else {
            $('#cart').addClass('active');

            $('#cart').load('index.php?route=module/cart #cart > *');
        }
	});
	
	/* Mega Menu */
    /*
	$('#menu ul > li > a + div').each(function(index, element) {

		var menu = $('#menu').offset();
		var dropdown = $(this).parent().offset();
		
		i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());
		
		if (i > 0) {
			$(this).css('margin-left', '-' + (i + 5) + 'px');
		}
	});
    */

	$('.alert').find('a').addClass('alert-link');

    $(document).on('click', '.colorbox', function() {
		$.colorbox({
			href: $(this).attr('href'), 
			open: true
		});
		return false;
	});

    var body = document.body,
        timer;

    window.addEventListener('scroll', function() {
        clearTimeout(timer);
        if(!body.classList.contains('disable-hover')) {
            body.classList.add('disable-hover')
        }

        timer = setTimeout(function(){
            body.classList.remove('disable-hover')
        },500);
    }, false);

    $('.tooltip-top').tooltip({
        placement: 'top',
        container: 'body'
    });
    $('.tooltip-bottom').tooltip({
        placement: 'bottom',
        container: 'body'
    });
    $('.tooltip-left').tooltip({
        placement: 'left',
        container: 'body'
    });
    $('.tooltip-right').tooltip({
        placement: 'right',
        container: 'body'
    });

});

function getURLVar(key) {
	var value = [];
    var query = String(document.location).split('?');
    if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');
			
			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}
		
		if (value[key]) { return value[key]; }
        else { return ''; }
	}
} 

function addToCart(product_id, quantity) {
	quantity = typeof(quantity) != 'undefined' ? quantity : 1;

	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: 'product_id=' + product_id + '&quantity=' + quantity,
		dataType: 'json',
		success: function(json) {
			$('.alert').remove();
			
			if (json['redirect']) {
				location = json['redirect'];
			}
			
			if (json['success']) {
				$('#notification').html('<div class="alert alert-success" style="display: none;">' + json['success'] + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				
				$('.alert-success').fadeIn('slow');
				
				$('#cart-total').html('<i class="fa fa-shopping-cart fa-lg"></i>&nbsp;<span class="hidden-xs">' + json['total'] + '</span>');
				
				$('html, body').animate({ scrollTop: 0 }, 'slow'); 
			}	
		}
	});
}
function addToWishList(product_id) {
	$.ajax({
		url: 'index.php?route=account/wishlist/add',
		type: 'post',
		data: 'product_id=' + product_id,
		dataType: 'json',
		success: function(json) {
			$('.alert').remove();
						
			if (json['success']) {
				$('#notification').html('<div class="alert alert-success" style="display: none;">' + json['success'] + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				
				$('.alert-success').fadeIn('slow');
				
				$('#wishlist-total').html(json['total']);
				
				$('html, body').animate({ scrollTop: 0 }, 'slow');
			}	
		}
	});
}

function addToCompare(product_id) { 
	$.ajax({
		url: 'index.php?route=product/compare/add',
		type: 'post',
		data: 'product_id=' + product_id,
		dataType: 'json',
		success: function(json) {
			$('.alert').remove();
						
			if (json['success']) {
				$('#notification').html('<div class="alert alert-success" style="display: none;">' + json['success'] + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				
				$('.alert-success').fadeIn('slow');
				
				$('#compare-total').html(json['total']);
				
				$('html, body').animate({ scrollTop: 0 }, 'slow'); 
			}	
		}
	});
}

$(document).ready(function(){
	    

    $('#product-slider-0').bxSlider({
        slideSelector: $('.slide-item'),
        mode: 'fade',
        speed: 800,
        pause: 5000,
        auto: true,
        autoHover: true,
        minSlides: 1,
        maxSlides: 1,
        nextSelector: $('#bx-controls-direction'),
        prevSelector: $('#bx-controls-direction'),
        nextText: '' +
                '<span class="fa-stack fa-lg">' +
                    '<i class="fa fa-chevron-right fa-stack-1x">' +
                '</span>',
        prevText: '' +
                '<span class="fa-stack fa-lg">' +
                    '<i class="fa fa-chevron-left fa-stack-1x">' +
                '</span>'
    });

    $(document).ready(function() {
        $('#carousel0').bxSlider({
            easing: 'ease-in-out',
            pager: false,
            slideWidth: 1200,
            slideMargin: 10,
            minSlides: 3,
            maxSlides: 3,
            moveSlides: 1,
            nextSelector: $('#bx-controls-direction2'),
        	prevSelector: $('#bx-controls-direction2'),
            nextText: '' +
                    '<span class="fa-stack fa-lg">' +
                        '<i class="fa fa-chevron-right fa-stack-1x">' +
                    '</span>',
            prevText: '' +
                    '<span class="fa-stack fa-lg">' +
                        '<i class="fa fa-chevron-left fa-stack-1x">' +
                    '</span>'
        });
    });

});