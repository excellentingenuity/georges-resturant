	$('body').on("click", '.isready', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/order_served";
        var me = $(this).attr("id");
        order_served(url, me);
	});
	$('body').on("click", '.isserved', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/print_reciept";
        var me = $(this).attr("id");
        order_served(url, me);
	});