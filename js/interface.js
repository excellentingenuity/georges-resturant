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
	window.location.href = '../order';
	//add popup to page to confirm
}
function order_ready(url, myid){
	$.ajax({type:"POST", url:url, data:{id:myid}, dataType: "html", success:function(data){clear_order(data, myid)}});
}
function clear_order(data, myid){
	var me = '#' + myid;
	$(me).remove();
}
function get_messages(url, myid){
	$.ajax({type:"POST", url:url, data:{id:myid}, dataType: "html", success:function(data){auto_get_messages(data)}});
}
function auto_get_messages(data){
	$('.messages').html(data);
	setTimeout(function(){
		var myid = $('.messages').attr("id");
		var base = $('.my-url').attr("id");
		var url = base + 'message/get_messages';
		get_messages(url, myid);
	},60000);
}
function message_read(url, myid){
	$.ajax({type:"POST", url:url, data:{id:myid}, dataType: "html", success:function(data){message_clear(data, myid)}});
}
function message_clear(date, myid){
	var me = 'p#' + myid;
	$(me).remove();
}
function refresh_orders(url){
	$.ajax({type:"POST", url:url, dataType: "html", success:function(data){replace_orders(data)}});
}
function replace_orders(data){
	
		$('.kitchen-container').replaceWith(data);
	
}
function order_served(url, myid){
	$.ajax({type:"POST", url:url, data:{id:myid}, dataType: "html", success:function(data){clear_order(data, myid)}});
}
function refresh_myorders(url){
	$.ajax({type:"POST", url:url, data:{refresh:true}, dataType: "html", success:function(data){replace_myorders(data)}});
}
function replace_myorders(data){
	
	$('.myorders-container').replaceWith(data);

}
function get_staff_member(url, myid){
	$.ajax({type:"POST", url:url, data:{id:myid}, dataType: "json", success:function(data){load_staff_form(data)}});
}
function load_staff_form(data){
	$('#first_name').val(data.firstname);
	$('#last_name').val(data.lastname);
	$('#staff_name').val(data.staff_name);
	$('#passcode').val(data.passcode);
	$("#permission").val(data.permission.toString()).attr("selected", "selected");
}

