
$(document).ready(function() {
console.log('s');
var i = 0;
$(".add-value").on("click", function()
{
	++i;
	$("#value-list").append(
		'<div class="input-group mb-3">'+
		'<input type="text" name="value['+i+']" placeholder="Value" class="form-control" />'+
		'<button type="button" class="btn btn-danger remove-value"><i class="feather icon-minus"></i></button>'+
		'</div>');

});

$('#value-list').on("click",".remove-value", function()
{ 
	$(this).parent('div').remove(); 
	i--; 
});  

});