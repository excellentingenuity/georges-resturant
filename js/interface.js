// JavaScript Document

function add_to_order(id){
	
}
function edit_selected(myid, type){
	$.ajax({type:"POST", url:type, data:{id:myid}, dataType: "html", success:function(data){openm(data)}});
}
function openm(data){
	$('.modal-body').html(data);
	$('#editModal').modal('toggle');
}

function place_order(url, myorder){
	$.ajax({type:"POST", url:url, data:{order:myorder}, dataType: "html", success:function(data){pop_confirm(data)}});
}
function pop_confirm ($data){
	$('.overview-content').empty();
	$('.order_id').removeAttr("id");
	myorderid = "";
	$('.alert-message').html("Order Submitted!");
	$('.alert').show();
	window.location.href = "http://demo.excellentingenuity.com/ERF/gr/order/";
	//add popup to page to confirm
}