	$('body').on("click", '.isready', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/order_served";
        var me = $(this).attr("id");
        order_served(url, me);
	});
	/*$('body').on("click", '.isserved', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/print_reciept";
        var me = $(this).attr("id");
        order_served(url, me);
	});
	$('body').on("click", '.isready', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/order_served";
        var me = $(this).attr("id");
        //order_served(url, me);
        $(location).attr('href', url+'?id='+me);
	});*/
	$('body').on("click", '.isserved', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/print_reciept";
        var me = $(this).attr("id");
        //order_served(url, me);
        $(location).attr('href', url+'?id='+me);
	});
	$('body').on("click", '.clear-order', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/clear_order";
        var me = $(this).attr("id");
        clear_order(url, me);
	});
		$('.clear-order').click(function(e){
				e.stopPropagation();
				var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
		        var url = base + "/clear_order";
		        var me = $(this).attr("id");
		        clear_order(url, me);
			});