

//Input Form User Login
$(".tambah-user").on("click", function(){
	$("#username").val($(this).data("username"));
	$("#name").val($(this).data("nama"));
	$("#email").val($(this).data("email"));
});




//reset Confirm
$(".resetPassword").on("click", function(){
	var tooltip=$(this).data("tooltip");
	var id=$(this).data("id");

	swal.fire({
		title:"'"+tooltip+"' akan direset",
		text: "Anda yakin akan reset password  ?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
	})
	.then((result) => {
		if (result.value) {
			$("#form_resetPassword"+id).submit();

		} else { 	
				// swal.fire("Your imaginary file is safe!");
			}
		});	

});

