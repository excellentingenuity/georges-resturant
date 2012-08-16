	$('body').on("click", '.edit-member', function(e){
		var base = '../staff';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/get_member";
        var me = $(this).attr("id");
        get_staff_member(url, me);
	});
	/*$('body').on("click", '.edit-member', function(e){
		var base = '../staff';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/get_member";
        var me = $(this).attr("id");
        get_staff_member(url, me);
	});	*/
	$('body').on("click", '.delete-member', function(e){
		var base = '../staff';//"http://demo.excellentingenuity.com/ERF/gr/order";
        var url = base + "/delete";
        var me = $(this).attr("id");
        delete_staff_member(url, me);
	});
