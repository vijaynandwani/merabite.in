$(document).ready(function() {
	/* Search */
	
	
	
	/* Ajax Cart */
	$(document).on('click', '#updatequantity', function(e) {
        e.preventDefault();
        var quantityText = $(this).closest('span').next(),
            quantityValue = quantityText.val(),
            rowId = quantityText.attr('id');
        var priceText = $(quantityText).closest('td').next();
        var posting = $.post( 'updatecartquantity', { _token: $( document ).find( 'input[name=_token]' ).val(),id: rowId, quantity: quantityValue} );
        // Put the results in a div
      posting.done(function( data ) {
        $('td.subTotalDown').text('₹'+data.total+'.00');
        $('#headingtotal').text('(₹'+data.total+')');
        $('.cartTotalUpper').text(data.count + ' item(s) - ₹' + data.total + '.00');
        var totalwithothers = parseInt(data.total,10) + 30;
        $('td.totalDown').text('₹'+totalwithothers+'.00');
      });
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