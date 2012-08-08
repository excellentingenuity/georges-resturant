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