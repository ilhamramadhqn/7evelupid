
$('#label').html('Data');

function angka(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
	return true;
}

var base = location.pathname;
var baseurl = base.substring(1);
var find =  baseurl.indexOf("filter");
if(find > 1)
{
	$('#filter').removeClass('invisible');
}


//Kolom Action
var action =document.getElementById('td_action');
if(!action)
{
}
else
{
	$('#kolom').append('<th>Action</th');
}

var btn_delete =document.getElementById('btn_delete');
if(!btn_delete)
{
	$('.btn_delete').remove();
}
else
{
}


//Checkbox
$('#check_all').on('click', function(e) {
	if($(this).is(':checked',true))  
	{
		$(".sub_chk").prop('checked', true);  
	} else {  
		$(".sub_chk").prop('checked',false);  
	}  
});





//Multiple Delete
$('.delete_all').on('click', function(e) {
	var allVals = [];  
	$(".sub_chk:checked").each(function() {  
		allVals.push($(this).attr('data-id'));
	});  


	if(allVals.length <=0)  
	{  
		swal.fire( {
			text :"Pilih data yang akan di hapus",
			icon: "info",
		});
		// alert("Please select row.");  
	}  
	else 
	{
		var jml_delete=allVals.length;

		swal.fire({
			title: jml_delete+" data akan dihapus",
			text: "Anda yakin akan menghapus data ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				var join_selected_values = allVals.join(","); 

				$.ajax({
					url: $(this).data('url'),
					type: 'DELETE',
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: 'ids='+join_selected_values,
					success: function (data) {
						if (data['success']) {
							$(".sub_chk:checked").each(function() { 
								
								location.reload(true);
								// $(this).parents("tr").remove();
							});
							
						} else if (data['error']) {
							alert(data['error']);
						} else {
							alert('Whoops Something went wrong!!');
						}
					},
					error: function (data) {
						alert(data.responseText);
					}
				});
				

			} else {
				// swal.fire("Your imaginary file is safe!");
			}
		});

	}  
});


//Delete Confirm
$(".delete").on("click", function(){
	var tooltip=$(this).data("tooltip");
	var id=$(this).data("id");

	swal.fire({
		title:"'"+tooltip+"' akan dihapus",
		text: "Anda yakin akan menghapus data ?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
	})
	.then((result) => {
		if (result.value) {
			$("#form_delete"+id).submit();

		} else { 	
				// swal.fire("Your imaginary file is safe!");
			}
		});	

});


//Edit Confirm
$(".edit").on("click", function(){
	var base = location.pathname;
	var baseurl = base.substring(1);
	var find =  baseurl.indexOf("/");
	if(find > 1)
	{
		var url=base.substring(0,find+1);
	}
	else
	{
		var url = location.pathname;
	}
	var id=$(this).data("id");
	var tooltip=$(this).data("tooltip");
	swal.fire({
		title: "'"+tooltip+"' akan diubah",
		text: "Anda yakin akan mengubah data ?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
	})
	.then((result) => {
		if (result.value) {
			location.href = url+"/"+id+"/edit";
		} else { 	
				// swal.fire("Your imaginary file is safe!");
			}
		});	
});



//Batal
$(".batal").on("click", function(){
	
	var base = location.pathname;
	var baseurl = base.substring(1);
	var find =  baseurl.indexOf("/");
	
	var url=base.substring(0,find+1);
	location.href = url;

});




//button url
// function url(act,id,tooltip){
	
// 	var base = location.pathname;
// 	var baseurl = base.substring(1);
// 	var find =  baseurl.indexOf("/");
// 	if(find > 1)
// 	{
// 		var url=base.substring(0,find+1);
// 	}
// 	else
// 	{
// 		var url = location.pathname;
// 	}
// 	if (act == 'tambah')
// 	{
// 		$('.filter').slideUp();
// 		$('.badan').slideUp();
// 		$('#label').html('Form Tambah');
// 		$('.form').load(url+'/create');						
// 		$('.form').slideDown();
// 	}
// 	else if (act == 'edit')
// 	{
// 		swal.fire({
// 			title: "'"+tooltip+"' akan diubah",
// 			text: "Anda yakin akan mengubah data ?",
// 			icon: "warning",
// 			buttons: true,
// 			dangerMode: true,
// 		})
// 		.then((willEdit) => {
// 			if (willEdit) {
// 				$('.filter').slideUp();
// 				$('.badan').slideUp();
// 				$('#label').html('Form Edit');
// 				$('.form').load(url+'/'+id+'/edit');						
// 				$('.form').slideDown();
// 			} else { 	
// 				// swal.fire("Your imaginary file is safe!");
// 			}
// 		});		
// 	}

// 	else
// 	{
// 		$('.form').slideUp();		
// 		$('.filter').slideDown();
// 		$('.badan').slideDown();						
// 	}

// }
