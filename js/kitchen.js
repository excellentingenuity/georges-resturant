	$('body').on("click", '.kitchen-order', function(e){
		var base = '../order';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/order_set_ready";
        var me = $(this).attr("id");
        order_ready(url, me);
	});