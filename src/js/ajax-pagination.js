// WORDPRESS AJAX
// References:
// https://premium.wpmudev.org/blog/load-posts-ajax/?mksi=b&utm_expid=3606929-94.SWGkQ9hyQQGxJNtgEiBgWA.1&utm_referrer=https%3A%2F%2Fwww.google.com%2F
// https://premium.wpmudev.org/blog/using-ajax-with-wordpress/?mksi=b&utm_expid=3606929-94.SWGkQ9hyQQGxJNtgEiBgWA.1&utm_referrer=https%3A%2F%2Fwww.google.com%2F
// http://wordpress.stackexchange.com/questions/35849/using-ajax-on-categories-and-wordpress-loops


(function($) {

	//Cache Dom
	var $page_nav, $curr_page, page_num;
	var $container = $('#blog-area');

	function updateCache() {
		$page_nav = $container.find('.paging-navigation');
		$curr_page = $page_nav.find('.current');
	}

	function get_page_num( element ) {

		var value = $(element).html();

		if(value == 'Previous') value = parseInt( $curr_page.html() ) - 1;
		else if(value == 'Next') value = parseInt( $curr_page.html() ) + 1;

		return value;
	}


	$(document).on('click', '.paging-navigation a.page-numbers', function( event ) {

		event.preventDefault();

		updateCache();

		var page_num = get_page_num(this);

		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: ajaxpagination.query_vars,
				page: page_num
			},
			beforeSend: function() {
				$container.find( 'article' ).remove();
				$container.find('.paging-navigation').remove();
				$container.append( '<div id="loader">Loading New Posts...</div>' );
			},
			success: function( html ) {
				$container.find('#loader').remove();
				$container.append( html );
			}
		})
	})

})(jQuery);
